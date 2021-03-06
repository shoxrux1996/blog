<!-- Header -->
<div class="container-fluid my-header color-white dark-blue">
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-6">
            <a href="{{ route('home')}}">
                <img class="img-responsive" src="{{ asset('dist/images/logo.png')}}" alt="Logo"/>
            </a>
        </div>
        <div class="col-md-10 col-sm-9 col-xs-6 info">
            <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i> (71) 123-45-67 или</span>
            <a href="#"><img src="{{asset('dist/images/help-icon.png')}}" alt="Help Icon"/></a>
            <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('dist/images/flag-'.\App::getLocale().'.png')}}" alt="Flag"/>
            </button>
            <ul class="dropdown-menu">
                <li>
                @if(\App::isLocale('ru'))
                    <a href="{{ route('lang.switch',['locale'=>'uz']) }}">
                        <img src="{{ asset('dist/images/flag-uz.png')}}" alt="Flag"/>
                    </a>
                @else
                    <a href="{{ route('lang.switch',['locale'=>'ru']) }}">
                        <img src="{{ asset('dist/images/flag-ru.png')}}" alt="Flag"/>
                    </a>
                @endif
                </li>
            </ul>
            <br/>
            @if (!(Auth::guard('client')->check() || Auth::guard('lawyer')->check()))
                <a href="{{ route('user.register') }}">Зарегистрироваться</a> | <a href="{{ route('user.login') }}">Войти</a>
            @else
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                        @if(Auth::guard('client')->check())   {{ Auth::guard('client')->user()->user->firstName }} @else {{ Auth::guard('lawyer')->user()->user->firstName }} @endif
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="profile"><a
                                    href="">@if(Auth::guard('client')->check())   {{ Auth::guard('client')->user()->email }} @else {{ Auth::guard('lawyer')->user()->email }} @endif</a>
                        </li>
                        <div class="divider"></div>
                        <li>
                            <a href=" {{(Auth::guard('client')->check()) ? route('client.dashboard') : route('lawyer.dashboard')}}">Личный
                                кабинет</a></li>
                        <li>
                            <a href="{{(Auth::guard('client')->check()) ? route('client.info') : route('lawyer.info')}}">Редактировать
                                профиль</a></li>
                        <li><a href="#">Партнёрская программа</a></li>
                        <li><a href="#">Финансы</a></li>
                        <li><a href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <hr class="header-divider">
</div>
<!-- /Header -->

<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container dark-blue">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                @yield('menu')
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
@yield('content')
<!-- Footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 guarantee">
                <span>ГАРАНТИЯ 100% КАЧЕСТВА</span>
                <p>
                    <img src="{{ asset('dist/images/first-place-icon.png')}}" alt="First place icon"/>
                    Лучшие юристы со всей Узбекистана
                </p>
                <p>
                    <img src="{{ asset('dist/images/happy-icon.png')}}" alt="Happy icon"/>
                    Более 123 45 довольных клиентов
                </p>
                <p>
                    <img src="{{ asset('dist/images/money-back-icon.png')}}" alt="Money back icon"/>
                    Мы поможем вам — или вернём деньги!
                </p>
                <p class="text-center"><a href="#">Все гарантии Yuridik.uz</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <span><a href="index.html">Yuridik.uz</a></span>
                <p><a href="#">Задать вопрос</a></p>
                <p><a href="#">Заказать документ</a></p>
                <p><a href="#">Частые вопросы</a></p>
                <p><a href="#">Наши юристы</a></p>
                <p><a href="#">Отзывы</a></p>
                <p><a href="#">Гарантии</a></p>
                <p><a href="#">Журнал</a></p>
                <p><a href="#">Вопросы</a></p>
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">Клиентам</a></span>
                <p><a href="#">Задать вопрос</a></p>
                <p><a href="#">Заказать документ</a></p>
                <p><a href="#">Частые вопросы</a></p>
                <p><a href="#">Наши юристы</a></p>
                <p><a href="#">Отзывы</a></p>
                <p><a href="#">Гарантии</a></p>
                <p><a href="#">Журнал</a></p>
                <p><a href="#">Вопросы</a></p>
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">Юристам</a></span>
                <p><a href="#">Задать вопрос</a></p>
                <p><a href="#">Заказать документ</a></p>
                <p><a href="#">Частые вопросы</a></p>
                <p><a href="#">Наши юристы</a></p>
                <p><a href="#">Отзывы</a></p>
            </div>
        </div>
        <div class="row social-link">
          <span>
            <a href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="http://www.telegram.me"><i class="fa fa-telegram" aria-hidden="true"></i></a>
          </span>
        </div>
    </div>
</footer>
<!-- /Footer