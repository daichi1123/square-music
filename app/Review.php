<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'login_id', 'first_name', 'review'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function rules()
    {
        return [
            'review' => ['required', 'string', 'max:100'],
        ];
    }
}
