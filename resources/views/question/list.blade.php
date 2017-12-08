@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
@endsection

@section('content')


    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <!-- Search -->
                    <form method="GET" action="{{route('search.questions.bycategory')}}">
                    <div class="input-group" id="search">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('questions.Все темы') <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category2)
                                    <li>
                                        <a href="{{route('search.questions.bycategory', $category2->name)}}">{{$category2->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /btn-group -->
                        <input type="text" name="name" class="form-control" aria-label="...">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                @lang('questions.Искать')
                            </button>
                        </div>
                    </div><!-- /input-group -->
                    </form>
                    <!-- /Search -->
                    <p class="question-type">
                        <span class="{{ $section == 1 ? "active-type" : "" }}"><a href="{{route('question.list')}}"
                                                                             >@lang('questions.Все')</a> </span>
                        <span class="{{ $section == 2 ? "active-type" : "" }}"> <a href="{{route('costly.questions')}}"
                                  onclick="switchSection('section2')">@lang('questions.Платные')</a> </span>
                        <span class="{{ $section == 3 ? "active-type" : "" }}"> <a href="{{route('free.questions')}}"
                                  onclick="switchSection('section3')">@lang('questions.Бесплатные')</a> </span>
                    </p>
                    <div id="section1" class="section" style="display: {{ $section == 1 ? "block" : "none" }};">
                        @foreach($questions as $question)
                            @if(!$question->disabled || (Auth::guard('lawyer')->check() && Auth::guard('lawyer')->user()->type == 2))
                            <div class="col-sm-12 question">
                                @if($question->type == 2 || $question->type == 1)
                                    <span class="question-price">
                                        <b>{{$question->price}} сум</b>
                                        <span>
                                            @lang('questions.стоимость')<br/>
                                            @lang('questions.вопроса')
                                        </span>
                                    </span>
                                @endif
                                <h4 class="title"><a
                                            href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                </h4>
                                <p class="description">{{$question->text}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                    <span class="number"> @lang('questions.вопрос') №{{$question->id}}</span>
                                    <span class="author">{{$question->client->user->firstName}}
                                        , г.{{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">@lang('questions.Категория'): <a href="{{route('web.category.show', $question->category->name)}}">{{$question->category->name}}</a></span>
                                    <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                        {{$question->answers->count()}}
                                    </a>
                                </p>
                            </div>
                            @endif
                        @endforeach
                            <div class="col-sm-12 text-center">
                                {!! $questions->links('pagination') !!}
                            </div>
                    </div>
                    <div id="section2" class="section" style="display: {{ $section == 2 ? "block" : "none" }};">
                        @foreach($questions_costly as $question)
                            @if(!$question->disabled || (Auth::guard('lawyer')->check() && Auth::guard('lawyer')->user()->type == 2))
                            <div class="col-sm-12 question">
                                    <span class="question-price">
                                        <b>{{$question->price}} сум</b>
                                        <span>
                                            @lang('questions.стоимость')<br/>
                                            @lang('questions.вопроса')
                                        </span>
                                    </span>

                                <h4 class="title"><a
                                            href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                </h4>
                                <p class="description">{{$question->text}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                    <span class="number"> @lang('questions.вопрос') №{{$question->id}}</span>
                                    <span class="author">{{$question->client->user->firstName}}
                                        , г.{{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">@lang('questions.Категория'): <a href="{{route('web.category.show', $question->category->name)}}">{{$question->category->name}}</a></span>
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
                                <div class="col-sm-12 question">
                                    <h4 class="title"><a
                                                href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                    </h4>
                                    <p class="description">{{$question->text}}</p>
                                    <p>
                                        <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                        <span class="number"> @lang('questions.вопрос') №{{$question->id}}</span>
                                        <span class="author">{{$question->client->user->firstName}}
                                            , г.{{$question->client->user->city->name}} </span>
                                    </p>
                                    <hr>
                                    <p>
                                    <span class="category">@lang('questions.Категория'): <a href="{{route('web.category.show', $question->category->name)}}">{{$question->category->name}}</a></span>
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
                <h3>@lang('questions.Лучшие юристы')</h3>
                @foreach($best_lawyers as $lawyer)
                    <div class="best-lawyers">
                        <img src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}"
                             class="img-rounded"/>
                        <h5>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h5>
                        <h6>
                            <b>@lang("lawyer-settings.$lawyer->job_status"), г. {{  $lawyer->user->city->name }}</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="{{route('web.lawyer.show', $lawyer->id)}}">@lang('questions.Посмотреть профиль')</a>
                    </div>
                @endforeach

                <div class="ask-question-block text-center">
                    <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0.png')}}"/>
                    <h6>
                        <b>@lang('questions.Задайте вопрос бесплатно')</b>
                    </h6>
                    <a class="btn btn-default btn-success pulse-button" type="button"
                       href="{{route('question.create')}}">@lang('questions.Задать вопрос')</a>
                </div>
            </div>
            <!-- /Sidebar -->
            </div>
        </div>
    </div>

@endsection
