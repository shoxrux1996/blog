<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('user.login') }}">Login</a>
                        <a href="{{ route('user.register') }}">Register</a>
                    @endif
                </div>
            

            <div class="content">
                @if (Session::has('message'))
                                 <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <ul>
                    <li><a href="{{ route('question.create') }}">Задать вопрос</a></li>
                    <li><a href="{{ route('document.create') }}">Заказать документ</a></li>
                    <li><a href="#">Заказать звонок</a></li>
                
               
                    <li><a href="{{ route('question.list') }}">Смотреть все вопросы</a></li>
                    <li><a href="{{ route('category.list') }}">Посмотреть все категории</a></li>
                    <li><a href="{{ route('lawyers.list') }}">Все юристи проекта</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
