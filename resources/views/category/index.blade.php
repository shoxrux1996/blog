@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div id="wrapper">
        <div class="container" id="category-section">
            <div class="row background-white padding-30">
                <h3>Все категории</h3>
                <div class="col-sm-12">
                    @if(\App::isLocale('ru'))
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
                    @else
                        @for($i=0; $i<$categories->count(); $i+=3)
                            <div class="row">
                                @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                                    <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                        <a href="{{route('web.category.show', ['name'=>$categories[$j]->name])}}">
                                            <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name_uz}}
                                        </a>
                                        @foreach($categories[$j]->children as $subcategory)

                                                <p><a href="{{route('web.category.show', ['name'=>$categories[$j]->name])}}">{{$subcategory->name_uz}}</a></p>

                                        @endforeach
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection