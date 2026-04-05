<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_users', ['only' => ['index', 'show', 'trashed']]);
        $this->middleware('permission:create_users', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_users', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_users', ['only' => ['softDelete', 'forceDelete']]);
        $this->middleware('permission:restore_users', ['only' => ['restore']]);
    }

    // ==============================:: users ::===============
    // ================:: index ::===============
    public function index()
    {
        $users = User::with('roles')->paginate(15);
        $roles = Role::all();
        // $users = User::get();
        return view('admin.role-permission.user.index', compact('users', 'roles'));
    }

    // ================:: show ::===============
    public function show(User $user)
    {
        $user->load('roles');
        return view('admin.role-permission.user.show', compact('user'));
    }

    // ================:: create ::===============
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.role-permission.user.create', compact('roles'));
    }

    // ================:: store ::===============
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:20048',
        ]);

        $imageName = 'user_default.webp';
        $thumbnailName = 'user_default_thumbnail.webp';

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // معالجة الصورة الأصلية
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scaleDown(770, 513);

            // حفظ الصورة الأصلية
            $path = 'users/' . $filename;
            Storage::disk('public')->put($path, $img->encode());

            // معالجة الصورة المصغرة
            $thumbnail = $manager->read($image->getRealPath());
            $thumbnail->scaleDown(400, 210);

            // حفظ الصورة المصغرة
            $thumbnailPath = 'users/thumbnails/' . $filename;
            Storage::disk('public')->put($thumbnailPath, $thumbnail->encode());

            $imageName = $path;
            $thumbnailName = $thumbnailPath;
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'status' => $request->status,
            'profile_image' => $imageName,
            'thumbnail' => $thumbnailName,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($validatedData['password']),
        ]);

        foreach ($validatedData['roles'] as $roleName) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $user->roles()->attach($role->id, ['model_type' => 'App\\Models\\User']);
            }
        }

        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }


    // ================:: edit ::===============
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.role-permission.user.edit', compact('user', 'roles', 'userRole'));
    }

    // ================:: update ::===============
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:20048',
        ]);

        $oldImage = $user->profile_image;
        $oldThumbnail = $user->thumbnail;
        $newFilename = $oldImage;

        if ($request->hasFile('profile_image')) {
            // حذف الصور القديمة إذا كانت موجودة وليست الصورة الافتراضية
            if ($oldImage && $oldImage !== 'user_default.webp' && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            if ($oldThumbnail && $oldThumbnail !== 'user_default_thumbnail.webp' && Storage::disk('public')->exists($oldThumbnail)) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            $image = $request->file('profile_image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // معالجة الصورة الأصلية
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scaleDown(770, 513);

            // حفظ الصورة الأصلية
            $path = 'users/' . $filename;
            Storage::disk('public')->put($path, $img->encode());

            // معالجة الصورة المصغرة
            $thumbnail = $manager->read($image->getRealPath());
            $thumbnail->scaleDown(400, 210);

            // حفظ الصورة المصغرة
            $thumbnailPath = 'users/thumbnails/' . $filename;
            Storage::disk('public')->put($thumbnailPath, $thumbnail->encode());

            $newFilename = $path;
        }

        $data = [
            'name' => $validatedData['name'],
            'email' => $request->email,
            'status' => $request->status,
            'phone_number' => $request->phone_number,
            'profile_image' => $newFilename,
            'thumbnail' => $newFilename ? 'users/thumbnails/' . basename($newFilename) : $oldThumbnail,
        ];

        if (!empty($validatedData['password'])) {
            $data['password'] = Hash::make($validatedData['password']);
        }

        $user->update($data);

        $user->roles()->detach();
        foreach ($validatedData['roles'] as $roleName) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $user->roles()->attach($role->id, ['model_type' => 'App\\Models\\User']);
            }
        }

        return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function trashed()
    {
        $users = User::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view('admin.role-permission.user.trashed', compact('users'));
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore();


            DB::commit();
            return redirect()->route('users.trashed')
                ->with('success', 'تم استعادة المستخدم  بنجاح');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return back()->with('error', 'المستخدم غير موجود.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'فشل الاستعادة: ' . $e->getMessage());
        }
    }

    // ======================(***) ==== && ---------:: Function ::------- && (***)======================


    public function softDelete($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            // لا نحذف الصور هنا لأن المستخدم قد يتم استعادته لاحقًا
            $user->delete(); // حذف مؤقت

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'فشل الحذف: ' . $e->getMessage());
        }
    }

    public function forceDelete($id)
    {
        DB::beginTransaction();
        try {
            $user = User::withTrashed()->findOrFail($id);

            // حذف الصورة الأصلية إذا لم تكن الصورة الافتراضية
            if ($user->profile_image && $user->profile_image !== 'user_default.webp' && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // حذف الصورة المصغرة إذا لم تكن الصورة الافتراضية
            if ($user->thumbnail && $user->thumbnail !== 'user_default_thumbnail.webp' && Storage::disk('public')->exists($user->thumbnail)) {
                Storage::disk('public')->delete($user->thumbnail);
            }

            $user->forceDelete();
            DB::commit();
            return redirect()->route('users.index')->with('success', 'تم الحذف النهائي بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'فشل الحذف النهائي: ' . $e->getMessage());
        }
    }
}
