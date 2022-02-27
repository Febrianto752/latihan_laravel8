<?php

use App\Http\Controllers\BlogController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', ['nav_link' => 'home', 'title' => 'home', 'application' => 'Blog Post']);
});
Route::get('/about', function () {
    return view('about', ['nav_link' => 'about', 'title' => 'about']);
});

// Route Blog
Route::get('/posts', [BlogController::class, 'index']);

Route::get('/posts/{post:slug}', [BlogController::class, 'show']);

// Route Categories
Route::get('/categories', function () {
    return view('categories', ['nav_link' => 'categories', 'title' => 'List Post Category', 'categories' => Category::all()]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => "Post By Category - {$category->name}", 'posts' => $category->posts->load('author', 'category'), 'category' => $category]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', ['title' => "Post By Author - {$author->name}", 'posts' => $author->posts->load('author', 'category')]);
});