@extends('layouts.app-admin')

@section('title', "| $tag->name Tag")

@section('content')
	<div class="row">
		<div class="col-md-8">
				<h1>{{ $tag->name }} Tag<small>{{$tag->blogs()->count()}} Blogs</small></h1>
		</div>
		<div class="col-md-2 ">
			<a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-primary pull-right btn-block" style="margin-top: 20px">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route'=>['admin.tag.delete', $tag->id], 'method' => 'DELETE']) }}
			{{Form::submit('Delete', ['class'=> 'btn btn-danger btn-block', 'style' =>'margin-top:20px;'])}}
			{{Form::close()}}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach ($tag->blogs as $blog)
				<tr>
					<th> {{$blog->id}}</th>
					<td>{{$blog->title}}</th>
					<td>@foreach($blog->tags as $tag)
							<span class="label label-default">{{$tag->name}}</span>
							@endforeach
					</td>
					<td><a href="{{route('admin.blog.show', $blog->id)}}" class="btn btn-default btn-xs">view</a></td>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>
	</div>
@endsection