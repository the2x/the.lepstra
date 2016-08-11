<?php

namespace App\Http\Requests;

class AddressRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'firstname' => 'required|max:32',
            'lastname' => 'required|max:32',
            'email' => 'required|email|max:32',
            'country' => 'required|max:32',
            'city' => 'required|max:32',
            'house' => 'required|max:12',
            'apartment' => 'required|max:12',
            'zip' => 'required|max:12',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Имя обязательно',
            'firstname.max' => 'Имя не должно превышать 32 символа',
            'lastname.required' => 'Фамилия обязательна',
            'lastname.max' => 'Фамилия не должна превышать 32 символа',
            'email.required' => 'Email обязателен',
            'email.email' => 'Email возможно не верный формат',
            'email.max' => 'Email не должен превышать 32 символа',
            'country.required' => 'Страна обязательна',
            'country.max' => 'Страна не должна превышать 32 символа',
            'city.required' => 'Город обязателен',
            'city.max' => 'Город не должен превышать 32 символа',
            'house.required' => 'Дом обязателен',
            'house.max' => 'Дом не должен превышать 12 символов',
            'apartment.required' => 'Квартира обязательна',
            'apartment.max' => 'Квартира не должна превышать 32 символа',
            'zip.required' => 'Индекс обязателен',
            'zip.max' => 'Индекс не должен превышать 12 символов',
        ];
    }
}
