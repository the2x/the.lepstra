<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'category' => 'required|max:255',
            'category_link' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Название категории не заполнено',
            'category.max' => 'Название категории превышает 255 символов',
            'category_link.required' => 'URL для новой категории обязательно',
            'category_link.max' => 'URL категории превышает 255 символов',
        ];
    }
}
