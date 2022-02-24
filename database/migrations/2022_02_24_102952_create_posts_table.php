<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // otomatis primary key & auto_increment
            $table->string('title'); // varchar(255)
            $table->string('slug')->unique();
            $table->text('excerpt'); // excerpt = kutipan (tulisan sebelum tombol read more)
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->timestamps(); // generate create at & updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }
};