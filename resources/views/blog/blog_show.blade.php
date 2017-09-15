@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">

@endsection

@section('content')
    <ul class='social hidden-xs'>
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
                <h6>
                    Автор: {{$blog->blogable->user != null ? $blog->blogable->user->firstName : $blog->blogable->name}}</h6>
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
            <div class="col-sm-2 advertisement left-sidebar hidden-xs">
                <img class="img-responsive center-block" src="{{asset('dist/images/sidebar-ad.png')}}"/>
                <img class="img-responsive center-block" src="{{asset('dist/images/Sidebar-ad1.jpg')}}"/>
            </div>
            <div class="col-sm-8 col-xs-12 blog-text-description">
                {!! $blog->text !!}
                <div>
                    <label>Tags: </label>
                    @foreach($blog->tags as $tag)
                        <i style="margin-left:10px;"><strong>{{$tag->name}}</strong></i>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-2 right-sidebar advertisement hidden-xs">
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

        <!-- Share buttons -->
        <div class="row share-buttons">
            <div class="col-sm-12">
                <ul class="list-unstyled">
                    <li>
                        Поделиться <i class="fa fa-share"></i>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-odnoklassniki-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-telegram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Share buttons -->

        <!-- Blog comments-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <hr>
                <h3><span class="">{{$blog->comments->count()}}</span> комментарии</h3>
                <div class="row">
                    <div class="comments-container">
                        <ul id="comments-list" class="comments-list">
                            @foreach($blog->comments as $comment)
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="{{$comment->commentable->user->file != null
                                     ? asset($comment->commentable->user->file->path.$comment->commentable->user->file->file)
                                     : asset("dist/images/headshot-2.jpg")}}" alt=""></div>
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name"><a
                                                            href="{{route('web.lawyer.show', $comment->commentable->id)}}">{{$comment->commentable->user->firstName}}</a>
                                                </h6>
                                                @php
                                                    $end = \Carbon\Carbon::parse($comment->created_at);
                                                    $now = \Carbon\Carbon::now();
                                                @endphp
                                                <span>{{$end->diffForHumans($now)}}</span>
                                            </div>
                                            <div class="comment-content">
                                                {{$comment->comment}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /Comments -->
                <!-- Leave your comment -->
                    @if(Auth::guard('lawyer')->check() && Auth::guard('lawyer')->user()->type == 2)
                        <div class="row">
                            <h3>Оставь свою комментарию</h3>
                            <div class="widget-area no-padding blank">
                                <div class="status-upload">
                                    <form method="post" action="{{route('lawyer.comment.store', $blog->id)}}">
                                        {{csrf_field()}}
                                        <textarea name="comment" placeholder="Ваше сообщение"></textarea>
                                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>
                                            Опубликовать
                                        </button>
                                    </form>
                                </div><!-- Status Upload  -->
                            </div><!-- Widget Area -->
                        </div>
                    @endif
                <!-- /Leave your comment -->
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
                            <div class="ribbon">
                                <span>{{$blog->blogable_type != 'yuridik\Admin' ? 'Юрист' : 'Модератор'}}</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image"
                                     src="{{$bl->file != null ? asset($bl->file->path.$bl->file->file) : asset('dist/images/blog-img-2.jpg')}}"/>
                                <div class="middle">
                                    <a href="{{route('web.blog.show', $bl->id)}}" class="btn btn-dark-blue text">Читать
                                        статью</a>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>{{ $bl->title }}</b></h5>
                                <p>{{substr(strip_tags($bl->text),0,100)}} {{strlen(strip_tags($bl->text))>100 ? '...' : ""}}</p>
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
                                <i class="fa fa-user"></i> {{$blog->blogable->user != null ? $blog->blogable->user->firstName : $blog->blogable->name}}
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
