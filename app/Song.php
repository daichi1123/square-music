<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    protected $fillable = [
        'user_id',
        'url',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'song_id', 'user_id')->withTimestamps();
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }

    public function isFavoriteBy(?User $user): bool
    {
        return $user
            ? (bool)$this->favorites->where('id', $user->id)->count()
            : false;
    }

    public function getCountFavoritesAttribute(): int
    {
        return $this->favorites->count();
    }
}
