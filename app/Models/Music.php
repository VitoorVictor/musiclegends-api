<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;


    protected $table = 'musics';
    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'audio_path',
        'image_path',
    ];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
