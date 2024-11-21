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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_meta_keywords')->nullable();
            $table->string('site_meta_description')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
