<?php

namespace App\Http\Requests;

class OrderRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user_order_count' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'user_order_count.required' => 'Количество не должно быть пустым',
            'user_order_count.integer' => 'Количество должно содержать целое число',
        ];
    }
}
