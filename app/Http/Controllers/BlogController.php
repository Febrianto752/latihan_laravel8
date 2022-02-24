<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller {
    public function index() {
        return view('blog', [
            'title' => 'blog',
            'posts' => Post::all(),
        ]);
    }

    // $slug dikirim dari route
    public function show(string $slug) {

        return view('post', [
            'title' => 'post',
            'post'  => Post::find($slug),
        ]);
    }
}