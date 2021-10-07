<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected function create(RegRequest $req)
    {
           $user                 = new User;
           $user->name           = $req->input('name');
           $user->email          = $req->input('email');
           $user->password       = Hash::make($req->input('password'));
           $user->remember_token = Str::random(64);
           $user->assignRole('user');
           $user->save();

           return redirect()->route('home')->with('success', 'Вы успешно зарегистрированы!');
    }
}
