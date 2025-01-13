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
        DB::table('posts')->insert([
            [
                'author_id' => 1,
                'category' => 1,
                'title' => 'Welcome to DevBlog',
                'slug' => 'welcome-to-devblog',
                'contents' => 'Welcome to DevBlog, a blog for developers. Here you will find articles about programming, web development, and more. Stay tuned for new posts!',
                'featured_image' => 'default-post.png',
                'tags' => 'dev, blog',
                'meta_keywords' => 'dev, blog',
                'meta_description' => 'Welcome to DevBlog, a blog for developers.',
                'visibility' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 1,
                'category' => 2,
                'title' => 'How to Install Laravel',
                'slug' => 'how-to-install-laravel',
                'contents' => 'This is a tutorial on how to install Laravel. Laravel is a PHP framework that is easy to use and has many features. Follow this tutorial to get started with Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'laravel, install',
                'meta_keywords' => 'laravel, install',
                'meta_description' => 'This is a tutorial on how to install Laravel.',
                'visibility' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 1,
                'category' => 1,
                'title' => 'How to Create a Blog',
                'slug' => 'how-to-create-a-blog',
                'contents' => 'This is a tutorial on how to create a blog. Follow this tutorial to learn how to create a blog using Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'blog, create',
                'meta_keywords' => 'blog, create',
                'meta_description' => 'This is a tutorial on how to create a blog.',
                'visibility' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 1,
                'category' => 3,
                'title' => 'How create a project in laravel',
                'slug' => 'how-create-a-project-in-laravel',
                'contents' => 'This is a tutorial on how to create a project in laravel. Follow this tutorial to learn how to create a project in laravel using Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'laravel, create',
                'meta_keywords' => 'laravel, create',
                'meta_description' => 'This is a tutorial on how to create a project in laravel.',
                'visibility' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 1,
                'category' => 5,
                'title' => 'Devops for beginners',
                'slug' => 'devops-for-beginners',
                'contents' => 'This is a tutorial on devops for beginners. Follow this tutorial to learn how to use devops.',
                'featured_image' => 'default-post.png',
                'tags' => 'devops, form',
                'meta_keywords' => 'devops, form',
                'meta_description' => 'This is a tutorial on how to create a contact form.',
                'visibility' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'category' => 6,
                'title' => 'How to create a website',
                'slug' => 'how-to-create-a-website',
                'contents' => 'This is a tutorial on how to create a website. Follow this tutorial to learn how to create a website using Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'website, create',
                'meta_keywords' => 'website, create',
                'meta_description' => 'This is a tutorial on how to create a website.',
                'visibility' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'category' => 7,
                'title' => 'How to create a mobile app',
                'slug' => 'how-to-create-a-mobile-app',
                'contents' => 'This is a tutorial on how to create a mobile app. Follow this tutorial to learn how to create a mobile app using Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'mobile, create',
                'meta_keywords' => 'mobile, create',
                'meta_description' => 'This is a tutorial on how to create a mobile app.',
                'visibility' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 2,
                'category' => 8,
                'title' => 'How to create a iot project',
                'slug' => 'how-to-create-a-iot-project',
                'contents' => 'This is a tutorial on how to create a iot project. Follow this tutorial to learn how to create a iot project using Laravel.',
                'featured_image' => 'default-post.png',
                'tags' => 'iot, create',
                'meta_keywords' => 'iot, create',
                'meta_description' => 'This is a tutorial on how to create a iot project.',
                'visibility' => 1,
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
        Schema::dropIfExists('default_posts');
    }
};
