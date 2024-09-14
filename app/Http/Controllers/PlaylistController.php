<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        return Playlist::all();
    }

    public function show($id)
    {
        return Playlist::findOrFail($id);
    }

    public function store(Request $request)
    {
        $playlist = Playlist::create($request->all());
        return response()->json($playlist, 201);
    }

    public function update(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->update($request->all());
        return response()->json($playlist, 200);
    }

    public function destroy($id)
    {
        Playlist::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
