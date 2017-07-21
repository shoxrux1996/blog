@extends('layouts.app')
@section('styles')
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li class="active-link"><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="">Как это работает</a></li>
  <li><a href="">О нас</a></li>
@endsection
@section('content')

	@foreach($questions as $question)
		<a href="{{route('web.question.show', ['id' => $question->id])}}">
			<div class="bg-info col-md-8" style="margin-bottom: 20px;">
				<div class="row">
					<div class="col-md-12">
						<label class="col-sm-6">{{ $question->title }}</label>
						<div class="tags col-md-8 ">
							<h4>Client:</h4>
							<p>{{$question->client->email}}</p>
							<h4>Category:</h4>
							<p>{{$question->category->name}}</p>
							<div class="tags col-md-8 ">
								@foreach($question->files as $file)
									<a class="label label-default"
									   href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
								@endforeach
								<hr>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<p>{{substr(strip_tags($question->text),0,250)}} {{strlen(strip_tags($question->text))>250 ? '...' : ""}}</p>
					</div>
				</div>
			</div>
		</a>
	@endforeach

@endsection
@endsection