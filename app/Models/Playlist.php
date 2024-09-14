<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;


    protected $table = 'playlists';
    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function musics()
    {
        return $this->belongsToMany(Music::class);
    }
}
