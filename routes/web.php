<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route Post
Route::get('/posts', [BlogController::class, 'index']);

Route::get('/posts/{post:slug}', [BlogController::class, 'show']);

// Route Categories
Route::get('/categories', function () {
    return view('categories', ['nav_link' => 'categories', 'title' => 'List Post Category', 'categories' => Category::all()]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => "Post By Category - {$category->name}", 'posts' => $category->posts->load('author', 'category'), 'category' => $category]);
});

// Route User
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', ['title' => "Post By Author - {$author->name}", 'posts' => $author->posts->load('author', 'category')]);
});

// Route Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard/index', ['title' => 'dashboard']);
})->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Route Dashboard Post
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/coba-file-input', function () {
    return view('coba-file-input');
});

Route::post('/kirim-file', [CobaController::class, 'index']);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');