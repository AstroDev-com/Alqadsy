<?php

use App\Http\Controllers\Frontend\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConversationController;
use App\Http\Controllers\Admin\NotificationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect']
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ======================================  ::       permissions      :: ======================================
    Route::resource('permissions', PermissionController::class);
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    // ======================================  ::       roles      :: ======================================
    Route::resource('roles', RoleController::class);
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionsToRole'])->name('roles.addPermissionsToRole');
    Route::put('/roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionsToRole'])->name('roles.givePermissionsToRole');
    // ======================================  ::       users      :: ======================================
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{user}/softdelete', [UserController::class, 'softdelete'])->name('users.softdelete');
    Route::delete('/users/{user}/forceDelete', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    // ======================================  ::       settings      :: ======================================
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');


    // --- Notification Routes ---
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/mark-as-read/{notification}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::patch('/notifications/{notification}/mark-as-unread', [NotificationController::class, 'markAsUnread'])->name('notifications.markAsUnread');

    // ======================================  ::       Conversations / Chat      :: ======================================
    Route::resource('conversations', ConversationController::class)->except(['edit', 'update']);
    // ======================================  ::       User Profile (Custom)      :: ======================================
    Route::get('/user/profile', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/user/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile.update');
    Route::patch('/user/profile/password', [UserProfileController::class, 'updatePassword'])->name('user.profile.password.update');

    Route::post('/theme/update', [ThemeController::class, 'update'])->name('theme.update');

    // Message Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
    Route::post('/messages/{message}/archive', [MessageController::class, 'archive'])->name('messages.archive');

    // ======================================  ::       categories      :: ======================================
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // ======================================  ::       products      :: ======================================
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

require __DIR__ . '/auth.php';


Route::get('dashboard_control', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('dashboard_control');
Route::post('dashboard_control', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [homeController::class, 'Index'])->name('home');
Route::view('/about', 'frontend.about')->name('about');
Route::get('/gallery', [\App\Http\Controllers\Frontend\homeController::class, 'gallery'])->name('gallery');
Route::get('/category/{category}', [\App\Http\Controllers\Frontend\homeController::class, 'productsByCategory'])->name('frontend.category.products');
Route::get('/product/{product}', [\App\Http\Controllers\Frontend\homeController::class, 'showProduct'])->name('frontend.product.show');


// صفحة اتصل بنا (عرض النموذج)
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
// إرسال نموذج اتصل بنا
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
