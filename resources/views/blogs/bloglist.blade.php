@extends('layouts.app-admin')
@section('title', "| Blog")
@section('content')

<div class="container">

@foreach($blogs as $blog)
<div class="bg-info col-md-8" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12" >
				<label class="col-sm-6" >{{ $blog->title }}</label>
				<div class="tags col-md-8 ">
					@foreach($blog->tags as $tag)
						<span class="label label-default"> {{ $tag->name}}</span>
					@endforeach
					<hr>
				</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4"><p>{{substr(strip_tags($blog->text),0,250)}} {{strlen(strip_tags($blog->text))>250 ? '...' : ""}}</p></div>
	</div>

	<!--<div class="col-sm-4">{!!$blog->title!!}</div> -->
	<a href="{{route('admin.blog.edit', ['id' => $blog->id])}}">Edit</a>
	<a href="{{route('admin.blog.delete', ['id' => $blog->id])}}">Delete</a>
	<a href="{{route('admin.blog.show', ['id' => $blog->id])}}">Show</a>
</div>
	@endforeach
	<div class="col-md-8">
	<a href="{{route('admin.blog.insert')}}" class="btn btn-default" style="margin-top: 20px;">Insert</a>


	<div class="pager">
		{!! $blogs->links('pagination') !!}
	</div>
	</div>
</div>
@endsection

