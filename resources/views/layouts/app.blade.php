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
    @if(\App::isLocale('ru'))
        <title>Юридическая консультация онлайн - бесплатная помощь юристов и адвокатов 24 часа в сутки</title>
    @else
        <title>Onlayn Yuridik konsultatsiya - bepul yuristlar yordami 24 soat</title>
    @endif

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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-78271281-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter45844224 = new Ya.Metrika({
                        id:45844224,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/45844224" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>

<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Header -->
<div class="container-fluid my-header color-white dark-blue">
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="#" data-toggle="modal" data-target="#beta-version">
            <i>@lang('app.attention')</i>
            </a>

            <!-- Modal -->
            <div id="beta-version" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal contentforpush-->

                    <div class="modal-content">
                        <form action="{{route('error.find')}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">@lang('app.thank')</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">@lang('app.yourname')</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="error">@lang('app.error'):</label>
                                    <textarea name="error" class="form-control" rows="7" id="error"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">@lang('app.cancel')</button>
                                <button type="submit" class="btn btn-default btn-success">@lang('app.send')</button>
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
            <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i> (99) 837-37-77 @lang('app.or')</span>
            <a href="{{ route('faq') }}"><img src="{{asset('dist/images/help-icon.png')}}" alt="Help Icon"/></a>
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
                <a href="{{ route('user.register') }}">@lang('app.registration')</a> | <a href="{{ route('user.login') }}">@lang('app.login')</a>
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
                            <a href=" {{(Auth::guard('client')->check()) ? route('client.dashboard') : route('lawyer.dashboard')}}">@lang('app.dashboard')</a></li>
                        <li>
                            <a href="{{(Auth::guard('client')->check()) ? route('client.info') : route('lawyer.info')}}">@lang('app.edit')</a></li>
                        {{--<li><a href="#">@lang('app.partners')</a></li>--}}
                        {{--<li><a href="#">@lang('app.finance')</a></li>--}}
                        <li><a href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">@lang('app.logout')</a>
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
                <span>@lang('app.qualityguarantee')</span>
                <p>
                    <img src="{{asset('dist/images/first-place-icon.png')}}" alt="First place icon" />
                    @lang('app.bestlawyers')
                </p>
                <p>
                    <img src="{{asset('dist/images/happy-icon.png')}}" alt="Happy icon" />
                    @lang('app.satisfiedclients')
                </p>
                <p>
                    <img src="{{asset('dist/images/money-back-icon.png')}}" alt="Money back icon" />
                    @lang('app.moneyback')
                </p>
                <p class="text-center"><a href="{{route('guarantees')}}">@lang('app.allguarantees')</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <span><a href="{{ route('home') }}">Yuridik.uz</a></span>
                <p><a href="{{ route('about') }}">@lang('app.aboutproject')</a></p>
                <p><a href="{{ route('team') }}">@lang('app.aboutus')</a></p>
                <p><a href="{{ route('contacts') }}">@lang('app.contacts')</a></p>
                <p><a href="{{ route('faq') }}">@lang('app.faqs')</a></p>
                <p><a href="{{ route('license') }}">@lang('app.Лицензионное соглашение')</a></p>
                <p><a href="{{ route('guarantees') }}">@lang('app.guarantees')</a></p>
                {{--<p><a href="{{ route('partners') }}">@lang('app.ourpartners')</a></p>--}}
                {{--<p><a href="{{ route('category.list') }}">@lang('app.categories')</a></p>--}}
                {{--<p><a href="{{ route('web.blogs') }}">@lang('app.blog')</a></p>--}}
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">@lang('app.toclients')</a></span>
                <p><a href="{{ route('question.create') }}">@lang('app.askquestion')</a></p>
                <p><a href="{{ route('call.create') }}">@lang('app.ordercall')</a></p>
                <p><a href="{{ route('document.create') }}">@lang('app.orderdocument')</a></p>
                <p><a href="{{ route('lawyers.list') }}">@lang('app.ourlawyers')</a></p>
                <p><a href="{{ route('question.list') }}">@lang('app.questions')</a></p>
                <p><a href="{{route('category.list')}}">@lang('app.Все специализации')</a></p>
            </div>
            <div class="col-md-3 col-sm-6 hidden-xxs">
                <span><a href="#">@lang('app.tolawyers')</a></span>
                <p><a href="{{ route('become-lawyer') }}">@lang('app.becomelawyer')</a></p>
                <span><a href="#">@lang('app.topartners')</a></span>
                <p><a href="{{ route('ad') }}">@lang('app.toadvertisers')</a></p>
            </div>
        </div>
        <div class="row social-link">
          <span>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/yuridik"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://t.me/yuridikuz"><i class="fa fa-telegram" aria-hidden="true"></i></a>
              <!-- Yandex.Metrika informer -->
            <a href="https://metrika.yandex.ru/stat/?id=45844224&amp;from=informer" target="_blank" rel="nofollow">
                <img src="https://informer.yandex.ru/informer/45844224/1_0_8686FFFF_6666FFFF_1_pageviews" style="width:80px; height:15px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" class="ym-advanced-informer" data-cid="45844224" data-lang="ru" />
            </a>
              <!-- /Yandex.Metrika informer -->
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




@yield('scripts')
<!-- Custom JS -->
<script src="{{ asset('dist/js/script.js')}}"></script>
<!-- Preloader -->
<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #2C3E50 url("{{ asset('dist/images/puff.svg')}}" ) center center no-repeat;background-size:79px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
<!-- /Preloader -->
</body>
</html>
