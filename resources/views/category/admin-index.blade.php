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
                        @foreach($categories as $category)

                                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                    <a href="{{route('admin.category.show', $category->id)}}">
                                        <i class="fa fa-building"></i> {{$category->name}}
                                    </a>

                                    @foreach($category->children as $subcategory)
                                            <p><a href="{{route('admin.category.show', $subcategory->id)}}">{{$subcategory->name}}</a>
                                            </p>
                                    @endforeach
                                </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            <a href="{{route('admin.category.insert')}}" class="btn btn-info col-md-2">Добавить</a>
        </div>

@endsection
