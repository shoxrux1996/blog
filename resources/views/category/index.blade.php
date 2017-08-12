@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection
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
        <div class="container" id="category-section">
            <div class="row background-white padding-30">
                <h3>Все категории</h3>
                <div class="col-sm-12">
                    @for($i=0; $i<$categories->count(); $i+=3)
                        <div class="row">
                            @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                    <a href="{{route('web.category.show', ['name'=>$categories[$j]->name])}}">
                                        <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name}}
                                    </a>
                                    @foreach($categories[$j]->children as $subcategory)

                                            <p><a href="{{route('web.category.show', ['name'=>$categories[$j]->name])}}">{{$subcategory->name}}</a></p>

                                    @endforeach
                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection