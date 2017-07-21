@extends('layouts.app')
@section('body')
@extends('layouts.body')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>
                @if (Session::has('message'))
                                 <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div>
                  
                @if (count($categories) > 0)
                        <ul>
                        @foreach ($categories as $category)
                            @include('partials.category', $category)
                        @endforeach
                        </ul>
                @endif
                <!-- 
                @each('partials.category', $categories, 'category')
                -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection
