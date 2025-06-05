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
            [
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'Superadmin@devblog.com',
            'password' => bcrypt('superadmin'),
            'picture' => 'default-avatar.jpg',
            'bio' => 'Conta Padrao com Super Administração',
            'type' => 'superAdmin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@devblog.com',
                'password' => bcrypt('admin'),
                'picture' => 'default-avatar.jpg',
                'bio' => 'Conta Padrao com Administração',
                'type' => 'admin',
                'status' => 'active',
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
        Schema::dropIfExists('default_super_admin');
    }
};
