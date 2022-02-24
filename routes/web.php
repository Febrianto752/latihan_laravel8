<?php

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
Route::get('/blog', function () {
    $posts = [
        [
            'title'  => 'Post Pertama',
            'slug'   => 'post-pertama',
            'author' => 'Febrianto',
            'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tempora, nesciunt quia libero incidunt, culpa, doloribus ex pariatur amet earum veniam quae voluptates praesentium minus reiciendis dolores dolorem accusantium. Hic.',
        ],
        [
            'title'  => 'Post Kedua',
            'slug'   => 'post-kedua',
            'author' => 'Rizki Andi',
            'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tempora, nesciunt quia libero incidunt, culpa, doloribus ex pariatur amet earum veniam quae voluptates praesentium minus reiciendis dolores dolorem accusantium. Hic.',
        ],

    ];

    return view('blog', ['title' => 'blog', 'posts' => $posts]);
});

Route::get('/blog/{slug}', function ($slug) {
    $posts = [
        [
            'title'  => 'Post Pertama',
            'slug'   => 'post-pertama',
            'author' => 'Febrianto',
            'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tempora, nesciunt quia libero incidunt, culpa, doloribus ex pariatur amet earum veniam quae voluptates praesentium minus reiciendis dolores dolorem accusantium. Hic.',
        ],
        [
            'title'  => 'Post Kedua',
            'slug'   => 'post-kedua',
            'author' => 'Rizki Andi',
            'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tempora, nesciunt quia libero incidunt, culpa, doloribus ex pariatur amet earum veniam quae voluptates praesentium minus reiciendis dolores dolorem accusantium. Hic.',
        ],

    ];

    $postBySlug = [];
    foreach ($posts as $index => $post) {
        if ($slug === $post['slug']) {
            $postBySlug = $post;
        }
    }
    return view('post', ['title' => $slug, 'post' => $postBySlug]);
});