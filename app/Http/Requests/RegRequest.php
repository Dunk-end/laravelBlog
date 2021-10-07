<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|min:5|unique:users',
            'password' => 'required|alpha_dash|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Поле имя обязательное!',
          'name.min' => 'Минимальная длина поля имя не менее 3!',
          'email.required' => 'Поле Email обязательное!',
          'email.unique' => 'Пользователь с таким Email уже существует!',
          'email.min' => 'Минимальная длина поля Email не менее 5!',
          'email.email' => 'Адрес электронной почты должен содержать: "@"!',
          'password.required' => 'Поле пароль обязательное!',
          'password.alpha_dash' => 'Поле пароль должно содержать только буквенные символы, цифры, знаки подчёркивания и дефисы!',
          'password.confirmed' => 'Пароли не совпадают!',
          'password.min' => 'Минимальная длина пароля не менее 8!',
          'password_confirmation.min' => 'Минимальная длина пароля не менее 8!',
          'password_confirmation.required' => 'Поле проверки пароля обязательное!'
        ];
    }
}
