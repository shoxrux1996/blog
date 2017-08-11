@extends('layouts.app-admin')
@section('styles')
    <link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        <div class="row col-md-10 col-lg-offset-2">

            <div class="page-header">
                <h2>Блог</h2>
                <a onclick="return confirm('Вы уверены?');" href="{{route('admin.blog.delete', $blog->id)}}" class="btn btn-danger"><span>Удалить</span></a>
                <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-danger"><span>Изменить</span></a>
            </div>

            <div class="blog-title text-center"
                 style="background-image:@if($blog->file != null) url({{asset($blog->file->path.''.$blog->file->file)}});@else url({{ asset('dist/images/blog-img-1.jpg')}} ); @endif">
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

        <!-- /Blog item title -->

        <!-- Blog item text -->
        <div class="row">

            <div class="col-sm-8 blog-text-description">
                {!! $blog->text !!}
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
        </div>
    </div>

    <!-- /Content -->

@endsection
