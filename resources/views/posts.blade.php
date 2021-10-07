@extends('layouts.app')

@section('title')
    {{ $news->name }}
@endsection

@section('content')
        <div id="about">
            <div class="blog__item blog__item-block">
                <img src="{{ $news->img }}" alt="">
                    <div class="content__blog content">
                        <div class="blog__title">Тема: "{{ $news->name }}"</div><br>
                        <p class="mainText">
                            {{ $news->mainText }}
                        </p>
                        <span class="blog__date">Последние изменения: {{ $news->updated_at }}</span>
                    </div>
            </div>
        </div>
        <form action="{{ route('back') }}">
            <button type="submit">Назад</button>
        </form>
@endsection
