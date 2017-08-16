<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('dist/images/favicon.png')}}" type="image/png">
    <title>Юридическая консультация онлайн - бесплатная помощь юристов и адвокатов 24 часа в сутки</title>

    <!-- Styles -->
    <!-- Bootstrap Core -->
    <link href="{{ asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/typography.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('dist/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<!-- Header -->
<div class="container-fluid my-header color-white dark-blue">
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="#" data-toggle="modal" data-target="#beta-version"">
                <i>Внимание! Веб-сайт работает в тестовом режиме. Если нашли ошибку, пожалуйста нажмите на эту ссылку.</i>
            </a>

            <!-- Modal -->
            <div id="beta-version" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->

                    <div class="modal-content">
                        <form action="#">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Спасибо за помощь!!!</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Ваше имя</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="error">Ошибка:</label>
                                    <textarea class="form-control" rows="7" id="error"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-default btn-success">Отправить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Modal content -->

                    <!-- Style -->
                    <style>
                        #beta-version .modal-body label{
                            color: #1F2746;
                            float: left;
                        }
                    </style>
                    <!-- /Style -->

                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
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
<!-- /Footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 guarantee">
                <span>ГАРАНТИЯ 100% КАЧЕСТВА</span>
                <p>
                    <img src="{{asset('dist/images/first-place-icon.png')}}" alt="First place icon" />
                    Лучшие юристы со всей Узбекистана
                </p>
                <p>
                    <img src="{{asset('dist/images/happy-icon.png')}}" alt="Happy icon" />
                    Более 123 45 довольных клиентов
                </p>
                <p>
                    <img src="{{asset('dist/images/money-back-icon.png')}}" alt="Money back icon" />
                    Мы поможем вам — или вернём деньги!
                </p>
                <p class="text-center"><a href="#">Все гарантии Yuridik.uz</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <span><a href="index.html">Yuridik.uz</a></span>
                <p><a href="about.html">О проекте</a></p>
                <p><a href="team.html">О команде</a></p>
                <p><a href="contacts.html">Контакты</a></p>
                <p><a href="partners.html">Наши партнёры</a></p>
                <p><a href="all-categories.html">Категории вопросов</a></p>
                <p><a href="blog.html">Блог</a></p>
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">Клиентам</a></span>
                <p><a href="ask-question.html">Задать вопрос</a></p>
                <p><a href="order-call.html">Заказать звонок</a></p>
                <p><a href="order-document.html">Заказать документ</a></p>
                <p><a href="faq.html">Частые вопросы</a></p>
                <p><a href="lawyers.html">Наши юристы</a></p>
                <p><a href="about.html#guarantees">Гарантии</a></p>
                <p><a href="questions.html">Вопросы</a></p>
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">Юристам</a></span>
                <p><a href="become-lawyer.html">Стать юристом проекта</a></p>
                <span><a href="#">Партнерам</a></span>
                <p><a href="ad.html">Рекламодателям</a></p>
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
<!-- /Footer -->


<!-- Scripts -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('dist/js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap Core JS -->
<script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{ asset('dist/js/script.js')}}"></script>

@yield('scripts')

<!-- Preloader -->
<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #2C3E50 url("{{ asset('dist/images/puff.svg')}}" ) center center no-repeat;background-size:79px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
<!-- /Preloader -->
</body>
</html>
