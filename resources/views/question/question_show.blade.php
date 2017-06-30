@extends('layouts.app')
@section('title', "| Blog")
@section('content')

    <div class="container">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-8" >
                    <label class="col-sm-6" >{{ $question->title }}</label>
                    <div class="tags col-md-8 ">
                        <h4>Client:</h4> <p>{{$question->client->email}}</p>
                        <h4>Category:</h4> <p>{{$question->category->name}}</p>
                        <div class="tags col-md-8 ">
                            @foreach($question->files as $file)
                                <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><p>{{substr(strip_tags($question->text),0,250)}} {{strlen(strip_tags($question->text))>250 ? '...' : ""}}</p></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="margin: 10px;">
                <hr>
                    <h3><span class="glyphicon glyphicon-comment"></span> Answers</h3>
                    @foreach($question->answers as $answer)
                        <div class="comment">
                            <div class = "author-info">
                                <img src="{{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($answer->lawyer->email))) . "?s=50&d=monsterid" }}" class="author-img">
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
                                    <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                @endforeach
                                <hr>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                </div>
            </div>
        </div>
        @if (Auth::guard('lawyer')->check())
            <div class="row">
                <div id="comment-form" class="col-md-4 col-md-offset-2" style="left:0">
                    {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                    <div class="row">
                        <div class=".col-md-12">
                            {{Form::label('text', "comment: ") }}
                            {{Form::textarea('text', null, ['class'=>'form-control', 'rows'=>'5'])}}
                            {{Form::file('files[]', ['multiple' => 'multiple'])}}
                            {{Form::submit('Add Comment', ['class'=> 'btn btn-success btn-block'])}}
                        </div>
                    </div>
                    {{Form::close() }}
                </div>
            </div>
        @endif
    </div>



@endsection

