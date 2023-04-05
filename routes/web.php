<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Show a post (using route model binding: route key to eloquent model) or 404 page
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

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
