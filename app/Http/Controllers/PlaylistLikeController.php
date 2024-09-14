<?php

namespace App\Http\Controllers;

use App\Models\PlaylistLike;
use Illuminate\Http\Request;

class PlaylistLikeController extends Controller
{
    public function like($playlistId)
    {
        // Lógica para curtir uma playlist
        PlaylistLike::create([
            'playlist_id' => $playlistId,
            'user_id' => auth()->id(), // Supondo que o usuário esteja autenticado
        ]);

        return response()->json(['message' => 'Playlist liked'], 201);
    }

    public function unlike($playlistId)
    {
        // Lógica para remover a curtida de uma playlist
        PlaylistLike::where('playlist_id', $playlistId)
            ->where('user_id', auth()->id())
            ->delete();

        return response()->json(['message' => 'Playlist unliked'], 200);
    }
}
