<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRedactionRequest extends FormRequest
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
            'photo.mimes' => 'Доступные форматы изображения: jpeg, jpg, png'
        ];
    }
}
