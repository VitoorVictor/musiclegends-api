<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        return Music::all();
    }

    public function show($id)
    {
        return Music::findOrFail($id);
    }

    public function store(Request $request)
{
    // Validação dos campos
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'artist' => 'required|string|max:255',
        'album' => 'nullable|string|max:255', // Campo opcional
        'genre' => 'nullable|string|max:255', // Campo opcional
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Upload de imagem opcional
        'audio' => 'required|mimes:mp3,wav|max:20000', // Upload de áudio obrigatório
    ]);

    // Processando o upload da imagem, se houver
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image_path'] = 'storage/' .$imagePath;
    }

    // Processando o upload do áudio
    if ($request->hasFile('audio')) {
        $audioPath = $request->file('audio')->store('audios', 'public');
        $validatedData['audio_path'] = 'storage/' .$audioPath;
    }

    // Criando a música no banco de dados
    $music = Music::create($validatedData);

    // Retorna a resposta de sucesso
    return response()->json($music, 201);
}


    public function update(Request $request, $id)
    {
        $music = Music::findOrFail($id);
        $music->update($request->all());
        return response()->json($music, 200);
    }

    public function destroy($id)
    {
        Music::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
