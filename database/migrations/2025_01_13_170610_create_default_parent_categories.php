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
        DB::table('parent_categories')->insert([
            [
            'name'=>'Programação',
            'slug'=>'blog-de-programacao',
            'ordering' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Arquitetura',
            'slug'=>'arquitetura',
            'ordering' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'FrontEnd',
            'slug'=>'front-end',
            'ordering' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'BackEnd',
            'slug'=>'back-end',
            'ordering' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'DevOps',
            'slug'=>'devops',
            'ordering' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Mobile',
            'slug'=>'mobile',
            'ordering' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'IoT',
            'slug'=>'internet-das-coisas-iot',
            'ordering' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Dados',
            'slug'=>'dados',
            'ordering' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Assembly',
            'slug'=>'assembly',
            'ordering' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Blockchain',
            'slug'=>'blockchain',
            'ordering' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'QA',
            'slug'=>'qa',
            'ordering' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Segurança',
            'slug'=>'seguranca',
            'ordering' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Gestão',
            'slug'=>'gestao',
            'ordering' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Empreendedorismo',
            'slug'=>'empreendedorismo',
            'ordering' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Carreira',
            'slug'=>'carreira',
            'ordering' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Nuvem',
            'slug'=>'nuvem',
            'ordering' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'=>'Diversos',
            'slug'=>'diversos',
            'ordering' => 16,
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
        Schema::dropIfExists('default_parent_categories');
    }
};
