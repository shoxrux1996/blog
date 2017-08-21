@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
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
        <!-- Category info -->
        <div class="container">
            <div class="row background-white padding-30">
                <ol class="breadcrumb">
                    <li><a href="{{route('category.list')}}">Категории</a></li>
                    @if($category->parent == null)
                        <li class="active">{{$category->name}}</li>
                    @else
                        <li class=""><a href="{{route('web.category.show', $category->parent->id)}}">{{$category->parent->name}}</a> </li>
                        <li class="active">{{$category->name}}</li>
                    @endif
                </ol>
                <div class="col-sm-9">
                    <div class="category-description">
                        {!! $category->text !!}
                        <h5>Популярные темы в этой категории</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @if($category->children != null)
                                        @foreach($category->children as $cat)
                                            <li><a href="{{route('web.category.show', $cat->name)}}">{{$cat->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if($category->parent != null)
                                        <li><a href="{{route('web.category.show', $category->parent->name)}}">{{$category->parent->name}}</a>
                                        </li>
                                    @endif
                                    @foreach($cat1 as $cat)
                                        <li><a href="{{route('web.category.show', $cat->name)}}">{{$cat->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @foreach($cat2 as $cat)
                                        <li><a href="{{route('web.category.show', $cat->name)}}">{{$cat->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img class="img-responsive" src="{{asset('dist/images/sidebar-ad.png')}}"/>
                </div>
            </div>
        </div>
        <!-- /Category info -->

        <!-- Questions related to category -->
        <div class="container">
            <div class="row">
                <h3>Последние вопросы по теме «договор аренды нежилого помещения»</h3>
                <div class="col-sm-9">
                    <!-- Search -->
                    <div class="input-group" id="search">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Все темы <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Корпоративное право</a></li>
                                <li><a href="#">Гражданское право</a></li>
                                <li><a href="#">Лицензирование</a></li>
                                <li><a href="#">Недвижимость</a></li>
                                <li><a href="#">Защита прав потребителя</a></li>
                                <li><a href="#">Автомобильное право</a></li>
                                <li><a href="#">Военное право</a></li>
                                <li><a href="#">Семейное право</a></li>
                                <li><a href="#">Страхование</a></li>
                            </ul>
                        </div><!-- /btn-group -->
                        <input type="text" class="form-control" aria-label="...">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                Искать
                            </button>
                        </div>
                    </div><!-- /input-group -->
                    <!-- /Search -->
                    <p class="question-type">
                        <span class="{{ $section == 1 ? "active-type" : "" }}"><a href="{{route('question.list')}}"
                            >Все</a> </span>
                        <span class="{{ $section == 2 ? "active-type" : "" }}"> <a href="{{route('costly.questions')}}"
                                                                                   onclick="switchSection('section2')">Платные</a> </span>
                        <span class="{{ $section == 3 ? "active-type" : "" }}"> <a href="{{route('free.questions')}}"
                                                                                   onclick="switchSection('section3')">Бесплатные</a> </span>
                    </p>
                    <div id="section1" class="section" style="display: {{ $section == 1 ? "block" : "none" }};">
                        @foreach($questions as $question)
                            <div class="col-sm-12 question">
                                @if($question->type == 2 || $question->type == 1)
                                    <span class="question-price">
                            <b>{{$question->price}} сум</b>
                            <span>
                                стоимость<br/>
                                вопроса
                            </span>
                        </span>
                                @endif
                                <h4 class="title"><a
                                            href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                </h4>
                                <p class="description">{{$question->text}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                    <span class="number"> вопрос №{{$question->id}}</span>
                                    <span class="author">{{$question->client->user->firstName}}
                                        , г.{{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">Категория: <a
                                                href="">{{$question->category->name}}</a></span>
                                    <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                        {{$question->answers->count()}}
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div id="section2" class="section" style="display: {{ $section == 2 ? "block" : "none" }};">
                        @foreach($questions_costly as $question)

                            <div class="col-sm-12 question">
                                    <span class="question-price">
                            <b>{{$question->price}} сум</b>
                            <span>
                                стоимость<br/>
                                вопроса
                            </span>
                        </span>

                                <h4 class="title"><a
                                            href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                </h4>
                                <p class="description">{{$question->text}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                    <span class="number"> вопрос №{{$question->id}}</span>
                                    <span class="author">{{$question->client->user->firstName}}
                                        , г.{{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">Категория: <a
                                                href="">{{$question->category->name}}</a></span>
                                    <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                        {{$question->answers->count()}}
                                    </a>
                                </p>
                            </div>

                        @endforeach
                        <div class="col-sm-12 text-center">
                            {!! $questions_costly->links('pagination') !!}

                        </div>
                    </div>
                    <div id="section3" class="section" style="display: {{ $section == 3 ? "block" : "none" }};">
                        @foreach($questions_free as $question)

                            <div class="col-sm-12 question">
                                <h4 class="title"><a
                                            href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                </h4>
                                <p class="description">{{$question->text}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                    <span class="number"> вопрос №{{$question->id}}</span>
                                        <span class="author">{{$question->client->user->firstName}}
                                            , г.{{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">Категория: <a
                                                href="">{{$question->category->name}}</a></span>
                                    <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                        {{$question->answers->count()}}
                                    </a>
                                </p>
                            </div>

                        @endforeach
                        <div class="col-sm-12 text-center">
                            {!! $questions_free->links('pagination') !!}

                        </div>
                    </div>

                </div>
                <!-- Sidebar -->
                <div class="col-sm-3 text-center">
                    <h3>Лучшие юристы</h3>
                    @foreach($best_lawyers as $lawyer)
                        <div class="best-lawyers">
                            <img src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}"
                                 class="img-rounded"/>
                            <h3>{{$lawyer->user->firstName}}</h3>
                            <h6>
                                <b>{{$lawyer->job_status}}, г. {{  $lawyer->user->city->name }}</b>
                            </h6>
                            <a type="button" class="btn btn-default btn-success" href="{{route('web.lawyer.show', $lawyer->id)}}">Посмотреть профиль</a>
                        </div>
                    @endforeach

                    <div class="ask-question-block text-center">
                        <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0.png')}}"/>
                        <h6>
                            <b>Задайте вопрос бесплатно</b>
                        </h6>
                        <a class="btn btn-default btn-success pulse-button" type="button"
                           href="{{route('question.create')}}">Задать вопрос</a>
                    </div>
                </div>
                <!-- /Sidebar -->
            </div>
        </div>
        <!-- /Questions related to category -->
    </div>

@endsection