@extends('layouts.app-admin')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection
@section('content')

        <div class="container-fluid" id="category-section">
            <div class="row background-white padding-30">
                <h3>Все категории</h3>
                <div class="col-sm-12">
                    <div class="row">
                        @for($i=0; $i<$categories->count(); $i+=3)
                            <div class="row">
                                @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                                    <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                        <a href="{{route('admin.category.show', [$categories[$j]->id])}}">
                                            <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name}}
                                        </a>
                                        @foreach($categories[$j]->children as $subcategory)
                                                <p><a href="{{route('admin.category.show', [$subcategory->id])}}">{{$subcategory->name}}</a></p>
                                        @endforeach
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            <a href="{{route('admin.category.insert')}}" class="btn btn-info col-md-2">Добавить</a>
        </div>

@endsection
