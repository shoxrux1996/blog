@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('content')
<div id="wrapper">
    <div class="container" id="category-section">
        <div class="row background-white padding-30">
            <h3>Все категории</h3>
            <div class="col-sm-12">
                <div class="row">
                   @foreach($categories as $category)
                        @if($category->category_id===NULL)
                            <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                <a href="#">
                                    <i class="fa fa-building"></i> {{$category->name}}
                                </a>
                                @foreach($categories as $subcategory)
                                    @if($subcategory->category_id===$category->id)
                                        <p><a href="#">{{$subcategory->name}}</a></p>
                                    @endif
                                @endforeach
                            </div>
                        @endif  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection
