<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller {

    public function index() {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'))->name;
            $title = 'in ' . $category;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'))->name;
            $title = 'by ' . $author;
        }

        return view('posts', [
            'nav_link' => 'blog',
            'title'    => 'Post List ' . $title,
            // 'posts' => Post::all(),
            'posts'    => Post::latest()->filter(request(['keyword', 'category', 'author']))->paginate(8)->withQueryString(),
        ]);
    }

    // $slug dikirim dari route
    // kemudian karena menggunakan route model binding maka di function 'show' ini dengan parameter Post $post akan otomatis mencari data berdasarkan slug, jadi proses modelnya sudah di jalankan di parameternya
    public function show(Post $post) {
        return view('post', [
            'title'    => 'post',
            'category' => $post->category,
            'post'     => $post,
        ]);
    }
}