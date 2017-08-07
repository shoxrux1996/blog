@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection
@section('body')
    @extends('layouts.body')
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row background-white padding-30">
                <ol class="breadcrumb">
                    <li><a href="{{route('category.list')}}">Категории</a></li>
                    @if($category->parent == null)
                        <li class="active">{{$category->name}}</li>
                    @else
                        <li class=""><a href="{{route('web.category.show', $category->parent->id)}}">{{$category->parent->name}}</a> </li>
                        <li class="active">{{$category->name}}</li>
                    @endif
                </ol>
                <div class="col-sm-9">
                    <div class="category-description">
                        {!! $category->text !!}
                        <h5>Популярные темы в этой категории</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @if($category->children != null)
                                        @foreach($category->children as $cat)
                                            <li><a href="{{route('web.category.show', $cat->id->name)}}">{{$cat->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if($category->parent != null)
                                        <li><a href="{{route('web.category.show', $category->parent->name)}}">{{$category->parent->name}}</a>
                                        </li>
                                    @endif
                                    @foreach($cat1 as $cat)
                                        <li><a href="{{route('web.category.show', $cat->name)}}">{{$cat->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @foreach($cat2 as $cat)
                                        <li><a href="{{route('web.category.show', $cat->name)}}">{{$cat->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img class="img-responsive" src="{{asset('dist/images/sidebar-ad.png')}}"/>
                </div>
            </div>
        </div>
    </div>

@endsection