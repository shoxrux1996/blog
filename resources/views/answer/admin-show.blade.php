@extends('layouts.app-admin')


@section('styles')
    <link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
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
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm-9 question">
                <h4 class="title">{{$answer->lawyer->email}}
                </h4>
                <div>
                    <a
                            href="{{route('admin.question.show', $answer->question->id)}}">Вопрос: {{$answer->question->title}}</a>
                </div>
                <a href=""><h3>Ответ <strong>#{{$answer->id}}</strong></h3></a>
                <h4 class="description">{!! $answer->text !!}</h4>
                <p>
                    <span class="date">{{Carbon\Carbon::parse($answer->created_at)->toFormattedDateString()}}</span>
                    <span class="number"> вопрос №{{$answer->id}}</span>
                    <span class="author">{{$answer->lawyer->user->firstName}}
                        , г.{{$answer->lawyer->user->city->name}} </span>
                </p>
                <hr>
                <div>
                    @foreach($answer->files as $file)
                        <a class="label label-default"
                           href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2 ">
                <a onclick="return confirm('Вы уверены?');" href="{{route('admin.answer.delete', $answer->id)}}" class="btn btn-danger pull-right btn-block"
                   style="margin-top: 20px">Удалить</a>
            </div>
        </div>
    </div>
@endsection
