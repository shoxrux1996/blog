@extends('layouts.app-admin')
@section('styles')
    <link href="dist/css/individual-question.css" rel="stylesheet">
    <style>
        .question {
            background-color: rgba(9, 0, 158, 0.09);
            padding: 20px;
            margin-bottom: 20px;
        }

        .question .author {
            float: right;
        }

        .date, .author, .number {
            color: #888888;
        }

        .question .answers {
            float: right;
            background-color: #18BB9B;
            padding: 10px;
            color: #fff;
            margin-top: -15px;
        }

        .question .question-price {
            font-size: 16px;
            background-color: #DDE5F1;
            padding: 5px 10px 10px 5px;
            margin-left: -30px;
            color: #3c66a0 !important;
            margin-bottom: 20px;
        }

        .question .question-price span {
            display: inline-block;
            vertical-align: top;
            font-size: 10px;
        }

        #questions-section .active {
            color: #18BB9B !important;
            border-bottom: 1px dashed #18BB9B !important;
            pointer-events: none;
            cursor: default;
        }

        #questions-section .not-active {
            color: #8B8F9C !important;
            border-bottom: 0 !important;
        }

        [hidden] {
            display: none !important;
        }

    </style>
@endsection

@section('content')

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
                    <a class="btn btn-danger pull-right" href="{{route('admin.question.delete', $question->id)}}">Удалить</a>

                    <h4 class="title"><a
                                href="{{route('admin.question.show', $question->id)}}">{{$question->title}}</a>
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
                        <span class="category">Категория: <a href="">{{$question->category->name}}</a></span>
                        <a class="answers" href="{{route('admin.question.show', $question->id)}}">
                            {{$question->answers->count()}}
                        </a>
                    </p>
                    <div>
                        @foreach($question->files as $file)
                            <a class="label label-default"
                               href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: 10px;">
                <hr>
                <h3><span class="glyphicon glyphicon-comment"></span> Answers</h3>
                @foreach($question->answers as $answer)
                    <div class="comment">
                        <div class="author-info">
                            <img src="{{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($answer->lawyer->email))) . "?s=50&d=monsterid" }}"
                                 class="author-img">
                            <div class="author-name">
                                <h4>{{$answer->lawyer->email}}</h4>
                                <p class="author-time">{{date('F n, Y - g:iA'), strtotime($answer->created_at)}}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {{$answer->text}}
                        </div>
                        <div class="tags col-md-6 ">
                            @foreach($answer->files as $file)
                                <a class="label label-default"
                                   href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                            @endforeach
                            <hr>
                            @if($answer->feedback != null)
                                <h2>{{$answer->feedback->text}}</h2>
                            @endif
                        </div>
                        @endforeach
                        <hr>
                    </div>
            </div>
        </div>
    </div>
@endsection

