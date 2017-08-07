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
    <div class="container" id="category-section">
        <div class="row background-white padding-30">
            <h3>Все категории</h3>
            <div class="col-sm-12">
                <div class="row">
                    @php $counter=0 @endphp 
                    @foreach($categories as $category)
                        @if($counter % 3 == 0 && $category->category_id===NULL)
                            <div class="row">
                        @endif
                            @if($category->category_id===NULL)
                                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                    <a href="#">
                                        <i class=""></i> {{$category->name}}
                                    </a>
                                    @foreach($categories as $subcategory)
                                        @if($subcategory->category_id===$category->id)
                                            <p><a href="#">{{$subcategory->name}}</a></p>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @if($counter % 3 == 2)
                            </div>
                        @endif
                        @if($category->category_id===NULL)
                           @php $counter++ @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection
