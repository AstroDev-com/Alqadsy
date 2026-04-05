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
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->get();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // بناء قواعد التحقق بناءً على توفر fileinfo وحجم الخادم (2 ميجابايت)
        $imageRules = ['required', 'max:10240']; // الحد الجديد 10 ميجا بدلاً من 2 ميجا
        if (function_exists('finfo_open')) {
            $imageRules[] = 'image';
            $imageRules[] = 'mimes:jpeg,png,jpg,gif,svg,webp';
        } else {
            $imageRules[] = 'file';
        }

        $messages = [
            'images.required' => 'يرجى اختيار صورة واحدة على الأقل.',
            'images.*.uploaded' => 'فشل تحميل إحدى الصور. قد يكون حجم الملف أكبر من الحد المسموح به في الخادم (10 ميجابايت).',
            'images.*.max' => 'حجم الصورة يجب ألا يتجاوز 10 ميجابايت.',
        ];

        $request->validate([
            'images' => 'required|array',
            'images.*' => $imageRules,
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $category = Category::findOrFail($request->category_id);
        $singularCategoryName = $this->getSingularName($category->name);

        // البحث عن أعلى رقم للمنتجات في هذا القسم (باستخدام الاسم بصيغة المفرد والجمع للبحث الشامل)
        $latestProductNumber = Product::where('category_id', '=', $request->category_id)
            ->where(function($q) use ($category, $singularCategoryName) {
                $q->where('name', 'LIKE', $category->name . ' %')
                  ->orWhere('name', 'LIKE', $singularCategoryName . ' %');
            })
            ->get()
            ->map(function ($p) {
                // استخراج الرقم من نهاية الاسم
                $parts = explode(' ', $p->name);
                $lastPart = end($parts);
                return is_numeric($lastPart) ? (int)$lastPart : 0;
            })->max();

        $nextNumber = ($latestProductNumber ?: 0) + 1;
        $createdCount = 0;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // توليد الاسم والوصف لهذا المنتج المحدد بالترتيب
                $generatedName = $singularCategoryName . ' ' . $nextNumber;
                $generatedDescription = $this->generateSmartDescription($category->name, $generatedName);

                // تحقق من أن الملف موجود فعلاً وصالح
                if (!file_exists($image->getRealPath())) continue;
                $imageInfo = @getimagesize($image->getRealPath());
                if ($imageInfo === false) continue;

                $filename = Str::slug($generatedName) . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $img = $manager->read($image->getRealPath());
                
                $img->scaleDown(770, 513);

                // إضافة العلامة المائية
                $watermarkImagePath = public_path('frontend/images/Alqadsybold.jpg');
                if (file_exists($watermarkImagePath)) {
                    $watermarkImg = $manager->read($watermarkImagePath);
                    $watermarkWidth = 150;
                    $watermarkHeight = 150;
                    $watermarkImg->scaleDown(150, 150);

                    $watermarkX = (int)(($img->width() - $watermarkImg->width()) / 2);
                    $watermarkY = (int)(($img->height() - $watermarkImg->height()) / 2);
                    $img->place($watermarkImg, 'top-left', $watermarkX, $watermarkY, 50);

                    $phoneText = "Tel: 771177763\n771839780\n772382903";
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
                $imagePath = 'images/products/' . $filename;

                // حفظ المنتج في قاعدة البيانات
                $product = new Product();
                $product->name = $generatedName;
                $product->description = $generatedDescription;
                $product->image = $imagePath;
                $product->status = $request->status;
                $product->category_id = $request->category_id;
                $product->save();

                $nextNumber++;
                $createdCount++;
            }
        }

        return redirect()->route('admin.products.index')->with('success', "تم إضافة $createdCount منتجاً بنجاح.");
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
        // Build validation rules conditionally based on fileinfo availability
        $imageRules = ['nullable', 'max:10240'];
        if (function_exists('finfo_open')) {
            $imageRules[] = 'image';
            $imageRules[] = 'mimes:jpeg,png,jpg,gif,svg,webp';
        } else {
            // Fallback: validate file extension and size only
            $imageRules[] = 'file';
        }

        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'nullable',
            'image' => $imageRules,
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
            $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'svg'];

            // استخدام MIME type من getimagesize أو getMimeType كبديل
            $mimeType = $imageInfo['mime'] ?? null;
            if (!$mimeType && function_exists('finfo_open')) {
                try {
                    $mimeType = $image->getMimeType();
                } catch (\Exception $e) {
                    $mimeType = $image->getClientMimeType();
                }
            } elseif (!$mimeType) {
                $mimeType = $image->getClientMimeType();
            }

            // Validate by MIME type if available, otherwise by extension
            $extension = strtolower($image->getClientOriginalExtension());
            if ($mimeType && !in_array($mimeType, $allowedTypes)) {
                return redirect()->back()->withErrors(['image' => 'نوع الصورة غير مدعوم.']);
            } elseif (!$mimeType && !in_array($extension, $allowedExtensions)) {
                return redirect()->back()->withErrors(['image' => 'نوع الصورة غير مدعوم.']);
            }

            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scaleDown(770, 513);
            // إضافة العلامة المائية (صورة + رقم) في منتصف الصورة
            $watermarkImagePath = public_path('frontend/images/Alqadsybold.jpg');
            if (file_exists($watermarkImagePath)) {
                $watermarkImg = $manager->read($watermarkImagePath);
                // ضبط حجم العلامة المائية إلى 90×127 بكسل
                $watermarkWidth = 90;
                $watermarkHeight = 127;
                $watermarkImg->scaleDown(90, 127);

                // حساب الموضع المركزي للصورة
                $watermarkX = (int)(($img->width() - $watermarkImg->width()) / 2);
                $watermarkY = (int)(($img->height() - $watermarkImg->height()) / 2);

                // وضع الصورة في الوسط
                $img->place($watermarkImg, 'top-left', $watermarkX, $watermarkY, 50);

                // إضافة النص (الرقم) تحت الصورة بمسافة
                $phoneText = "Tel: 771177763\n771839780\n772382903";
                $textY = $watermarkY + $watermarkImg->height() + 20; // 20 بكسل مسافة
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

    /**
     * تحويل اسم القسم من الجمع إلى المفرد
     */
    private function getSingularName($pluralName)
    {
        $mapping = [
            'ابواب مداخل' => 'باب مدخل',
            'ابواب مداخل اكمبند' => 'باب مدخل اكمبند',
            'ابواب مداخل لليزر' => 'باب مدخل لليزر',
            'بوابات طراز جديد' => 'بوابة طراز جديد',
            'شبابيك منوعه' => 'شباك ',
            'سلاليم منوعه' => 'سلم ',
        ];

        return $mapping[$pluralName] ?? $pluralName;
    }

    /**
     * توليد وصف ذكي وعشوائي بناءً على القسم
     */
    private function generateSmartDescription($categoryName, $productName)
    {
        $texts = [
            "تصميم عصري يجمع بين الأصالة والحداثة، مصنع من أجود الخامات لضمان المتانة والأناقة الطويلة.",
            "قطعة فنية فريدة تضيف لمسة من الفخامة إلى منزلك، تتميز بدقة التفاصيل والجودة العالية.",
            "حل مثالي يوازن بين الأمان والجمال بفضل التصميم المبتكر واستخدام أفضل أنواع الحديد المعالج.",
            "يتميز هذا الموديل بتفاصيل دقيقة ونقوش فنية رائعة، مما يجعله خياراً مثالياً للباحثين عن التميز.",
            "تم تنفيذ هذا التصميم بأحدث التقنيات لضمان مقاومة العوامل الجوية مع الحفاظ على الرونق الجمالي.",
            "إضافة راقية تمنح واجهة منزلك لمسة من الرقي، مع ضمان كامل للجودة والمتانة لسنوات طويلة.",
            "مزيج رائع من القوة والتصميم الإبداعي، يوفر لك الأمان التام مع لمسات جمالية لا تضاهى.",
            "تم الاهتمام بكل تفاصيل هذا المنتج ليقدم لك أرقى معايير التصميم والجودة التي تستحقها.",
            "تصميم كلاسيكي متجدد يناسب المباني الفخمة والفلل، يضفي هيبة وفخامة من النظرة الأولى.",
            "يجمع بين البساطة والرقي، سهل الصيانة وطويل الأمد بفضل معايير التصنيع الاحترافية لدينا.",
            "إتقان في التصنيع ودقة في التنفيذ، منتج يعبر عن الحرفية العالية في مجال المشغولات المعدنية.",
            "خيارك الأمثل لتوفير الحماية مع الحفاظ على التهوية وإضاءة طبيعية بأسلوب عصري جذاب.",
            "تصميم مبتكر يراعي المساحة والوظيفة، مع الحفاظ على الشكل الجمالي الأنيق والمتميز.",
            "منتج مصمم ليوفر أعلى درجات الثبات والصلابة، مع تشطيب احترافي يسهل دمجه مع أي ديكور.",
            "رؤية جديدة في عالم الأبواب والشبابيك تعتمد على الفخامة والبساطة في آن واحد.",
            "تصميم فريد صمم خصيصاً ليناسب الذوق الرفيع، متميز بقوته ومقاومته العالية للعوامل الخارجية.",
            "يضفي هذا الموديل جواً من الفخامة والراحة النفسية بفضل توازن ألوانه وتناسق خطوطه الهندسية.",
            "منتج عصري بامتياز، يوفر أعلى مستويات الأمان بتصميم خفيف وأنيق يلبي كافة الاحتياجات.",
            "دقة متناهية في اختيار المواد الأولية وتشكيلها لتعطيك منتجاً ليس له مثيل في السوق من حيث الجودة.",
            "جمال يدوم للأبد مع تصميم يقاوم الزمن، يجمع بين كفاءة الأداء وروعة المظهر الخارجي.",
            "تحفة معمارية مصغرة تعكس الذوق الرفيع واهتمامكم بأدق التفاصيل في بناء منزل الأحلام.",
            "صلابة الحديد تلتقي بنعومة التصميم الفني لتقدم لك منتجاً يجمع بين قوة التحمل وجمال المنظر.",
            "حلول هندسية متطورة تضمن لك أقصى درجات الأمان والخصوصية دون التنازل عن اللمسة الجمالية.",
            "تم تصميم هذا الموديل ليكون عنواناً للفخامة والتميز في كل زاوية من زوايا واجهة منزلك.",
            "استثمار طويل الأمد في جمال وأمان منزلك، منتج لا تتغير جودته بمرور الوقت وظروف الطقس.",
            "دقة في اللحام وتشطيب يفوق التوقعات، حيث نجمع بين المهارة اليدوية وأحدث تقنيات التصنيع.",
            "تصميم يعزز القيمة الجمالية للعقار ويجذب الأنظار بفضل التناسق التام في الأبعاد والزخارف.",
            "انعكاس للفن اليدوي المتقن، كل خط في هذا التصميم مدروس بعناية ليعبر عن شخصية مالك المنزل.",
            "متانة لا تضاهى وتصميم فريد يجعلك تشعر بالتميز والأمان في كل لحظة داخل منزلك.",
            "نستخدم أجود أنواع الدهانات المقاومة للصدأ لضمان بقاء المنتج في أبهى صورة لسنوات عديدة.",
            "إبداع هندسي يتخطى المألوف، ليقدم لك قطعة ديكور أساسية تجمع بين الوظيفة والتميز الفني.",
            "تصميم ملهم يضيف عمقاً وجمالاً للواجهات المعمارية، مع التركيز على أعلى معايير الحماية.",
            "قوة الأداء وسهولة الاستخدام هي ما يميز هذا الإصدار، بالإضافة إلى شكله الخارجي الجذاب.",
            "صممت هذه القطعة بعناية فائقة لتكون مقاومة للصدمات والخدوش، مما يحافظ على مظهرها الجديد.",
            "لمسة إبداعية تحول الحديد البارد إلى لوحة فنية دافئة ترحب بضيوفك بأسلوب راقٍ.",
            "تصميم متوازن يجمع بين الوزن الخفيف والصلابة الفائقة، مما يسهل عملية الحركة والفتح.",
            "كل منتج يخرج من ورشنا هو شهادة على التزامنا بتقديم الأفضل دائماً لخدمة عملائنا.",
            "ابتكار يدوي يراعي التقاليد العريقة في صناعة الحديد مع دمجها بأساليب التصميم العالمية.",
            "يتميز هذا الموديل بنظام قفل متطور وزوايا مدعمة لضمان أقصى درجات الحماية لمنزلك.",
            "لمسة من السحر الهندسي تضفي طابعاً خاصاً وفريداً على كل منشأة يتم تركيب هذا المنتج فيها.",
            "نقدم لك الأناقة التي تدوم، مع تصاميم تحاكي أفخم الموديلات العالمية بلمسات محلية مبدعة.",
            "تكنولوجيا متطورة في القص والتشكيل تضمن زوايا حادة ودقة متناهية في كل قطعة.",
            "منتج صمم ليدوم لأجيال، بفضل التقنيات الحديثة في معالجة المعادن وحمايتها من التآكل.",
            "بساطة في الشكل ولكن مع عمق في المضمون، يعطي انطباعاً بالرقي والهدوء لواجهة منزلك.",
            "تصميم وظيفي بامتياز يخدم احتياجاتك اليومية بكل سلاسة ويسر مع شكل جمالي رائع.",
            "نصنع الجمال من الحديد ليكون حارساً أميناً وجميلاً لمملكتك الخاصة.",
            "تصميم انسيابي يقلل من مقاومة الرياح ويحافظ على جماله حتى في أقسى الظروف الجوية.",
            "استخدام ذكي للفراغات والظلال في التصميم يضفي أبعاداً ثلاثية مذهلة على المنتج.",
            "نحو من منزل أكثر أماناً وجمالاً، نقدم لك هذا التصميم الذي يعتبر قمة في الأناقة والصلابة.",
            "تجربة فريدة في التصميم تجعل من الواجهة الخاصة بك حديث الجميع بفضل رقي الاختيار."
        ];

        $randomText = $texts[array_rand($texts)];
        
        // يمكننا إضافة اسم القسم في البداية ليكون الوصف أكثر تحديداً
        $singularName = $this->getSingularName($categoryName);
        return $singularName . ": " . $randomText;
    }
}
