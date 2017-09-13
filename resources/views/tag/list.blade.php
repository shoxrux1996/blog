@extends('layouts.app-admin')

@section('title', "| Tag")

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Теги
        </li>
    </ol>
    <div class="row col-lg-offset-1">


        <div class="page-header">
            <h2>Теги</h2>
        </div>
        @foreach ($tags as $tag)

            <a href="{{route('admin.tag.showeach',$tag->id)}}">

                <div class="col-sm-6">
                    <div class="panel panel-footer col-md-8">
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="{{route('admin.tag.showeach',$tag->id)}}">{{$tag->name}}
                                    <strong>{{ $tag->id }}</strong></a></h3>
                        </div>

                    </div>
                </div>
            </a>


        @endforeach
        <div class="col-md-12 ">
            <a href="{{route('admin.tag.insert')}}" class="btn btn-primary col-md-2">Insert</a>
        </div>


    </div>

@endsection