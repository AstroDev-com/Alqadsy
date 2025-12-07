<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use \ArPHP\I18N\Arabic;
use \Kwn\Arabic\Text\ArabicShaper;
use \Kwn\Arabic\Text\Glyphs;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // تحقق من أن الملف موجود فعلاً
            if (!file_exists($image->getRealPath())) {
                return redirect()->back()->withErrors(['image' => 'لم يتم العثور على الملف المؤقت للصورة.']);
            }
            // تحقق من أن الملف صورة صالحة
            $imageInfo = @getimagesize($image->getRealPath());
            if ($imageInfo === false) {
                return redirect()->back()->withErrors(['image' => 'الملف المرفوع ليس صورة صالحة أو تالف.']);
            }
            // تحقق من نوع الصورة المدعوم
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($image->getMimeType(), $allowedTypes)) {
                return redirect()->back()->withErrors(['image' => 'نوع الصورة غير مدعوم.']);
            }
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(770, 513, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // إضافة العلامة المائية النصية أسفل منتصف الصورة
            $text = ' يس دقلا ةشرو, Tel: 771177763';
            $img->text($text, $img->width() / 2, $img->height() - 300, function ($font) {
                $font->file(public_path('fonts/Amiri-Regular.ttf'));
                $font->size(36);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $watermarkPath = public_path('watermark.png');
            if (file_exists($watermarkPath)) {
                $img->place($watermarkPath, 'bottom-right', 10, 10);
            }
            $publicPath = public_path('images/products');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $imageName = 'images/products/' . $filename;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
            $image = $request->file('image');
            // تحقق من أن الملف موجود فعلاً
            if (!file_exists($image->getRealPath())) {
                return redirect()->back()->withErrors(['image' => 'لم يتم العثور على الملف المؤقت للصورة.']);
            }
            // تحقق من أن الملف صورة صالحة
            $imageInfo = @getimagesize($image->getRealPath());
            if ($imageInfo === false) {
                return redirect()->back()->withErrors(['image' => 'الملف المرفوع ليس صورة صالحة أو تالف.']);
            }
            // تحقق من نوع الصورة المدعوم
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($image->getMimeType(), $allowedTypes)) {
                return redirect()->back()->withErrors(['image' => 'نوع الصورة غير مدعوم.']);
            }
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(770, 513, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // إضافة العلامة المائية النصية أسفل منتصف الصورة
            $text = 'Al-Qadasi Workshop, Tel: 771177763';
            $img->text($text, $img->width() / 2, $img->height() - 20, function ($font) {
                $font->file(public_path('fonts/Amiri-Regular.ttf'));
                $font->size(36);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $watermarkPath = public_path('watermark.png');
            if (file_exists($watermarkPath)) {
                $img->place($watermarkPath, 'bottom-right', 10, 10);
            }
            $publicPath = public_path('images/products');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $img->save($publicPath . '/' . $filename);
            $product->image = 'images/products/' . $filename;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        // حذف صورة المنتج من الملفات إذا كانت موجودة
        if ($product->image && file_exists(public_path($product->image))) {
            @unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
