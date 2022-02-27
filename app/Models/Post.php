<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    // ];
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        // if (isset($filters['keyword']) ? $filters['keyword'] : false) {
        //     $query->where('title', 'like', '%' . $filters['keyword'] . '%')
        //             ->orWhere('body', 'like', '%' . $filters['keyword'] . '%');
        // }

        $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('body', 'like', '%' . $keyword . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                return $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );

    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}