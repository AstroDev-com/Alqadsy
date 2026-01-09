<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryApiController extends Controller
{
    /**
     * Get all categories
     */
    public function index(Request $request)
    {
        $query = Category::query();

        // Filter by status (active only by default)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 1); // Active only
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
        $categories = $query->withCount('products')->orderBy('id', 'desc')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => CategoryResource::collection($categories),
            'meta' => [
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'per_page' => $categories->perPage(),
                'total' => $categories->total(),
            ],
        ], 200);
    }

    /**
     * Get single category
     */
    public function show($id)
    {
        $category = Category::withCount('products')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new CategoryResource($category),
        ], 200);
    }

    /**
     * Create new category (Admin only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'status' => 'required|in:1,0',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'), $request->name);
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => new CategoryResource($category),
        ], 201);
    }

    /**
     * Update category (Admin only)
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'status' => 'required|in:1,0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image && file_exists(public_path($category->image))) {
                @unlink(public_path($category->image));
            }
            $category->image = $this->uploadImage($request->file('image'), $request->name);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => new CategoryResource($category),
        ], 200);
    }

    /**
     * Delete category (Admin only)
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image
        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully',
        ], 200);
    }

    /**
     * Upload and resize category image
     */
    private function uploadImage($image, $name)
    {
        $filename = Str::slug($name) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image->getRealPath());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $publicPath = public_path('images/categories');
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        $img->save($publicPath . '/' . $filename);
        return 'images/categories/' . $filename;
    }
}
