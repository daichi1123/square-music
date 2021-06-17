<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'middle_name',
        'first_name',
        'email',
        'password',
        'country_id',
        'age_id',
        'sex',
        'self_introduction',
        'insta_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * パスワードリセット通知の送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Song::class, 'favorites', 'user_id', 'song_id')->withTimestamps();
    }

    public function favorites_user()
    {
        return $this->belongsToMany(Song::class, 'favorites', 'song_id', 'user_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function follow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;

        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }

    public function unfollow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;

        if ($existing && !$myself) {
            $this->followings()->detach($userId);
        }
    }

    public function favorite($songId)
    {
        $exist = $this->is_favorite($songId);

        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($songId);
            return true;
        }
    }

    public function unfavorite($songId)
    {
        $exist = $this->is_favorite($songId);

        if ($exist) {
            $this->favorites()->detach($songId);
            return true;
        } else {
            return false;
        }
    }

    public function is_favorite($songId)
    {
        return $this->favorites()->where('song_id', $songId)->exists();
    }
}
