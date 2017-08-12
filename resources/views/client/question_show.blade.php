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
                        <h4 class="title">{{$question->title}}</h4>
                        <p class="description">{{$question->text}}</p>
                        <p>
                            <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                            <span class="number"> вопрос №{{$question->id}}</span>
                            <span class="author">{{$question->client->user->firstName}}
                                , г.{{$question->client->user->city->name}} </span>
                        </p>
                        <hr>
                        <p>
                            <span class="category">Категория: <a href="">{{$question->category->name}}</a></span>
                            <i class="answers">
                                {{$question->answers->count()}}
                            </i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Answers</h3>
                @foreach($question->answers as $answer)
                    <div class="panel panel-content col-sm-9">
                        <div class="comment">
                            <div class="author-info">
                                <div class="author-name col-sm-9">
                                    <a href="#"><h4>{{$answer->lawyer->user->firstName}}</h4></a>
                                    <div class="comment-content">
                                        {!! $answer->text !!}
                                    </div>
                                    <div class="tags col-md-6">
                                        @foreach($answer->files as $file)
                                            <a class="label label-default"
                                               href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <p class="author-time">{{date('F n, Y - g:iA'), strtotime($answer->created_at)}}</p>
                                    <img src="{{ $answer->lawyer->file != null ? asset($answer->file->path.$answer->file->file) : asset('dist/images/avatar_large_male_client_default.jpg')}}"
                                         class="author-img col-md-3" style=" width: 200px; height: 200px;">
                                </div>
                            </div>
                        </div>
                        <div>
                            @if(Auth::guard('client')->check() && ($answer->feedback == null))
                                {{Form::open(['route' => ['feedback.create', $answer->id],'method' => 'POST']) }}
                                <div class="col-md-5">
                                    {{Form::label('text', "Отзыв: ") }}
                                    {{Form::textarea('text', null, ['rows' =>'2', 'cols'=>'43'])}}
                                    <div class="col-md-12">
                                        <div class="col-md-6">like {{Form::radio('helped',true,true)}}</div>
                                        <div class="col-md-4 " style="float:right;">
                                            dislike {{Form::radio('helped',false)}}</div>
                                    </div>
                                    {{Form::submit('Оставить отзыв', ['class'=> 'btn btn-success btn-block'])}}
                                </div>
                                {{Form::close() }}
                            @endif
                            @if($answer->feedback != null)
                                <p style="color:rebeccapurple">{{$answer->feedback->text}}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                @if (Auth::guard('lawyer')->check() && $question->solved != true)
                    @if($question->type == 2  && Auth::guard('lawyer')->user()->type == 2)

                        {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}

                        <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                            @if ($errors->has('text'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                            @endif
                            <div>
                                {{Form::textarea('text', null,['style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                            </div>


                            <div class="col-md-4" style="margin:10px;">
                                {{Form::file('files[]', ['multiple' => 'multiple'])}}
                            </div>
                            <div class="col-md-2" style="float:right; margin: 10px;">
                                {{Form::submit('Ответить', ['class'=> 'btn btn-success'])}}
                            </div>

                        </div>
                        {{Form::close() }}

                    @endif
                    @if($question->type == 1)
                        <div class="row">
                            {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}

                            <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                                <div>
                                    {{Form::textarea('text', null,['style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                                </div>


                                <div class="col-md-4" style="margin:10px;">
                                    {{Form::file('files[]', ['multiple' => 'multiple'])}}
                                </div>
                                <div class="col-md-2" style="float:right; margin: 10px;">
                                    {{Form::submit('Ответить', ['class'=> 'btn btn-success'])}}
                                </div>

                            </div>
                            {{Form::close() }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection