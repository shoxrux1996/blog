@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

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
                                <a href="{{route('card.payment')}}">Управление балансом</a>
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
                                <a href="{{ route('my.answers')}}">Вопросы</a>
                            </li>

                            <li>
                                <a href="{{route('lawyer.blog.insert')}}">Написать Блог</a>
                            </li>
                            <li>
                                <a href="{{ route('my.requests')}}">Документы</a>
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
                        <a type="button" href="{{ route
                        ('lawyer.document.info')}}" class="btn btn-default btn-warning">Перейти к документам »</a>
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
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#answered-questions">Вопросы</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#call-consultions">Консультации по телефону</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#document-requests">Документы</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#blog-created">Блоги</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="answered-questions" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-sm-6">
                                <ul>
                                    @foreach($lawyer->answers->unique('question_id')->reverse() as $answer)
                                        <li><a href="{{ route('web.question.show',$answer->question->id)}}"> {{$answer->question->title}}</a></li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div id="call-consultions" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-4">

                                </div>
                            </div>
                        </div>
                        <div id="document-requests" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul>
                                        @foreach($lawyer->requests->unique('document_id')->reverse() as $request)
                                            <li><a href="{{ route('lawyer.document.show',$request->document->id)}}"> {{$request->document->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="blog-created" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul>
                                       {{-- @foreach($lawyer->blogs as $blog)
                                            <li><a href="{{ route('lawyer.blog.show',$blog->id)}}"> {{$blog->title}}</a></li>
                                        @endforeach--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
