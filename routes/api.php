<?php

use App\Http\Controllers\Api\Admin\ArticleController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\FaqController;
use App\Http\Controllers\Api\Admin\MitraController;
use App\Http\Controllers\Api\Admin\PermissionController;
use App\Http\Controllers\Api\Admin\ProductServiceController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\SocialController;
use App\Http\Controllers\Api\Admin\WebSettingsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Web\FeedbackController;
use App\Http\Controllers\Api\Web\HomeController;
use App\Http\Controllers\Api\Web\WebArticleController;
use App\Http\Controllers\Api\Web\WebProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('throttle:20,1')->get('/web/home', [HomeController::class, 'index']);

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/user', [AuthController::class, 'user'])->name('user');
    });
});

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware('auth:sanctum')->prefix('admin')->name('admin.')->group(function () {
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/web-settings', [WebSettingsController::class, 'show'])->name('admin.websettings.show');
    Route::post('/web-settings', [WebSettingsController::class, 'update'])->name('admin.websettings.update');
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/social', [SocialController::class, 'show'])->name('admin.social.show');
    Route::post('/social', [SocialController::class, 'update'])->name('admin.social.update');
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/mitra', [MitraController::class, 'index']);
    Route::post('/mitra', [MitraController::class, 'store']);
    Route::get('/mitra/{id}', [MitraController::class, 'show']);
    Route::post('/mitra/{id}', [MitraController::class, 'update']);
    Route::delete('/mitra/{id}', [MitraController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::get('/articles/{id}', [ArticleController::class, 'show']);
    Route::post('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/product-services', [ProductServiceController::class, 'index']);
    Route::post('/product-services', [ProductServiceController::class, 'store']);
    Route::get('/product-services/{id}', [ProductServiceController::class, 'show']);
    Route::post('/product-services/{id}', [ProductServiceController::class, 'update']);
    Route::delete('/product-services/{id}', [ProductServiceController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/faqs', [FaqController::class, 'index']);
    Route::post('/faqs', [FaqController::class, 'store']);
    Route::get('/faqs/{id}', [FaqController::class, 'show']);
    Route::post('/faqs/{id}', [FaqController::class, 'update']);
    Route::delete('/faqs/{id}', [FaqController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    // Role CRUD
    Route::get('roles', [RoleController::class, 'index']);
    Route::post('roles', [RoleController::class, 'store']);
    Route::get('roles/{id}', [RoleController::class, 'show']);
    Route::put('roles/{id}', [RoleController::class, 'update']);
    Route::delete('roles/{id}', [RoleController::class, 'destroy']);

    // Permission CRUD
    Route::get('permissions', [PermissionController::class, 'index']);
    Route::post('permissions', [PermissionController::class, 'store']);
    Route::get('permissions/{id}', [PermissionController::class, 'show']);
    Route::put('permissions/{id}', [PermissionController::class, 'update']);
    Route::delete('permissions/{id}', [PermissionController::class, 'destroy']);
});

Route::prefix('web')->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'store']);
    Route::get('/feedback', [FeedbackController::class, 'index']);
});

Route::prefix('web')->group(function () {
    Route::get('/articles', [WebArticleController::class, 'index']);
    Route::get('/articles/{slug}', [WebArticleController::class, 'show']);
});

Route::prefix('web')->group(function () {
    Route::get('/products', [WebProductController::class, 'index']);
    Route::get('/products/{id}', [WebProductController::class, 'show']);
});
