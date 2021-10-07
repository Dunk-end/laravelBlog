<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'desc' => 'required|max:100',
            'cetegories' => 'required',
            'mainText' => 'required|max:500',
            'photo' => 'dimensions:jpeg, jpg, png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле название обязательное!',
            'name.max' => 'Максимальная длина поля название 30!',
            'desc.required' => 'Поле описание обязательное!',
            'desc.max' => 'Максимальная длина поля описание 100!',
            'mainText.required' => 'Поле для информации обязательное!',
            'mainText.max' => 'Максимальная длина поля для информации 500!',
            'cetegories.required' => 'Выбор катерой(ии) обязателен!',
            'photo.dimensions' => 'Доступные форматы изображения: .jpeg, .png'
        ];
    }
}
