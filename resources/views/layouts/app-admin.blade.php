<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('dist/images/favicon.png')}}" type="image/png">
    <title>Yuridik.uz - Панель администратора</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/dashboard.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('dist/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{asset('dist/css/morris.css')}}" rel="stylesheet">
    <style type="text/css">#hellopreloader > p {
            display: none;
        }

        #hellopreloader_preload {
            display: block;
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-width: 1000px;
            background: #2C3E50 url({{asset('dist/images/three-dots.svg')}}) center center no-repeat;
            background-size: 79px;
        }</style>
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    @yield('styles')
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.html">Панель администратора</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> {{Auth::user()->name}} <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('admin.info')}}"><i class="fa fa-fw fa-user"></i> Профиль</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fa fa-fw fa-power-off"></i>
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Панель</a>
                </li>
                <li>
                    <a href="{{route('admin.clients.index')}}"><i class="fa fa-fw fa-users"></i> Пользователи</a>
                </li>
                @if(Auth::user()->type == 2)
                    <li>
                        <a href="{{route('admin.moderators.index')}}"><i class="fa fa-fw fa-address-card"></i>
                            Модераторы</a>
                    </li>
                @endif
                <li>
                    <a href="{{route('admin.comments.index')}}"><i class="fa fa-fw fa-comments"></i> Комментарии</a>
                </li>
                <li>
                    <a href="{{route('admin.blogs')}}"><i class="fa fa-fw fa-newspaper-o"></i> Блог</a>
                </li>
                <li>
                    <a href="{{route('admin.questions.index')}}"><i class="fa fa-fw fa-question-circle-o"></i>
                        Вопросы</a>
                </li>
                <li>
                    <a href="{{route('admin.documents.index')}}"><i class="fa fa-fw fa-address-card"></i> Документы</a>
                </li>
                <li>
                    <a href="{{route('admin.answers.index')}}"><i class="fa fa-fw fa-reply"></i> Ответы</a>
                </li>
                <li>
                    <a href="{{route('admin.tags.index')}}"><i class="fa fa-fw fa-reply"></i> Тэги</a>
                </li>
                <li>
                    <a href="{{route('admin.category.info')}}"><i class="fa fa-fw fa-reply"></i> Категория</a>
                </li>
                {{-- <li>
                     <a href="{{route('admin.feedbacks.index')}}"><i class="fa fa-fw fa-reply"></i> Отзывы</a>
                 </li>--}}
                <li>
                    <a href="{{route('admin.cities.index')}}"><i class="fa fa-fw fa-reply"></i> Города</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

{!! Html::script('js/jquery-3.2.1.min.js') !!}
{!! Html::script('js/script.js') !!}
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
<!-- Morris data -->
{!! Html::script('dist/js/raphael.min.js') !!}
{!! Html::script('dist/js/morris.min.js') !!}
{!! Html::script('dist/js/morris-data.js') !!}


<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");
    function fadeOutnojquery(el) {
        el.style.opacity = 1;
        var interhellopreloader = setInterval(function () {
            el.style.opacity = el.style.opacity - 0.05;
            if (el.style.opacity <= 0.05) {
                clearInterval(interhellopreloader);
                hellopreloader.style.display = "none";
            }
        }, 16);
    }
    window.onload = function () {
        @yield('onloadScripts')
    setTimeout(function () {
            fadeOutnojquery(hellopreloader);
        }, 1000);
    };
</script>
<!-- /Preloader -->

<!-- Footer -->
<!-- Scripts -->


@yield('scripts')
</body>
</html>
