@extends('layouts.app')
@section('styles')
 <link href="{{asset('dist/css/how-works.css')}}" rel="stylesheet">
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">@lang('how-works.Главная')</a></li>
  <li><a href="{{ route('lawyers.list')}}">@lang('how-works.Юристы')</a></li>
  <li><a href="{{ route('question.list')}}">@lang('how-works.Вопросы')</a></li>
  <li><a href="{{ route('web.blogs')}}">@lang('how-works.Блог')</a></li>
  <li class="active-link"><a href="{{ route('how-works')}}">@lang('how-works.Как это работает')</a></li>
  <li><a href="{{ route('about')}}">@lang('how-works.О нас')</a></li>
@endsection
@section('content')

<!-- Content -->
<div class="container-fluid ">
    <div class="row" id="ask-question">
        <div class="col-sm-6 text-center">
            <h3>@lang('how-works.Задайте вопрос юристу')</h3>
            <h5>
                @lang('how-works.Вопрос юристу онлайн - услуга, которую по достоинству оценило более 350 000 наших клиентов. Это быстрый и очень удобный способ узнать мнения нескольких юристов, не покидая дома или офиса.')
            </h5>
            <a href="{{ route('question.create') }}" type="button" class="btn btn-default btn-lg btn-success pulse-button" >@lang('how-works.Задать вопрос')</a>
        </div>
    </div>
    <div class="row" id="unique-services">
        <h2>@lang('how-works.Уникальная услуга')</h2>
        <h6>@lang('how-works.Всегда качественная, надежная и комфортная правовая помощь')</h6>
        <div class="col-sm-4 text-center">
            <i class="fa fa-shield text-success"></i>
            <h3 class="text-success">0% @lang('how-works.ошибок')</h3>
            <p>@lang('how-works.Вы задаете вопрос и получаете сразу несколько аргументированных ответов — коллегиальное мнение юристов исключает вероятность ошибки.')</p>
        </div>
        <div class="col-sm-4 text-center">
            <i class="fa fa-clock-o text-primary"></i>
            <h3 class="text-primary">@lang('how-works.Юристы') 24/7</h3>
            <p>@lang('how-works.Юристы из разных регионов России ежедневно и круглосуточно готовы помочь вам в решении любых юридических вопросов.')</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-money text-warning"></i>
            <h3 class="text-warning">@lang('how-works.Экономия') 60%</h3>
            <p>@lang('how-works.Средняя стоимость услуги на нашем сайте составляет лишь 600 рублей. А это как минимум в два раза дешевле услуг юридических фирм.')</p>
        </div>
    </div>
    <div class="row" id="how-it-works">
        <h2>@lang('how-works.Как это работает')</h2>
        <h6>@lang('how-works.Всего 3 шага к решению проблемы')</h6>
        <div class="col-sm-4 text-center">
            <i class="fa fa-question-circle-o text-success"></i>
            <h3 class="text-success">@lang('how-works.Шаг 1. Задайте вопрос')</h3>
            <p>@lang('how-works.Задайте свой вопрос на нашем сайте, чтобы лучшие юристы смогли ознакомиться с ним и оказать вам необходимую правовую помощь.')</p>
        </div>
        <div class="col-sm-4 text-center">
            <i class="fa fa-file-text-o text-primary"></i>
            <h3 class="text-primary">@lang('how-works.Шаг 2. Получайте ответы')</h3>
            <p>@lang('how-works.Первые ответы юристов начнут поступать уже через 15 минут. Мы гарантируем получение подробной консультации, если вы задаете платный вопрос.')</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-check-circle-o text-warning"></i>
            <h3 class="text-warning">@lang('how-works.Шаг 3. Проблема решена!')</h3>
            <p>@lang('how-works.Поскольку вам отвечают сразу несколько юристов, ваша проблема будет решена максимально точно и оперативно - юридическая ошибка исключена.')</p>
        </div>
    </div>
    <div class="row" id="we-guarantee">
        <h2>@lang('how-works.Мы гарантируем')</h2>
        <h6>@lang('how-works.Лучшие условия для наших клиентов')</h6>
        <div class="col-sm-4 text-center">
            <i class="fa fa-check-square-o text-success"></i>
            <h3 class="text-success">@lang('how-works.Высокое качество')</h3>
            <p>@lang('how-works.Юристы проекта обладают многолетним опытом работы и оказывают наиболее точные, полные и оперативные консультации.')</p>
        </div>
        <div class="col-sm-4 text-center">
            <i class="fa fa-handshake-o text-primary"></i>
            <h3 class="text-primary">@lang('how-works.Возврат денег')</h3>
            <p>@lang('how-works.Мы уверены в качестве консультаций, именно поэтому гарантируем вам возврат денег в случае, если ваша проблема не будет решена.')</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-lock text-warning"></i>
            <h3 class="text-warning">@lang('how-works.Конфиденциальность')</h3>
            <p>@lang('how-works.Мы ценим ваше доверие и заботимся о безопасности ваших личных данных. Все платежи осуществляются через безопасное соединение.')</p>
        </div>
    </div>
    <div class="row" id="ask-question-now">
        <div class="col-sm-6 text-center">
            <h3>@lang('how-works.Решите проблему сейчас!')</h3>
            <h5>
                @lang('how-works.Зачастую промедление в решении юридического вопроса может иметь нежелательные последствия. Чтобы избежать неприятных ситуаций, доверьте решение своей проблемы нашим юристам прямо сейчас!')
            </h5>
            <a href="{{ route('question.create') }}" class="btn btn-default btn-lg btn-success pulse-button" type="button">@lang('how-works.Задать вопрос')</a>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
