@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <form class="form__register" method="POST" action="{{ route('register') }}">
        @csrf

        <input id="name" type="text" class="form__control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Введите ваше имя">

        <input id="email" type="email" class="form__control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Введите ваш Email">

        <input id="password" type="password" class="form__control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">

        <input id="password-confirm" type="password" class="form__control" name="password_confirmation" required autocomplete="new-password" placeholder="********">

        <button type="submit" class="btn btn-primary">
            {{ __('Зарегистрироваться') }}
        </button>
    </form>
@endsection
