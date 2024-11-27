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
        DB::table('users')->insert([
            'id' => 1,
            'site_title' => 'DevBlog - Blog de Tecnologia',
            'site_email' => 'seuSite@devblog.com',
            'site_phone' => '(XX) 23456-7890',
            'site_meta_description' => 'Blog de Tecnologia',
            'site_meta_keywords' => 'tecnologia, blog, programação',
            'site_logo' => 'logo-default.png',
            'site_favicon' => 'favicon-default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_general_settings');
    }
};
