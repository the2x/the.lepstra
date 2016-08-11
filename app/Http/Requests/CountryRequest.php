<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CountryRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'country' => 'required|max:255',
            'country_link' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'Название страны не заполнено',
            'country.max' => 'Название страны превышает 255 символов',
            'country_link.required' => 'URL для новой страны обязательно',
            'country_link.max' => 'URL страны превышает 255 символов',
        ];
    }
}
