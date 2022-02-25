<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller {
    public function index() {
        return view('blog', [
            'title' => 'blog',
            // 'posts' => Post::all(),
            'posts' => Post::latest()->get(),
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