<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
//use App\Http\Controllers\CategoryController;
use App\Models\Post;
use App\Models\News;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\SlideController;
use Carbon\Traits\Cast;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('slide');
// });
Route::get('/', [SlideController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);


Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/posts', [PostController::class, 'frontIndex']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'frontIndex'])->name('posts.index');

// // View single post
// Route::get('/post/{id}', [PostController::class, 'show'])->name('post.view');

// // Create post
// Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

// Show all news
Route::get('/posts', [PostController::class, 'frontIndex'])->name('posts.index');

// Show single news detail
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');



// Route::get('/', [SlideController::class, 'index'])->name('home');



Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('/dashboard'); // after login  show the /admin/dashboard/index



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::middleware('auth')->group(function () {
//   Route::get('/categories',[CategoryController::class,'index'])->name('categories');
//   Route::get('/settings',[SettingsController::class,'index'])->name('settings');

//   //Route::resource('post', App\Http\Controllers\Admin\PostController::class);

// });

// add leng 
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth'); // rout for show after login ()



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    //Route::resource('/category', CategoryController::class);
    //Route::resource('/posts', PostController::class);



    //profile dashboard
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/slides', [\App\Http\Controllers\Admin\SlideController::class, 'index'])->name('slide.index');
    Route::get('/slides/create', [\App\Http\Controllers\Admin\SlideController::class, 'create'])->name('slide.create');
    Route::post('/slides', [\App\Http\Controllers\Admin\SlideController::class, 'store'])->name('slide.store');
    Route::get('/slides/{id}/edit', [\App\Http\Controllers\Admin\SlideController::class, 'edit'])->name('slide.edit');
    Route::put('/slides/{id}', [\App\Http\Controllers\Admin\SlideController::class, 'update'])->name('slide.update');
    Route::delete('/slides/{id}', [\App\Http\Controllers\Admin\SlideController::class, 'destroy'])->name('slide.delete');

    
    Route::resource('slide', SlideController::class);
    Route::get('slide/trashed', [SlideController::class, 'trashed'])->name('slide.trashed');
    Route::post('slide/{id}/restore', [SlideController::class, 'restore'])->name('slide.restore');
});




Route::get('/post', function () {
    $posts = Post::latest()->get();
    return view('post', compact('posts')); // ✅ match the variable name
})->name('posts.index');


// Home (with slide + posts)
Route::get('/', [HomeController::class, 'index']);

Route::get('/post', [PostController::class, 'index']);
Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
Route::resource('admin/post', PostController::class)->names('admin.post');

// Front News Pages
Route::get('/post', [FrontPostController::class, 'index']);
Route::get('/post/{id}', [FrontPostController::class, 'show']);


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
});

Route::prefix('admin')->group(function () {

    Route::get('/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('/post/{id}/update', [PostController::class, 'update'])->name('admin.post.update');
    Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('admin.post.delete');
});







Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    
    // NEWS CRUD ROUTES
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.delete');

});
// Public news page (front-end)
Route::get('/news', [NewsController::class, 'news'])->name('news');



// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('news', Admin\NewsController::class);
// });




// Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.public');
// Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


// // Public News Page
// Route::get('/news', function () {
//     $news = News::latest()->get();
//     return view('news', compact('news'));
// })->name('news.index');

// // Admin CRUD for News
// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::resource('news', NewsController::class)->names('admin.news');
// });




Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Category Resource-like Routes

    // Index
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])
        ->name('category.index');

    // Create Page
    Route::get('/category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])
        ->name('category.create');

    // Store
    Route::post('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('category.store');

    // Edit Page
    Route::get('/category/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])
        ->name('category.edit');

    // Update
    Route::put('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])
        ->name('category.update');

    // Delete
    Route::delete('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])
        ->name('category.delete'); // make sure Blade uses 'destroy' not 'delete'

});


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    
    // Add this route for the create page
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});



// Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
//     Route::resource('categories', CategoryController::class);
// });

Route::get('/categories',[CategoryController::class,'index'])->name('categories');

Route::get('/settings',[SettingsController::class,'index'])->name('settings');








// Route::get('/categories',function(){
//     Return view('categories');
// })->name('categories');

// Route::get('/news',function(){
//     Return view('news');
// })->name('news');

// Route::get('/setting',function(){
//     Return view('setting');
// })->name('setting');

// Route::get('/video',function(){
//     Return view('video');
// })->name('video');


require __DIR__.'/auth.php';
