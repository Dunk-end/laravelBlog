<header>
    <div class="header" id="navbar">
        <div class="wrap">
            <nav>
                    @if(!(Auth::user()))
                        <a href="{{ '/' }}" class="logo">nomenest</a>
                        <ul class="nav__menu">
                            <li class="nav__item"><a href="{{ '/' }}" class="nav__link">Главная</a></li>
                        @if (Route::has('login'))
                            <li class="nav__item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav__item">
                                <a class="nav__link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                            </li>
                        @endif
                    @else
                        @if((Auth::user()->getRoleNames())[0] === 'admin')
                            <a href="{{ route('admins') }}" class="logo">nomenest</a>
                            <ul class="nav__menu">
                                <li class="nav__item"><a href="{{ route('admins') }}" class="nav__link">Главная</a></li>
                                <li class="nav__item"><a href="{{ route('admin') }}" class="nav__link">Админка</a></li>
                        @else
                            <a href="{{ '/' }}" class="logo">nomenest</a>
                            <ul class="nav__menu">
                                <li class="nav__item"><a href="{{ '/' }}" class="nav__link">Главная</a></li>
                                <li class="nav__item">
                                    <a href="{{ route('append_news') }}" class="nav__link">
                                        Добавить запись
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__link hello__user">
                                        {{ 'Привет, ' . Auth::user()->name }}
                                    </a>
                                </li>
                        @endif
                            <li class="nav__item">
                                <a class="nav__link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    @yield('header__content')
</header>
