<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'slug', 'parent', 'ordering'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function parent_category(){
        //return $this->hasOne(ParentCategory::class, 'id','parent');
        return $this->belongsTo(ParentCategory::class, 'parent', 'id');
    }
}
