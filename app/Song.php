<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['user_id','url','comment'];

    public function rules()
    {
        return [
            'url' => 'required',
            'comment' => 'max:36',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','song_id','user_id')->withTimestamps();
    }
}
