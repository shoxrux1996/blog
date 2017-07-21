@extends('layouts.app')
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li class="active-link"><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="">Как это работает</a></li>
  <li><a href="">О нас</a></li>
@endsection
@section('content')

<div class="container">

	@foreach($blogs as $blog)
		<a href="{{route('web.blog.show', ['id' => $blog->id])}}">
			<div class="bg-info col-md-8" style="margin-bottom: 20px;">
				<div class="row">
					<div class="col-md-12">
						<label class="col-sm-6">{{ $blog->title }}</label>
						<div class="tags col-md-8 ">
							@foreach($blog->tags as $tag)
								<span class="label label-default"> {{ $tag->name}}</span>
							@endforeach
							<hr>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-4">
						<p>{{substr(strip_tags($blog->text),0,250)}} {{strlen(strip_tags($blog->text))>250 ? '...' : ""}}</p>
					</div>
				</div>
			</div>
		</a>
	@endforeach
		<div class="col-md-8">

			<div class="pager">
				{!! $blogs->links('pagination') !!}
			</div>
		</div>
</div>
@endsection
@endsection

