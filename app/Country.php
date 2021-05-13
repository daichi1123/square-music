<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function pickUpColumn()
    {
        $countries = Country::pluck('country_name', 'id');
        return $countries;
    }
}
