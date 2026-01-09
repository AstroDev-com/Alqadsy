<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductApiController extends Controller
{
    /**
     * Get all products
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter by status (active only by default)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 1); // Active only
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 15);
        $products = $query->orderBy('id', 'desc')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ],
        ], 200);
    }

    /**
     * Get single product
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
        ], 200);
    }

    /**
     * Get products by category
     */
    public function byCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products),
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
        ], 200);
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2',
        ]);

        $products = Product::with('category')
            ->where('status', 1)
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->q}%")
                    ->orWhere('description', 'like', "%{$request->q}%");
            })
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products),
            'count' => $products->count(),
        ], 200);
    }

    /**
     * Create new product (Admin only)
     */
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
            $imageName = $this->uploadImage($request->file('image'), $request->name);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => new ProductResource($product->load('category')),
        ], 201);
    }

    /**
     * Update product (Admin only)
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
            $product->image = $this->uploadImage($request->file('image'), $request->name);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product->load('category')),
        ], 200);
    }

    /**
     * Delete product (Admin only)
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image
        if ($product->image && file_exists(public_path($product->image))) {
            @unlink(public_path($product->image));
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ], 200);
    }

    /**
     * Upload and resize product image with watermark
     */
    private function uploadImage($image, $name)
    {
        $filename = Str::slug($name) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image->getRealPath());
        $img->resize(770, 513, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Add watermark if exists
        $watermarkImagePath = public_path('frontend/images/Alqadsybold.jpg');
        if (file_exists($watermarkImagePath)) {
            $watermarkImg = $manager->read($watermarkImagePath);
            $watermarkWidth = 150;
            $watermarkHeight = 150;
            $watermarkImg->resize($watermarkWidth, $watermarkHeight, function ($constraint) {
                $constraint->upsize();
            });

            $watermarkX = (int)(($img->width() - $watermarkImg->width()) / 2);
            $watermarkY = (int)(($img->height() - $watermarkImg->height()) / 2);

            $img->place($watermarkImg, 'top-left', $watermarkX, $watermarkY);

            // Add phone text
            $phoneText = 'Tel: 771177763';
            $textY = $watermarkY + $watermarkImg->height() + 20;
            $img->text($phoneText, $img->width() / 2, $textY, function ($font) {
                $font->file(public_path('fonts/Amiri-Regular.ttf'));
                $font->size(36);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
        }

        $publicPath = public_path('images/products');
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        $img->save($publicPath . '/' . $filename);
        return 'images/products/' . $filename;
    }
}
