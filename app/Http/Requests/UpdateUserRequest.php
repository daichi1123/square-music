<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Country;
use App\Age;
use App\Rules\HalfWidth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * ユーザ情報を更新する際のヴァリデーション
     *
     * @param  array
     */
    public function rules()
    {
        $country = new Country();
        // 値をデータベースのcountry_id登録数の最大値までにする
        $maxCountryId = $country->max('id');

        $age = new Age();
        // 値をデータベースのage_id登録数の最大値までにする
        $maxAgeId = $age->max('id');

        return [
            'last_name' => ['required', 'string', 'max:24'],
            'middle_name' => ['string', 'nullable', 'max:24'],
            'first_name' => ['required', 'string', 'max:24'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'country_id' => ['required', 'integer', 'max:' . $maxCountryId],
            'age_id' => ['required', 'integer', 'max:' . $maxAgeId],
            'self_introduction' => ['required', 'string', 'max:250'],
            'insta_id' => ['nullable', 'string', new HalfWidth, 'max:50']
        ];
    }
}
