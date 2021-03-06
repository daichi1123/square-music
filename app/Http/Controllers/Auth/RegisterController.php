<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Country;
use App\Age;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $age = new Age();
        // 値をデータベースのage_id登録数の最大値までにする
        $maxAgeId = $age->max('id');

        $country = new Country();
        // 値をデータベースのcountry_id登録数の最大値までにする
        $maxCountryId = $country->max('id');

        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:24'],
            'middle_name' => ['string', 'nullable', 'max:24'],
            'first_name' => ['required', 'string', 'max:24'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country_id' => ['required', 'integer', 'max:' . $maxCountryId],
            'age_id' => ['required', 'integer', 'max:' . $maxAgeId],
            'sex' => ['required', 'string'],
            'self_introduction' => ['required', 'string', 'max:250'],
            'insta_id' => ['nullable', 'string', 'max:50']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_id' => $data['country_id'],
            'age_id' => $data['age_id'],
            'sex' => $data['sex'],
            'self_introduction' => $data['self_introduction'],
            'insta_id' => $data['insta_id']
        ]);
    }
}
