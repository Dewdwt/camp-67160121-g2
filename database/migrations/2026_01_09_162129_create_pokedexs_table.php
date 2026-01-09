<?php
// ไฟล์: 2026_01_09_162129_create_pokedexs_table.php

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
        // แก้จาก pokedexes เป็น pokedexs
        Schema::create('pokedexs', function (Blueprint $table) {  // ← แก้เป็น pokedexs
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('species');
            $table->decimal('height', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokedexs');  // ← แก้เป็น pokedexs
    }
};
