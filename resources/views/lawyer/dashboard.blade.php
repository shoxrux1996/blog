@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lawyer Dashboard</div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <ul class="btn btn-default">
                    <li><a href="{{ route('lawyer.info') }}">Info</a></li>
                    <li><a href="{{ route('lawyer.blog.insert') }}">Написать блок</a></li>
                    <li><a href="{{route('question.list')}}">Вопросы</a></li>
                    <li><a href="{{route('web.blogs')}}">Блоги</a></li>

                    </ul>
                    <div class="panel-body">
                        @component('components.who')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Content -->
<div id="wrapper">
    <div class="container">
        <div class="col-sm-3">
            <!-- Profile -->
            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#profile">
                            Мой профиль <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="profile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h6><b>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</b></h6>
                                <p class="color-gray">г. {{$lawyer->user->city->name}}</p>
                                <a href="{{ route('lawyer.info')}}">Редактировать</a>
                            </li>
                            <li>
                                <i class="fa fa-hourglass pull-left"></i>
                                <p class="color-grey">
                                    Как считается рейтинг?
                                </p>
                                <p>
                                    <a href="#">Как считается рейтинг?</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Отзывы:</a>
                                </p>
                                <p>
                                   {{$lawyer->countPositiveFeedbacks()}} положительных
                                </p>
                                <p>
                                   {{$lawyer->countNegativeFeedbacks()}} отрицательных
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Profile -->

            <!-- Account -->
            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#account">
                            Мой аккаунт <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="account" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h3>{{$lawyer->user->balance()}} сум.</h3>
                                <h3>0 юркоинов</h3>
                                <a href="#">Управление балансом</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Account -->

            <!-- My practices -->
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#services">
                            Моя практика <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <a href="">Вопросы</a>
                            </li>
                            <li>
                                <a href="#">Заявки</a>
                            </li>
                            <li>
                                <a href="#">Документы</a>
                            </li>
                            <li>
                                <a href="#">Телефонные консультации</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /My practices -->
        </div>
        <div class="col-sm-9">
            <div class="row text-center background-white border-gray" id="services-list">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="text-success">Вопросы</h4>
                        <p>Отвечайте на вопросы клиентов –
                            зарабатывайте деньги и рейтинг</p>
                        <a type="button" href="{{route('question.list')}}" class="btn btn-default btn-success">Перейти к вопросам »</a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-primary">Телефонные консультации</h4>
                        <p>Консультируйте клиентов по телефону,
                            используя нашу систему</p>
                        <button type="button" class="btn btn-default btn-primary">Перейти к заявкам »</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="text-warning">Документы</h4>
                        <p>Готовьте различные юридические
                            документы для наших клиентов</p>
                        <button type="button" class="btn btn-default btn-warning">Перейти к документам »</button>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-danger">Заявки</h4>
                        <p>Приобретайте заявки (вопросы и контакты
                            клиента) по необходимым параметрам</p>
                        <button type="button" class="btn btn-default btn-danger">Перейти к заявкам »</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 border-gray background-white" id="orders">
                    <h5 class="text-success">Моя юридическая практика</h5>
                    <h6 class="color-gray">У вас пока нет ни одного заказа.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
@endsection
