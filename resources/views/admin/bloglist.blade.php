@extends('layouts.app-admin')
@section('styles')
    <link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Content -->
    <div class="container">
        <div class="col-md-10 col-lg-offset-2">

            <div class="page-header">
                <h2>Блоги</h2>
            </div>
            @foreach($blogs as $blog)

                <a href="{{route('admin.blog.show', $blog->id)}}">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>{{$blog->blogable_type != 'yuridik\Admin' ? 'Юрист' : 'Модератор'}}</span></div>
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
                                <h5><b>{{substr($blog->title,0,100)}} {{strlen($blog->title)>100 ? '...' : ""}}</b></h5>
                                <p>{{substr(strip_tags($blog->text),0,200)}} {{strlen(strip_tags($blog->text))>200 ? '...' : ""}}</p>
                                <p class="post-info">

                                <span>
                                    <i class="fa fa-eye"></i> {{$blog->count}}
                                </span>
                                    @foreach($blog->tags as $tag)
                                        <span style="margin-left:10px;"><strong>{{$tag->name}}</strong></span>
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
            </div>
        </div>
        <!-- /Posts -->
        <br/>


    </div>
    <!-- /Content -->
    <div class="col-md-12 col-lg-offset-2">
        <a href="{{route('admin.blog.insert')}}" class="btn btn-info col-md-2">Добавить</a>
    </div>

@endsection


