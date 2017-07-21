<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/typography.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div id="app">
    <!-- Header -->
    <div class="container-fluid my-header color-white dark-blue">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6">
                <img class="img-responsive" src="dist/images/logo.png" alt="Logo" />
            </div>
            <div class="col-md-10 col-sm-9 col-xs-6 info">
                <span>(877) 881-0947 или </span>
                <a href="#"><img src="dist/images/help-icon.png" alt="Help Icon" /></a>
                <a href="#"><img src="dist/images/flag-uzb.png" alt="Flag Uzbekistan" /></a><br>
                @if (Auth::guest())
                    <a href="{{ route('user.login') }}">Login</a>
                    <a href="{{ route('user.register') }}">Register</a>
                @else
                    <a href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                        {{ csrf_field() }}
                    </form>
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li class="active-link"><a href="index.html">Главная</a></li>
                    <li><a href="lawyers.html">Юристы</a></li>
                    <li><a href="">База данных</a></li>
                    <li><a href="">Блог</a></li>
                    <li><a href="">Как это работает</a></li>
                    <li><a href="login.html">Войты</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->

    @yield('content')
</div>
<!-- Footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 guarantee">
                <span>ГАРАНТИЯ 100% КАЧЕСТВА</span>
                <p>
                    <img src="dist/images/first-place-icon.png" alt="First place icon" />
                    Лучшие юристы со всей Узбекистана
                </p>
                <p>
                    <img src="dist/images/happy-icon.png" alt="Happy icon" />
                    Более 123 45 довольных клиентов
                </p>
                <p>
                    <img src="dist/images/money-back-icon.png" alt="Money back icon" />
                    Мы поможем вам — или вернём деньги!
                </p>
                <p class="text-center"><a href="#">Все гарантии Yuridik.uz</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <span><a href="#">Yuridik.uz</a></span>
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
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-telegram" aria-hidden="true"></i>
          </span>
        </div>
    </div>
</footer>
<!-- Footer -->
<!-- Scripts -->

{!! Html::script('js/jquery-3.2.1.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
@yield('scripts')
</body>
</html>
