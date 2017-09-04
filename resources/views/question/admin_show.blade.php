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
                    <a class="btn btn-danger pull-right"
                       href="{{route('admin.question.delete', $question->id)}}">Удалить</a>
                    <a class="btn btn-info pull-right"
                       href="{{route('admin.question.edit', $question->id)}}">Изменить</a>
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
                            <div>
                                @foreach($answer->files as $file)
                                    <a class="label label-default"
                                       href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            <!-- /Comment new style -->
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
