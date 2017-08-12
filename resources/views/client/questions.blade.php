@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
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
        <div class="row">
            <div class="col-sm-9">
                @foreach($questions as $question)

                <div class="col-sm-12 question">
                    @if($question->type ==2)
                        <span class="question-price">
                        <b>{{$question->price}} сум</b>
                        <span>
                            стоимость<br />
                            вопроса
                        </span>
                    </span>
                    @endif
                    <h4 class="title"><a href="{{ route('client.question.show', $question->id)}}">{{$question->title}}</a></h4>
                    <p class="description">{{$question->text}}</p>
                    <p>
                        <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                        <span class="number"> вопрос №{{$question->id}}</span>
                        <span class="author">{{$question->client->user->firstName}}, г.{{$question->client->user->city->name}} </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="">{{$question->category->name}}</a></span>
                        <a class="answers" href="{{route('web.question.show', $question->id)}}">
                            {{$question->answers->count()}}
                        </a>
                    </p>
                </div>
                @endforeach

                <div class="col-sm-12 text-center">
                    {!! $questions->links('pagination') !!}

                </div>
            </div>
            <div class="col-sm-3 text-center">
                <h3>Лучшие юристы</h3>
                @foreach($best_lawyers as $lawyer)
                <div class="best-lawyers">
                    <img src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-1.png')}}"
                         class="img-rounded"/>
                    <h3>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h3>
                    <h6>
                        <b>{{$lawyer->job_status}}, г. {{$lawyer->user->city->name}}</b>
                    </h6>
                    <a type="button" class="btn btn-default btn-success" href="{{route('web.lawyer.show', $lawyer->id)}}">Посмотреть
                        профиль</a>
                </div>
                @endforeach
                <div class="ask-question-block text-center">
                    <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0')}}.png" />
                    <h6>
                        <b>Задайте вопрос бесплатно</b>
                    </h6>
                    <a class="btn btn-default btn-success pulse-button" type="button" href="ask-question.html">Задать вопрос</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection