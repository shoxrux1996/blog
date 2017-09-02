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
                        @if($question->type == 2 || $question->type == 1 )
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
                <h3>Ответы</h3>

                <!-- Comment news style -->
                @foreach($question->answers as $answer)
                    <div class="col-sm-9 answer">
                        <div class="answer-header">
                            <img class="img-thumbnail"
                                 src="{{$answer->lawyer->user->file != null ? asset($answer->lawyer->user->file->path.$answer->lawyer->user->file->file) : asset("dist/images/headshot-1.png")}}"
                                 alt="Lawyer 1"/>
                            <h4 class="lawyer-name">{{$answer->lawyer->firstName}}</h4>
                            <h6 class="lawyer-type">{{$answer->lawyer->job_status}}</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <hr>
                        </div>
                        <div class="answer-content">
                            {!! $answer->text !!}
                        </div>
                        <div class="answer-footer">
                        <span class="pull-right answered-time">
                            {{\Carbon\Carbon::instance($answer->created_at)->toFormattedDateString()}}
                        </span>
                        </div>
                    </div>
            @endforeach
            <!-- /Comment new style -->
            </div>

            <div class="row">
                <div class="col-sm-9">
                    @if (Auth::guard('lawyer')->check() && $question->solved != true && Auth::guard('lawyer')->user()->type == 2)
                        @if(($question->type == 1 || $question->type == 2))
                            {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                            <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                                <div>
                                    {{Form::textarea('text', null,['class'=>'myTextEditor','style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
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
                        @if($question->type == 0)
                            <div class="row">
                                {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                                <div>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                    <div>
                                        {{Form::textarea('text', null,['class'=>'myTextEditor','style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                                    </div>
                                    <div class="col-md-4" style="margin:10px;">
                                        {{Form::file('files[]', ['multiple' => 'multiple'])}}
                                    </div>
                                    <div class="col-md-2" style="float: right; text-align:right; margin: 10px 0;">
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
    </div>
@endsection
@section('scripts')
    <script src={{asset('js/tinymce/tinymce.min.js')}}></script>
    <script>tinymce.init({
            mode: "specific_textareas",
            editor_selector: "myTextEditor",
            plugins: 'link code',
            height: 300,
            toolbar: 'undo redo | cut copy paste'
        });

    </script>
@endsection
