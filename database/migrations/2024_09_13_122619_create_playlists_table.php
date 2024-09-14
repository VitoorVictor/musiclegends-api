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
        Schema::create('playlists', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' do tipo bigint unsigned e chave primária
            $table->string('title'); // Adiciona uma coluna para o título
            $table->string('description'); // Adiciona uma coluna para a descrição
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Define a coluna user_id como chave estrangeira
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
