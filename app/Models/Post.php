<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post {
    // use HasFactory;
    public static $blog_posts = [
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

    public static function all(): object {
        return collect(self::$blog_posts);
    }

    public static function find($slug): array{
        $posts = self::all();

        // mencari baris terseleksi pertama yang terdapat associative 'slug'=$slug
        return $posts->firstWhere('slug', $slug);
    }
}