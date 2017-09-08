@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">@lang('lawyer-dashboard.Главная')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('lawyer-dashboard.Юристы')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('lawyer-dashboard.Вопросы')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('lawyer-dashboard.Блог')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('lawyer-dashboard.Как это работает')</a></li>
    <li><a href="{{ route('about')}}">@lang('lawyer-dashboard.О нас')</a></li>
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
                            @lang('lawyer-dashboard.Мой профиль') <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="profile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h6><b>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</b></h6>
                                <p class="color-gray">@lang('lawyer-dashboard.г'). {{$lawyer->user->city->name}}</p>
                                <a href="{{ route('lawyer.info')}}">@lang('lawyer-dashboard.Редактировать')</a>
                            </li>
                            <li>
                                <i class="fa fa-hourglass pull-left"></i>
                                <p class="color-grey">
                                    @lang('lawyer-dashboard.Как считается рейтинг?')
                                </p>
                                <p>
                                    <a href="#">@lang('lawyer-dashboard.Как считается рейтинг?')</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">@lang('lawyer-dashboard.Отзывы'):</a>
                                </p>
                                <p>
                                   {{$lawyer->countPositiveFeedbacks()}} @lang('lawyer-dashboard.положительных')
                                </p>
                                <p>
                                   {{$lawyer->countNegativeFeedbacks()}} @lang('lawyer-dashboard.отрицательных')
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
                            @lang('lawyer-dashboard.Мой аккаунт') <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="account" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h3>{{$lawyer->user->balance()}} @lang('lawyer-dashboard.сум').</h3>
                                <h3>0 @lang('lawyer-dashboard.юркоинов')</h3>
                                <a href="#">@lang('lawyer-dashboard.Управление балансом')</a>
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
                            @lang('lawyer-dashboard.Моя практика') <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">@lang('lawyer-dashboard.Вопросы')</a>
                            </li>

                            <li>
                                <a href="{{route('lawyer.blog.insert')}}">@lang('lawyer-dashboard.Написать Блог')</a>
                            </li>
                            <li>
                                <a href="#">@lang('lawyer-dashboard.Документы')</a>
                            </li>
                            <li>
                                <a href="#">@lang('lawyer-dashboard.Телефонные консультации')</a>
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
                        <h4 class="text-success">@lang('lawyer-dashboard.Вопросы')</h4>
                        <p>@lang('lawyer-dashboard.Отвечайте на вопросы клиентов – зарабатывайте деньги и рейтинг')</p>
                        <a type="button" href="{{route('question.list')}}" class="btn btn-default btn-success">@lang('lawyer-dashboard.Перейти к вопросам »')</a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-primary">@lang('lawyer-dashboard.Телефонные консультации')</h4>
                        <p>@lang('lawyer-dashboard.Консультируйте клиентов по телефону, используя нашу систему')</p>
                        <button type="button" class="btn btn-default btn-primary">@lang('lawyer-dashboard.Перейти к заявкам »')</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="text-warning">@lang('lawyer-dashboard.Документы')</h4>
                        <p>@lang('lawyer-dashboard.Готовьте различные юридические документы для наших клиентов')</p>
                        <a type="button" href="{{ route
                        ('lawyer.document.info')}}" class="btn btn-default btn-warning">@lang('lawyer-dashboard.Перейти к документам »')</a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-danger">@lang('lawyer-dashboard.Заявки')</h4>
                        <p>@lang('lawyer-dashboard.Приобретайте заявки (вопросы и контакты клиента) по необходимым параметрам')</p>
                        <button type="button" class="btn btn-default btn-danger">@lang('lawyer-dashboard.Перейти к заявкам »')</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 border-gray background-white" id="orders">
                    <h5 class="text-success">@lang('lawyer-dashboard.Моя юридическая практика')</h5>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#answered-questions">@lang('lawyer-dashboard.Вопросы')</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#call-consultions">@lang('lawyer-dashboard.Консультации по телефону')</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#document-requests">@lang('lawyer-dashboard.Документы')</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#blog-created">@lang('lawyer-dashboard.Блоги')</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#notifications">@lang('lawyer-dashboard.Уведомление') <i class="fa fa-bell"
                                                                          aria-hidden="true">{{$lawyer->unreadNotifications->count()}}</i></a>
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
                                        @foreach($lawyer->blogs as $blog)
                                            <li><a href="{{ route('web.blog.show',$blog->id)}}"> {{$blog->title}}</a>
                                                <a class="btn btn-info btn-xs" href="{{route('lawyer.blog.edit', $blog->id)}}">@lang('lawyer-dashboard.Изменить')</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="notifications" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul>
                                        <li>@lang('lawyer-dashboard.Новые вопросы')
                                            <ul>
                                                @foreach($lawyer->questionNotifications as $notification)
                                                        <li><a href="{{route('web.question.show', $notification->data['id'])}}">{{$notification->data['title']}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>@lang('lawyer-dashboard.Новые блоги')
                                            <ul>
                                                @foreach($lawyer->blogNotifications as $notification)
                                                    <li><a href="{{route('web.blog.show', $notification->data['id'])}}">{{$notification->data['title']}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>@lang('lawyer-dashboard.Новые комменты')
                                            <ul>
                                                @foreach($lawyer->commentNotifications as $notification)
                                                    <li><a href="{{route('web.blog.show', $notification->data['blog_id'])}}">{{$notification->data['comment']}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <div >
                                        <a href="{{route('lawyer.notification.asRead')}}"
                                           class="btn btn-info btn-xs"> @lang('lawyer-dashboard.Отметить')</a>
                                    </div>
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
