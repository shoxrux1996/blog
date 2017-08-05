@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
@endsection
@section('body')
    @extends('layouts.body')
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li class="active-link"><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')


    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
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
                                @if($question->type ==2)
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
                            @if($question->type == 2)
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
                            @endif
                        @endforeach
                            <div class="col-sm-12 text-center">
                                {!! $questions_costly->links('pagination') !!}

                            </div>
                    </div>
                    <div id="section3" class="section" style="display: {{ $section == 3 ? "block" : "none" }};">
                        @foreach($questions_free as $question)
                            @if($question->type == 1)
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
                            @endif
                        @endforeach
                            <div class="col-sm-12 text-center">
                                {!! $questions_free->links('pagination') !!}

                            </div>
                    </div>

                </div>
                <div class="col-sm-3 text-center">
                    <h3>Лучшие юристы</h3>
                    <div class="best-lawyers">
                        <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded"/>
                        <h3>Керс Олег</h3>
                        <h6>
                            <b>юрист, г. Калининград</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть
                            профиль</a>
                    </div>
                    <div class="best-lawyers">
                        <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded"/>
                        <h3>Керс Олег</h3>
                        <h6>
                            <b>юрист, г. Калининград</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть
                            профиль</a>
                    </div>
                    <div class="best-lawyers">
                        <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded"/>
                        <h3>Керс Олег</h3>
                        <h6>
                            <b>юрист, г. Калининград</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть
                            профиль</a>
                    </div>
                    <div class="ask-question-block text-center">
                        <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0')}}.png"/>
                        <h6>
                            <b>Задайте вопрос бесплатно</b>
                        </h6>
                        <a class="btn btn-default btn-success pulse-button" type="button" href="ask-question.html">Задать
                            вопрос</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@endsection
@section('scripts')

@endsection