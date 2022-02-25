<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'     => 'febrianto',
            'email'    => 'febrianto@gmail.com',
            'password' => bcrypt('febri123'),
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::create([
            'title'       => 'judul pertama',
            'slug'        => 'judul-pertama',
            'excerpt'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'body'        => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<p></p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'category_id' => 1,
            'user_id'     => 1,
        ]);

        Post::create([
            'title'       => 'judul kedua',
            'slug'        => 'judul-kedua',
            'excerpt'     => 'Lorem kedua ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'body'        => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<p></p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'category_id' => 1,
            'user_id'     => 1,
        ]);

        Post::create([
            'title'       => 'judul ketiga',
            'slug'        => 'judul-ketiga',
            'excerpt'     => 'Lorem ketiga ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'body'        => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<p></p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'category_id' => 2,
            'user_id'     => 1,
        ]);
    }
}