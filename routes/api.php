<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Rotas para playlists
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/{id}', [PlaylistController::class, 'show']);
Route::post('/playlists', [PlaylistController::class, 'store']);
Route::put('/playlists/{id}', [PlaylistController::class, 'update']);
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);

// Rotas para músicas
Route::get('/musics', [MusicController::class, 'index']);
Route::get('/musics/{id}', [MusicController::class, 'show']);
Route::post('/musics', [MusicController::class, 'store']);
Route::put('/musics/{id}', [MusicController::class, 'update']);
Route::delete('/musics/{id}', [MusicController::class, 'destroy']);

// Rotas para curtidas de playlists
Route::post('/playlists/{id}/like', [PlaylistLikeController::class, 'like']);
Route::delete('/playlists/{id}/unlike', [PlaylistLikeController::class, 'unlike']);