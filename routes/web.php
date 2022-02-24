<?php

use App\Http\Controllers\BlogController;
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
    return view('home', ['title' => 'home', 'application' => 'Blog Post']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});
Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/{slug}', [BlogController::class, 'show']);