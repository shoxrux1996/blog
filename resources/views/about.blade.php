@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/about.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li class="active-link"><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

<div class="container" id="info">
    <div class="row">
        <h4 class="text-center">ПРАВОВЕД.RU – ЮРИДИЧЕСКИЕ КОНСУЛЬТАЦИИ ОНЛАЙН</h4>
        <div class="col-sm-6">
            <div class="video-wrapper">
                <iframe class="youtube-player" type="text/html" width="550" height="385" src="https://www.youtube.com/embed/lUIx9i63y8M" frameborder="0"> </iframe>
            </div>
        </div>
        <div class="col-sm-6">
            <p>Правовед.RU - это сервис, связывающий профессиональных юристов с клиентами в режиме онлайн. Любой пользователь может получить здесь моментальную консультацию по всем правовым вопросам, а практикующие юристы - возможность для дополнительного заработка.</p>
            <p>Правовед.RU это:</p>
            <h4 class="text-primary"><i class="fa fa-check-square-o" aria-hidden="true"></i> БЫСТРО</h4>
            <span>решение вашего вопроса в течение 2-х часов</span>
            <h4 class="text-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> ДОСТУПНО</h4>
            <span>консультация юриста от 300 рублей</span>
            <h4 class="text-warning"><i class="fa fa-check-square-o" aria-hidden="true"></i> ПРАВИЛЬНО</h4>
            <span>коллегиальное мнение юристов</span>
        </div>
    </div>
    <p class="text-center">
        <a href="{{route('user.register')}}" class="btn btn-default btn-success btn-lg pulse-button">ЗАРЕГИСТРИРОВАТЬСЯ</a>
    </p>
</div>
<div class="container" id="features">
    <div class="row text-center">
        <div class="col-sm-6 no-padding">
            <h4 class="text-primary">Правовед.RU для клиента</h4>
        </div>
        <div class="col-sm-6 no-padding">
            <h4 class="text-success">Правовед.RU для юриста</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-question-circle-o"></i>
                <h4 class="text-primary">ВОПРОС ЮРИСТАМ</h4>
                <p>
                    С вашим вопросом ознакомятся практически все юристы сервиса. Это повышает не только скорость получения ответа на ваш запрос, но и качество консультации. Не исключено, что ответят на ваш вопрос сразу несколько юристов. Узнать больше
                </p>
                <a href="{{route('question.create')}}">Задать вопрос юристам >></a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-users"></i>
                <h4 class="text-success">НОВЫЕ КЛИЕНТЫ</h4>
                <p>
                    Мы хотим, чтобы для вас не существовало никаких границ - ни территориальных, ни временных. Это означает, что в каком бы городе вы не находились, число ваших клиентов будет только увеличиваться. С Правоведом у вас появляется реальный шанс наладить успешную практику, не выходя из собственного дома.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-commenting-o"></i>
                <h4 class="text-primary">ОНЛАЙН ЧАТ С ЮРИСТОМ</h4>
                <p>
                    Бывают ситуации, когда для получения полноценной консультации клиенту необходим личный контакт с юристом. К вашим услугам - наш онлайн чат. Общайтесь в режиме диалога, выбрав соответствующие режимы (текст, звук, видео).
                </p>
                <a href="#">Онлайн консультация >></a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-bar-chart"></i>
                <h4 class="text-success">ГИБКИЙ ГРАФИК И МЕСТО РАБОТЫ</h4>
                <p>
                    Юристы Правовед.RU не ограничены в своем рабочем времени. Работайте в наиболее комфортном для вас месте и в максимально удобном режиме. Мы же постараемся сделать так, чтобы таких возможностей у вас было как можно больше.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-file-text-o"></i>
                <h4 class="text-primary">ПОДГОТОВКА ДОКУМЕНТОВ</h4>
                <p>
                    Грамотно составить и оформить юридический документ неподготовленному человеку практически невозможно. Наши юристы оперативно сделают это за вас, даже в том случае, если потребуется создание уникального документа. Типовые формы правовых документов вы получите практически мгновенно.
                </p>
                <a href="{{route('document.create')}}">Заказать документ >></a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-quora"></i>
                <h4 class="text-success">БОЛЬШОЙ ВЫБОР ВОПРОСОВ</h4>
                <p>
                    Практика показывает, что в силу своей профессии юристам приходится быть специалистом в различных отраслях. Вы можете заявить о себе, как о специалисте широкого профиля, так и узкой специализации. Общайтесь с коллегами, делитесь опытом, повышайте свой профессиональный уровень.
                </p>
                <a href="{{route('question.list')}}">Вопросы >></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-search"></i>
                <h4 class="text-primary">ПОДБОР НУЖНОГО ЮРИСТА</h4>
                <p>
                    В каталоге Правовед.RU - сотни высокопрофессиональных юристов. Определитесь с его специализацией, и наш сервис предложит вам список юристов, обладающих знаниями и опытом именно в данной области. Выбирайте и общайтесь!</p>
                <a href="{{route('lawyers.list')}}">Выбрать юриста >></a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="feature">
                <i class="fa fa-star"></i>
                <h4 class="text-success">РЕПУТАЦИЯ</h4>
                <p>
                    Существует масса причин, объективно мешающих вашему профессиональному росту. Сотрудничество с Правовед.RU кардинально меняет эту ситуацию. Участвуйте в соревновании со своими коллегами, зарабатывая рейтинг, репутацию, и как следствие, новых клиентов.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 no-padding text-center">
            <a href="{{route('question.create')}}" class="btn btn-default btn-lg btn-primary">ЗАДАТЬ ВОПРОС ЮРИСТАМ</a>
        </div>
        <div class="col-sm-6 no-padding text-center">
            <a href="{{route('user.register')}}" class="btn btn-default btn-lg btn-success">ЗАРЕГИСТРИРОВАТЬСЯ</a>
        </div>
    </div>
    <br />
</div>

@endsection
@section('scripts')

@endsection
@endsection