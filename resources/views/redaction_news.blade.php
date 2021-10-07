@extends('layouts.app')

@section('title')
    Добавление записи
@endsection

@section('content')
    @if(!(isset($new)))
        <form action="{{ route('news') }}" method="post" class="news" enctype="multipart/form-data">
            @csrf

            <div class="block">
                <h1>Добавить новость</h1>
                <div class="form__block">
                    <div class="inputs">
                        <input type="text" name="name" required placeholder="Тема нововсти" autofocus>

                        <input id="photo" class="photo" type="file" name="photo" required accept="image/jpeg, image/png">

                        <textarea name="desc" id="desc" placeholder="Введите описание новости"></textarea>

                        <select name="cetegories[]" id="cetegories" multiple="multiple" size="4">
                            @foreach($categories as $cat)
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                        <button type="submit">Добавить</button>
                    </div>



                    <div class="block__img">
                        <label for="photo">
                            <img class="block__img-icon" src="{{ '../../images/block_img.svg' }}">
                        </label>
                    </div>
                </div>
            </div>

        </form>
    @else
        <form action="{{ route('redact') }}" method="post" class="news" enctype="multipart/form-data">
            @csrf

            <div class="block">
                <h1>Именить новость</h1>
                <div class="form__block">
                    <div class="inputs">

                        <input type="text" name="id" value="{{$new['id']}}" style="display: none">

                        <input type="text" name="name" required value="{{ $new['name'] }}" autofocus>

                        <input id="photo" class="photo" type="file" name="photo" accept="image/jpeg, image/jpg, image/png">

                        <textarea name="desc" id="desc" required>{{ $new['desc'] }}</textarea>

                        <textarea name="mainText" id="mainText" required>{{ $new['mainText'] }}</textarea>

                        <button type="submit">Изменить</button>
                    </div>



                    <div class="block__img">
                        <label for="photo">
                            <img class="block__img-icon" src="{{ $new['img'] }}">
                        </label>
                    </div>
                </div>
            </div>

        </form>
    @endif
@endsection
