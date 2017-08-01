@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">

@endsection
@section('body')
    @extends('layouts.body')
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li class="active-link"><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection

@section('content')

    {{--<div class="container">


    <div class="row">
      <div class="col-md-12" >
          <label class="col-sm-6" >{{ $blog->title }}</label>
          <div class="tags col-sm-6" style="margin: 10px;">
            <hr>
            @foreach($blog->tags as $tag)
              <span class="label label-default"> {{ $tag->name}}</span>
            @endforeach
            <hr>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">{!!$blog->text !!}</div>
    </div>
    <div class="row">
         <div class="col-md-8 col-md-offset-2" style="margin: 10px;">
            <hr>
            <h3><span class="glyphicon glyphicon-comment"></span> Comments</h3>
            @foreach($blog->comments as $comment)
              <div class="comment">
                  <div class = "author-info">
                    <img src="{{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($comment->commentable->email))) . "?s=50&d=monsterid" }}" class="author-img">
                    <div class="author-name">
                      <h4>{{$comment->commentable->email}}</h4>
                      <p class="author-time">{{date('F n, Y - g:iA'), strtotime($comment->created_at)}}</p>
                    </div>
                  </div>
                  <div class="comment-content">
                    {{$comment->comment}}
                  </div>
              </div>
            @endforeach
            <hr>
        </div>
    </div>

    </div>--}}
    <ul class='social'>
        <li>
            <a class="fa fa-facebook" href="https://www.facebook.com">
                <span>Facebook</span>
            </a>
        </li>

        <li>
            <a class="a fa-odnoklassniki-square" href="https://ok.ru">
                <span>Odnoklassniki</span>
            </a>
        </li>

        <li>
            <a class="fa fa-telegram" href="https://www.telegram.me/">
                <span>Telegram</span>
            </a>
        </li>

        <li>
            <a class="fa fa-twitter" href="https://www.twitter.com">
                <span>Twitter</span>
            </a>
        </li>

    </ul>
    <!-- /Social -->


    <!-- Content -->
    <div class="container-fluid">

        <!-- Blog item title -->
        <div class="row">
            <div class="blog-title text-center"
                 style="background-image: url({{$blog->file != null ? asset($blog->file->path.$blog->file->file)  : asset('dist/images/blog-img-1.jpg')}})">
                <h6>

                    Блог юристов
                </h6>
                <h1>
                    <b>{{$blog->title}}</b>
                </h1>

                <p>
                <h6>Автор: {{$blog->lawyer->user->firstName}}</h6>
                @php
                    $time= Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() ;
                @endphp
                <h6>{{$time}}</h6>
                </p>
            </div>
        </div>
        <!-- /Blog item title -->

        <!-- Blog item text -->
        <div class="row padding-30">
            <div class="col-sm-2 advertisement left-sidebar">
                <img class="img-responsive center-block" src="{{asset('dist/images/sidebar-ad.png')}}"/>
                <img class="img-responsive center-block" src="{{asset('dist/images/Sidebar-ad1.jpg')}}"/>

            </div>
            <div class="col-sm-8 blog-text-description">

                {!! $blog->text !!}
                <div>
                    <label>Tags: </label>
                    @foreach($blog->tags as $tag)
                        <i style="margin-left:10px;"><strong>{{$tag->name}}</strong></i>
                    @endforeach
                </div>
            </div>

            <div class="col-sm-2 right-sidebar advertisement">
                <div class="ask-question-block">
                    <img class="img-responsive" src="{{asset('dist/images/one-word-save_0.png')}}"/>
                    <h6>
                        <b>Задайте вопрос бесплатно</b>
                    </h6>
                    <a href="{{route('question.create')}}" class="btn btn-default center-block btn-success pulse-button"
                       type="a">Задать вопрос
                    </a>
                </div>
                <img class="img-responsive center-block"
                     src="{{asset('dist/images/Sidebar-Ad-300x600-150x300@2x.png')}}"/>
                <img class="img-responsive center-block" src="{{asset('dist/images/adver-marknewtonband-1.png')}}"/>
            </div>
        </div>
        <!-- /Blog item text -->

        <!-- Blog comments-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: 10px;">
                <hr>
                <h3><span class=""></span> Comments</h3>
                @foreach($blog->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                            <img src="{{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($comment->commentable->email))) . "?s=50&d=monsterid" }}"
                                 class="author-img">
                            <div class="author-name">
                                <h4>{{$comment->commentable->email}}</h4>
                                @php
                                    $end = \Carbon\Carbon::parse($comment->created_at);
                                    $days = \Carbon\Carbon::now()->diffInDays($end);
                                @endphp
                                <p class="author-time">{{$days}}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {{$comment->comment}}
                        </div>
                    </div>
                @endforeach
                <hr>
            </div>
        </div>
        <!-- /Blog comments-->
        <!-- Subscribe -->
        <div class="row subscribe">
            <div class="padding-30 text-center">
                <h2>Нравится журнал? Подпишись!</h2>
                <h4>Самое интересное 2 раза в месяц на ваш e-mail</h4>
                <div class="col-sm-offset-3 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control general-input" placeholder="Введите ваш email"/>
                    </div>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-default dark-blue">Подписаться</button>
                </div>
            </div>
        </div>
        <!-- /Subcribe -->
        <div class="row padding-30" id="other-articles">
            <h3 class="text-center">Читайте также</h3>
            @foreach($blogs as $bl)
                <a href="{{route('web.blog.show', $bl->id)}}">
                    <div class="col-sm-4">
                        <div class="blog-item">
                            <div class="ribbon"><span>Юристы</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{asset('dist/images/blog-img-2.jpg')}}"/>
                                <div class="middle">
                                    <a href="{{route('web.blog.show', $bl->id)}}" class="btn btn-dark-blue text">Читать
                                        статью</a>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>{{ $bl->title }}</b></h5>
                                <p>{{substr(strip_tags($bl->text),0,200)}} {{strlen(strip_tags($bl->text))>200 ? '...' : ""}}</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye">{{$bl->count}}</i>
                                </span>
                                    <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> {{$bl->comments->count()}}
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> {{$bl->lawyer->user->firstName}}
                            </span>
                                <span class="pull-right">
                                <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($bl->created_at)->toFormattedDateString()}}
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <!-- /Content -->

@endsection
@endsection