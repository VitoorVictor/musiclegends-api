<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistLike extends Model
{
    use HasFactory;

    protected $table = 'playlist_likes';
    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'user_id',
        'playlist_id',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
