@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
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
                    <div class="panel-heading">Client Dashboard</div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                        <a class="btn btn-info btn-sm col-md-offset-1" href="{{ route('client.info') }}">Info</a>
                    <ul>
                        <li>Заказать услугу</li>
                        <li><a href="{{route('web.blogs')}}">Блоги</a></li>

                        <ul>
                            <li><a href="{{ route('question.create') }}">Задать вопрос</a></li>
                            <li><a href="{{ route('document.create') }}">Заказать документ</a></li>
                            
                        </ul>

                        <li><a href="{{ route('lawyers.list') }}">Наши юристы</a></li>
                        <li><a href="#">Активные заявки</a></li>
                        <ul>
                            <li><a href="{{ route('question.list') }}">Вопросы</a></li>
                        </ul>
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
                                <h6><b>Улугбек</b></h6>
                                <p class="color-gray">г. Москва</p>
                                <a href="{{ route('client.info')}}">Редактировать</a>
                            </li>
                            <li>
                                <h3>{{$client->user->balance()}} сум.</h3>
                                <a href="#">Управление балансом</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Profile -->

            <!-- Site services -->
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#services">
                            Мой профиль <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                           <li>
                               <a href="#">Вопросы юристам</a>
                           </li>
                            <li>
                                <a href="#">Консультации по телефону</a>
                            </li>
                            <li>
                                <a href="#">Документы</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Site services -->
        </div>
        <div class="col-sm-9">
            <div class="row text-center background-white border-gray" id="services-list">
                <div class="col-sm-4">
                    <h4 class="text-success">Вопрос</h4>
                    <p>Задайте любой вопрос, и в течение 15 минут вы получите ответы наших юристов.</p>
                    <a href="{{ route('question.create') }}" type="button" class="btn btn-default btn-success">Задать вопрос</a>
                </div>
                <div class="col-sm-4">
                    <h4 class="text-primary">Звонок</h4>
                    <p>Оставьте номер телефона, и наш юрист свяжется с вами, чтобы проконсультировать вас по любому вопросу.</p>
                    <a href="{{ route('call.create') }}" type="button" class="btn btn-default btn-primary">Заказать звонок</a>
                </div>
                <div class="col-sm-4">
                    <h4 class="text-warning">Документ</h4>
                    <p>Закажите документ, после чего наш юрист свяжется с вами, уточнит детали и подготовит его.</p>
                    <a href="{{ route('document.create') }}" type="button" class="btn btn-default btn-warning">Заказать документ</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 border-gray background-white" id="orders">
                    <h5 class="text-success">Мои заказы</h5>
                    <h6 class="color-gray">У вас пока нет ни одного заказа.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
@endsection
