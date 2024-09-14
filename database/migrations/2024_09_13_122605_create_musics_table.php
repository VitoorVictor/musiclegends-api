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
        Schema::create('musics', function (Blueprint $table) {
            $table->id(); // ID único para cada música
            $table->string('title' , 30); // Título da música
            $table->string('artist',40); // Artista da música
            $table->string('album')->nullable(); // Álbum da música (opcional)
            $table->string('genre')->nullable(); // Gênero da música (opcional)
            $table->string('audio_path'); // Caminho do arquivo de música
            $table->string('image_path'); // Caminho do arquivo de imagem da música
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musics');
    }
};
