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
        Schema::create('playlist_likes', function (Blueprint $table) {
            $table->id(); // ID único para cada like
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chave estrangeira para o usuário que curtiu a playlist
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade'); // Chave estrangeira para a playlist curtida
            $table->timestamps(); // Campos created_at e updated_at

            // Definindo uma chave única para garantir que um usuário não possa curtir a mesma playlist mais de uma vez
            $table->unique(['user_id', 'playlist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_likes');
    }
};
