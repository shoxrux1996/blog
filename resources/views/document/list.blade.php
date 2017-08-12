@extends('layouts.app')
@section('styles')
    <!-- styles here -->
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

<div class="container">

	@foreach($documents as $doc)
		<a href="{{route('lawyer.document.show', $doc->id)}}">
			<div class="bg-info col-md-8" style="margin-bottom: 20px;">
				<div class="row">
					<div class="col-md-12">
						<label class="col-sm-6">{{ $doc->title }}</label>
					</div>
				</div>
				<div class="row">
				
				</div>
			</div>
		</a>
	@endforeach
		<div class="col-md-8">

			<div class="pager">
				{!! $documents->links('pagination') !!}
			</div>
		</div>
</div>
@endsection