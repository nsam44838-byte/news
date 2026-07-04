<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;

// ─── Front-end Routes ─────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts', [FrontPostController::class, 'frontIndex'])->name('posts.index');
Route::get('/post/{id}', [FrontPostController::class, 'show'])->name('post.show');

Route::get('/news', [NewsController::class, 'frontIndex'])->name('news');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// ─── Dashboard (redirects to admin) ────────────────────────────
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// ─── Admin Routes ──────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Slides (with soft delete support)
    Route::get('/slides', [SlideController::class, 'index'])->name('slide.index');
    Route::get('/slides/create', [SlideController::class, 'create'])->name('slide.create');
    Route::post('/slides', [SlideController::class, 'store'])->name('slide.store');
    Route::get('/slides/{id}/edit', [SlideController::class, 'edit'])->name('slide.edit');
    Route::put('/slides/{id}', [SlideController::class, 'update'])->name('slide.update');
    Route::delete('/slides/{id}', [SlideController::class, 'destroy'])->name('slide.delete');
    Route::get('/slides/trashed', [SlideController::class, 'trashed'])->name('slide.trashed');
    Route::post('/slides/{id}/restore', [SlideController::class, 'restore'])->name('slide.restore');

    // Categories
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('category.delete');

    // Posts
    Route::get('/posts', [AdminPostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('post.create');
    Route::post('/posts', [AdminPostController::class, 'store'])->name('post.store');
    Route::get('/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{id}', [AdminPostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{id}', [AdminPostController::class, 'destroy'])->name('post.destroy');

    // News
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.delete');

    // About / Contact
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
