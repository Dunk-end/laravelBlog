@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <form class="form__login" method="POST" action="{{ route('login') }}">
        @csrf

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="Введите ваш Email">

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">

        <button type="submit" class="btn btn__login">
            {{ __('Войти') }}
        </button>
    </form>
@endsection
