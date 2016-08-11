<?php

namespace App\Http\Requests;

class CostRequest extends Request
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
