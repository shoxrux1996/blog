@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection
@section('body')
    @extends('layouts.body')
@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row background-white padding-30">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.category.info')}}">Категории</a></li>
                    @if($category->parent == null)
                        <li class="active">{{$category->name}}</li>
                    @else
                        <li class=""><a href="{{route('admin.category.show', $category->parent->id)}}">{{$category->parent->name}}</a> </li>
                        <li class="active">{{$category->name}}</li>
                    @endif
                </ol>

                <div class="col-sm-9">
                    <div class="page-header">
                            <div >
                                <h2>Категория
                                    <a class="btn btn-info" href="{{route('admin.category.edit', $category->id)}}">Изменить</a>
                                    <a class="btn btn-danger" href="{{route('admin.category.delete', $category->id)}}">Удалить</a>
                                </h2>
                            </div>
                    </div>
                    <div class="category-description">
                        {!! $category->text !!}
                        <h5>Популярные темы в этой категории</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @if($category->children != null)
                                        @foreach($category->children as $cat)
                                            <li><a href="{{route('admin.category.show', $cat->id)}}">{{$cat->name}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                        @if($category->parent != null)
                                                <li><a href="{{route('admin.category.show', $category->parent->id)}}">{{$category->parent->name}}</a>
                                                </li>
                                        @endif
                                        @foreach($cat1 as $cat)
                                            <li><a href="{{route('admin.category.show', $cat->id)}}">{{$cat->name}}</a>
                                            </li>
                                        @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    @foreach($cat2 as $cat)
                                        <li><a href="{{route('admin.category.show', $cat->id)}}">{{$cat->name}}</a>
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