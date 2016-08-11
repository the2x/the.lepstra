<?php

namespace App\Http\Requests;

class UpdateProductRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'cover' => 'mimes:jpeg,jpg,png,gif',
            'brand' => 'required|max:255',
            'categories' => 'required|max:255',
            'country' => 'required|max:255',
            'description' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png,gif',
            'size' => 'required|max:32',
            'color' => 'required|max:32',
            'price' => 'required|numeric',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Название продукта не заполненно',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'brand.required' => 'Компания не выбрана',
            'brand.max' => 'Компания не должен превышать 255 символов',
            'categories.required' => 'Категория не выбрана',
            'categories.max' => 'Категория не должна превышать 255 символов',
            'country.required' => 'Страна не выбрана',
            'country.max' => 'Страна не должна превышать 255 символов',
            'cover.mimes' => 'Обложка должна быть формата: jpeg, jpg, png, gif',
            'description.required' => 'Описание продукта не заполненно',
            'photo.*.mimes' => 'Фотографии должны быть формата: jpeg, jpg, png, gif',
            'size.required' => 'Размер не указан',
            'size.max' => 'Размер не должен превышать 32 символа',
            'color.required' => 'Цвет не указан',
            'color.max' => 'Цвет не должен превышать 32 символа',
            'price.required' => 'Цена не указана',
            'price.numeric' => 'Цена — не верный формат',
        ];
    }
}
