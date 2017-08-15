@extends('layouts.app')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/individual-lawyer.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li class="active-link"><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img style="width: 200px; height: 200px;" src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-3.jpg')}}"
                                 class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                {{$lawyer->user->firstName}}
                                {{$lawyer->user->lastName}}
                            </div>
                            <div class="profile-usertitle-job">
                                {{$lawyer->job_status}}, г. {{$lawyer->user->city->name}} <br/>
                                {{--Был в сети сегодня в 15:04--}}
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm">Обратиться к юристу</button>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-user"></i>
                                        Профиль</a></li>
                                <li><a data-toggle="tab" href="#specialisation"><i class="fa fa-tasks"></i>
                                        Специализация</a></li>
                                <li><a data-toggle="tab" href="#education"><i class="fa fa-graduation-cap"></i>
                                        Образование</a></li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
                <div class="tab-content">
                    <div class="col-md-9 tab-pane fade in active profile-content" id="profile">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                <h1>10,0</h1>
                                <h6><b>Рейтинг Yuridik.uz</b></h6>
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h1>99%</h1>
                                <h6><b>довольных клиентов</b></h6>
                                <p>
                                    <a href="#">{{$lawyer->countPositiveFeedbacks() }} отзывов</a>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h1>
                                    <i class="fa fa-registered"></i>
                                    <h5><b>Член экспертного совета Правовед.ru</b></h5>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>
                                    <i class="fa fa-building"></i> О себе
                                </h4>
                                <p>{{$lawyer->about_me}}</p>

                                <p><span class="color-gray">На проекте:</span>
                                    с {{Carbon\Carbon::parse($lawyer->created_at)->toFormattedDateString()}}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4>
                                    <i class="fa fa-money"></i> Стоимость услуг
                                </h4>
                                <p>{{$lawyer->profile_shown_price}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 tab-pane fade profile-content" id="specialisation">
                        <div class="row" id="category-section">
                            <h3>Специализация</h3>
                            <h6 class="color-gray"><b>Всего {{$lawyer->answers->count()}} ответа</b></h6>
                            <hr>
                            <h6 class="color-gray"><b>Специализируется в 5 категориях:</b></h6>
                            <div class="row">
                                @foreach($lawyer->categories as $category)
                                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                    <a href="{{route('web.category.show', $category->name)}}">
                                        <i class="fa fa-building"></i> {{$category->name}}
                                    </a>
                                    @foreach($category->children as $sub_category)
                                    <p><a href="{{route('web.category.show', $sub_category->name)}}">{{$sub_category->name}}</a></p>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 tab-pane fade profile-content" id="education">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <h5><b><i class="fa fa-graduation-cap"></i> Образование 1</b></h5>
                                    <li><h6><span class="color-gray">Страна:</span> Россия</h6></li>
                                    <li><h6><span class="color-gray">Город:</span> Красноярск</h6></li>
                                    <li><h6><span class="color-gray">ВУЗ:</span> СибЮИ ФСКН</h6></li>
                                    <li><h6><span class="color-gray">Факультет:</span> Общеюридический</h6></li>
                                    <li><h6><span class="color-gray">Год выпуска:</span> 2013</h6></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <h5><b><i class="fa fa-graduation-cap"></i> Образование 2</b></h5>
                                    <li><h6><span class="color-gray">Страна:</span> Россия</h6></li>
                                    <li><h6><span class="color-gray">Город:</span> Красноярск</h6></li>
                                    <li><h6><span class="color-gray">ВУЗ:</span> СибЮИ ФСКН</h6></li>
                                    <li><h6><span class="color-gray">Факультет:</span> Общеюридический</h6></li>
                                    <li><h6><span class="color-gray">Год выпуска:</span> 2013</h6></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection