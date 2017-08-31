@extends('layouts.app')
@section('styles')
    <link href="{{asset('dist/css/main-search.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/rotating-card.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/blog.css')}}" rel="stylesheet">
@endsection

@section('menu')
    <li class="active-link"><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>

@endsection
@section('content')

    <div class="container-fluid" id="search-tab">
        <h3>Результаты поиска</h3>

        <!-- Tab navigation -->
        <ul class="nav nav-tabs">
            <li id= "q" class="active"><a data-toggle="tab" href="#questions">Вопросы <span class="badge">{{$questions->total()}}</span></a></li>
            <li id = "l"><a data-toggle="tab" href="#lawyers">Юристы <span class="badge">{{$lawyers->total()}}</span></a></li>
            <li id = "n"><a data-toggle="tab" href="#news">Новости и статьи <span class="badge">{{$blogs->total()}}</span></a></li>
            {{-- <li><a data-toggle="tab" href="#documents">Документы</a></li>--}}
        </ul>
        <!-- /Tab navigation -->

        <!-- Tab content -->
        <div class="tab-content">
            <!-- Questions -->
            <div id="questions" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-9">
                        @foreach($questions as $question)
                            <div class="col-sm-12 question">
                                <h4 class="title"><a href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a></h4>
                                <p class="description">{{substr($question->text,0,250)}} {{strlen($question->text)>250 ? '...' : ""}}</p>
                                <p>
                                    <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}} </span>
                                    <span class="number"> вопрос №{{$question->id}}</span>
                                    <span class="author">{{$question->client->user->firstName}}
                                        , г. {{$question->client->user->city->name}} </span>
                                </p>
                                <hr>
                                <p>
                                    <span class="category">Категория: <a
                                                href="{{route('web.question.show', $question->id)}}">{{$question->category->name}}</a></span>
                                    <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                        {{$question->answers->count()}} ответа
                                    </a>
                                </p>
                            </div>
                        @endforeach
                            <div class="col-sm-12 text-center">
                                {!!  $questions->fragment('questions')->links('pagination') !!}
                            </div>
                    </div>
                    <!-- Sidebar -->
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
                            <img class="img-responsive" src="{{asset('dist/images/one-word-save_0.png')}}"/>
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
            <!-- /Questions -->

            <!-- Lawyers -->
            <div id="lawyers" class="tab-pane fade">
                <div class="row">
                    @foreach($lawyers as $lawyer)
                        <div class="col-sm-3">
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <div class="cover">
                                            <img src="{{asset('dist/images/rotating-card-cover.png')}}"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle"
                                                 src="{{$lawyer->file != null ? asset($lawyer->file->path.$lawyer->file->file) : asset('dist/images/headshot-3.jpg')}}"/>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h2 class="name">{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h2>
                                                <p class="profession">{{$lawyer->job_status}},
                                                    г. {{$lawyer->user->city->name}}</p>
                                                <p class="text-center">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                                <p class="text-center rank">8,0 Рейтинг</p>
                                            </div>
                                            <div class="footer">
                                                <i class="fa fa-mail-forward"></i> Перевернуть
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back">
                                        <div class="content">
                                            <div class="main">
                                                <h4 class="text-center">Специализация</h4>
                                                <p class="text-center">@foreach($lawyer->categories as $category){{$category->name}}
                                                    . @endforeach</p>

                                                <div class="stats-container text-center">
                                                    <div class="stats">
                                                        <h4>{{$lawyer->experience_year}}</h4>
                                                        <p>
                                                            лет стажа
                                                        </p>
                                                    </div>
                                                    <div class="stats">
                                                        <h4>{{$lawyer->categories->count()}}</h4>
                                                        <p>
                                                            специализаций
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a type="button" class="btn btn-default btn-block blue-button" href="#">Обратиться
                                                    к юристу</a>
                                                <span>{{$lawyer->countPositiveFeedbacks()}} отзыва от клиентов</span>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div> <!-- end card-container -->
                        </div>
                    @endforeach


                    <div class="col-sm-12 text-center">
                        {{$lawyers->fragment('lawyers')->links('pagination')}}

                    </div>
                </div>
            </div>
            <!-- /Lawyers -->

            <!-- News and articles -->
            <div id="news" class="tab-pane fade">
                <div class="row">
                    @foreach($blogs as $blog)
                        <a href="{{route('web.blog.show', $blog->id)}}">
                            <div class="col-sm-6">
                                <div class="blog-item">
                                    <div class="ribbon"><span>Модераторы</span></div>
                                    <div class="blog-item-img">
                                        @if($blog->file != null)
                                            <img alt="Blog item image" src="{{asset($blog->file->path.$blog->file->file)}}">
                                        @else
                                            <img alt="Blog item image" src="{{asset('dist/images/blog-img-2.jpg')}}">
                                        @endif
                                        <div class="middle">
                                            <button class="btn btn-dark-blue text">Читать статью</button>
                                        </div>
                                    </div>
                                    <div class="blog-item-description">
                                        <h5><b>{{substr($blog->title,0,70)}} {{strlen($blog->title)>70 ? '...' : ""}}</b></h5>
                                        <p>{{substr(strip_tags($blog->text),0,180)}} {{strlen(strip_tags($blog->text))>180 ? '...' : ""}}</p>
                                        <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> {{$blog->count}}
                                </span>
                                            @foreach($blog->tags as $tag)
                                                <span style="margin-left:10px;"><strong >{{$tag->name}}</strong></span>
                                            @endforeach
                                            <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> {{$blog->comments->count()}}
                                </span>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> {{$blog->blogable->user != null ? $blog->blogable->user->firstName : $blog->blogable->name}}
                            </span>
                                        <span class="pull-right">
                                <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                            </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <div class="text-center col-md-12">
                        {!! $blogs->links('pagination') !!}
                        {{--<button type="button" class="btn btn-default btn-lg blue-button show-others">Показать еще</button>--}}
                    </div>
                </div>
            </div>
            <!-- /News and articles -->
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        if (window.location.hash) {
            var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character

            if (hash == "lawyers") {
                document.getElementById('lawyers').className = "tab-pane fade in active";
                document.getElementById('questions').className = "tab-pane fade";
                document.getElementById('l').className = "active";
                document.getElementById('q').className = "";

            }
            if(hash == "questions"){
                document.getElementById('lawyers').className = "tab-pane fade";
                document.getElementById('questions').className = "tab-pane fade active";
                document.getElementById('l').className = "";
                document.getElementById('q').className = "active";
            }
            // hash found
        }
    </script>
@endsection