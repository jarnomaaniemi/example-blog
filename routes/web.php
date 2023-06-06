<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Index: show all posts or posts that match search value with categories (eager loading)
Route::get('/', [PostController::class, 'index'])->name('home'); // named routes

// Subcribe to newsletter at mailchimp service
Route::post('newsletter', [NewsletterController::class, 'store']);

// Show a post (using route model binding: route key to eloquent model) or 404 page
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

// // Eager loading relationships in Post class ($with variable)
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         // 'posts' => $category->posts->load('category', 'author')
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// // Eager loading with load() funktion
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         // 'posts' => $author->posts
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Possibility to use Route:middleware('can:admin')->group(function () {}) or
// Route::resource('admin/posts', AdminPostController::class)->except('show') instead below:
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
Route::post('admin/posts/', [AdminPostController::class, 'store'])->middleware('can:admin');
Route::patch('admin/posts/{post:slug}', [AdminPostController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post:slug}', [AdminPostController::class, 'destroy'])->middleware('can:admin');
