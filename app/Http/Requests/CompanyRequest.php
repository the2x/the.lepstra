<?php

namespace App\Http\Requests;

class CompanyRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'company' => 'required|max:255',
            'company_link' => 'required|max:255',
            'info' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'Название компании не заполнено',
            'company.max' => 'Название компании превышает 255 символов',
            'company_link.required' => 'URL для новой компании обязателен',
            'company_link.max' => 'URL компании превышает 255 символов',
            'info.required' => 'История компании не заполнена',
        ];
    }
}
