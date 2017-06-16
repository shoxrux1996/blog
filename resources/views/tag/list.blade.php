@extends('layouts.app-admin')

@section('title', "| Tag")

@section('content')
	@if (Session::has('message'))
                                 <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
	<div class="row">
		<div class="col-md-12">
			<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach ($tags as $tag)
				<tr>
					<th> {{$tag->id}}</th>
					<td><a href="{{route('admin.tag.showeach',$tag->id)}}">{{$tag->name}}</a></th>
				</tr>
				@endforeach
			</tbody>
			</table>
			<div class="col-md-2 ">
			<a href="{{route('admin.tag.insert')}}" class="btn btn-primary pull-right btn-block">Insert</a>
			</div>
		</div>
	</div>
@endsection