<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|min:5',
            'password' => 'required|alpha_dash|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле Email обязательное!',
            'email.email' => 'Адрес электронной почты должен содержать: "@"!',
            'email.min' => 'Минимальная длина поля Email не менее 5!',
            'password.required' => 'Поле пароль обязательное!',
            'password.alpha_dash' => 'Поле пароль должно содержать только буквенные символы, цифры, знаки подчёркивания и дефисы!',
            'password.min' => 'Минимальная длина пароля не менее 8!',
        ];
    }
}
