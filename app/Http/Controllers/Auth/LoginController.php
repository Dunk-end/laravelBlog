<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function login(LoginRequest $req)
    {
            if (Auth::attempt($req->only(['email', 'password']))) {
                $user  = Auth::user();
                $roles = $user->getRoleNames();
                if ($roles['0'] === 'user') {

                    return redirect()->route('home')->with('success', 'Вы успешно авторизованы!');
                } else {

                    return redirect()->route('admins')->with('success', 'Вы успешно авторизованы!');
                }
            } else {
                return redirect()->back()->with('error', 'Не верный Email или пароль!');
            }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
