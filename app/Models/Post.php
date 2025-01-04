<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'author_id',
        'category',
        'title',
        'slug',
        'contents',
        'featured_image',
        'tags',
        'meta_keywords',
        'meta_description',
        'visibility',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function post_category(){
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('title', 'like', $term);

        });
    }
}
