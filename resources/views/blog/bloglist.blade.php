@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">

@endsection

@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li class="active-link"><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
<!-- Content -->
<div id="wrapper">
    <div class="container-fluid">
        <div class="row text-center">
            <h3>БЛОГ YURIDIK.UZ</h3>
        </div>
        <br />
        <div class="row">
            <!-- Posts -->
            <div class="col-sm-9">
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
                                <i class="fa fa-user"></i> {{$blog->blogable->user->firstName}}
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
            <!-- /Posts -->

            <!-- Sidebar -->
            <div class="col-sm-3 sidebar">
                <div class="panel-group">
                    <!-- Category -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-category">
                                    Категория</a>
                            </h4>
                        </div>
                        <div id="accordion-category" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        <a href="#">Новости</a>
                                    </li>
                                    <li>
                                        <a href="#">Анализ и обзор</a>
                                    </li>
                                    <li>
                                        <a href="#">Творчество юристов</a>
                                    </li>
                                    <li>
                                        <a href="#">Новость сайта</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Category -->

                    <!-- Last posts -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-last-posts">
                                    Последние публикации</a>
                            </h4>
                        </div>
                        <div id="accordion-last-posts" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @foreach($blog_recent as $blog)
                                <a href="{{route('web.blog.show', $blog->id)}}">
                                    <div class="post-mini">
                                        @if($blog->file != null)
                                            <img class="img-thumbnail" alt="post-mini-img" src="{{asset($blog->file->path.$blog->file->file)}}" >
                                        @else
                                            <img class="img-thumbnail" alt="post-mini-img" src="{{asset('dist/images/blog-img-3.jpg')}}" >
                                        @endif
                                    <span>
                                        <b>{{substr($blog->title,0,60)}} {{strlen(($blog->title))>60 ? '...' : ""}}</b>
                                    </span>
                                    </div>
                                </a>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Last posts -->
                    <!-- Popular posts -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-popular-posts">
                                    Популярные статьи</a>
                            </h4>
                        </div>
                        <div id="accordion-popular-posts" class="panel-collapse collapse in">
                            <div class="panel-body">
                            @foreach($blog_pop as $blog)
                                    <a href="{{route('web.blog.show', $blog->id)}}">
                                    <div class="post-mini">
                                        @if($blog->file != null)
                                            <img class="img-thumbnail" alt="post-mini-img" src="{{asset($blog->file->path.$blog->file->file)}}" />
                                        @else
                                            <img class="img-thumbnail" alt="post-mini-img" src="{{asset('dist/images/blog-img-6.jpg')}}" />
                                        @endif
                                        <span>
                                            <b>{{substr($blog->title,0,60)}} {{strlen(($blog->title))>60 ? '...' : ""}}</b>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-eye"></i> {{$blog->count}}
                                        </span>
                                    </div>
                                </a>
                                <hr>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Popular posts -->

                    <!-- Comments -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-last-comments">
                                    Последние комментарии</a>
                            </h4>
                        </div>
                        <div id="accordion-last-comments" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @foreach($comments as $comment)
                                    <a href="{{route('web.blog.show', $comment->blog->id)}}">
                                    <div class="last-comments">
                                        @if($comment->commentable->user->file != null)
                                        <img alt="last-comment-author" src="{{asset($comment->commentable->user->file->path.''.$comment->commentable->user->file->file)}}" class="img-circle"/>
                                        @else
                                            <img alt="last-comment-author" src="{{asset('dist/images/avatar_large_male_client_default.jpg')}}" class="img-circle"/>
                                            @endif

                                        <p>
                                    <span class="comment-author">
                                        <i class="fa fa-user"></i> <b>{{$comment->commentable->user->firstName}}</b>
                                    </span>
                                            @php
                                                $end = \Carbon\Carbon::parse($comment->created_at);
                                                $days = \Carbon\Carbon::now()->diffInDays($end);
                                            @endphp
                                            <span class="comment-time">{{$days}} days ago</span>
                                        </p>
                                        <p class="comment-content">
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                </a>

                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Comments -->
                </div>
            </div>
            <!-- /Sidebar -->
        </div>
        <br />
        <div class="row subscribe">
            <div class="padding-30 text-center">
                <h2>Нравится журнал? Подпишись!</h2>
                <h4>Самое интересное 2 раза в месяц на ваш e-mail</h4>
                <div class="col-sm-offset-3 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control general-input" placeholder="Введите ваш email" />
                    </div>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-default dark-blue">Подписаться</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection

