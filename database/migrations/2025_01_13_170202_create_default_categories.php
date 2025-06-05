<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->insert([
            [
            'name'=>'blog',
            'slug'=>'blog',
            'parent'=>1,
            'ordering' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'programming',
            'slug'=>'programming',
            'parent'=>2,
            'ordering' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'web development',
            'slug'=>'web-development',
            'parent'=>3,
            'ordering' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'software development',
            'slug'=>'software-development',
            'parent'=>2,
            'ordering' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'kubernetes',
            'slug'=>'kubernetes',
            'parent'=>5,
            'ordering' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'mobile development',
            'slug'=>'mobile-development',
            'parent'=>2,
            'ordering' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'data science',
            'slug'=>'data-science',
            'parent'=>8,
            'ordering' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'travel blog',
            'slug'=>'travel-blog',
            'parent'=>1,
            'ordering' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_categories');
    }
};
