@extends('layouts.app')

@section('title')
    Гланая
@endsection

@section('header__content')
    <div class="header__content">
        <div class="wrap">
            <div class="header__main-text">
                <h1>Привет, в этом блоге вы можете просматривать, создавать, редактировать и удалять новости</h1>
            </div>
        </div>
        <a href="#about" class="syte"><img src="{{ 'images/arrow.svg' }}" alt="Стрелка не найдена"></a>
    </div>
@endsection

@section('content')
    @if(Auth::user())
        @foreach($news as $new)
            <div id="about">
                <div class="blog__item">
                    @if($new->user_id == Auth::user()->getAuthIdentifier())
                        <a href="/redactionuser?id={{ $new->id }}">Изменить новость: <pre>  </pre> <b>{{ $new->name }}</b></a>
                        <a href="/delete?id={{ $new->id }}">Удалить новость: <pre>  </pre> <b>{{ $new->name }}</b></a>
                    @endif
                    <a href="/posts{{ $new->id }}">
                        <div class="blog__icon">
                            <img src="{{ $new->img }}" alt="Фото не найдено">
                        </div>
                        <div class="content__blog">
                            <div class="blog__title">Тема: "{{ $new->name }}" <br><span class="blog__date">{{ $new->updated_at }}</span></div>
                            <div class="blog__rounded"></div>
                            <p>
                                {{ $new->desc }}
                            </p><br>
                            <p>
                                Катерории: <br>
                                    <ul>
                                        @foreach($new->categories as $category)
                                            <li>{{$category['name']}}</li>
                                        @endforeach
                                    </ul>
                            </p>
                        </div>
                        <div class="blog__item__arrow">
                            >
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        @foreach($news as $new)
            <div id="about">
                <div class="blog__item">
                    <a href="/posts{{ $new->id }}">
                        <div class="blog__icon">
                            <img src="{{ $new->img }}" alt="Фото не найдено">
                        </div>
                        <div class="content__blog">
                            <div class="blog__title">Тема: "{{ $new->name }}" <br><span class="blog__date">{{ $new->updated_at }}</span></div>
                            <div class="blog__rounded"></div>
                            <p>
                                {{ $new->desc }}
                            </p><br>
                            <p>
                                Катерории: <br>
                                    <ul>
                                        @foreach($new->categories as $category)
                                            <li>{{$category['name']}}</li>
                                        @endforeach
                                    </ul>
                            </p>
                        </div>
                        <div class="blog__item__arrow">
                            >
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    @endif
@endsection
