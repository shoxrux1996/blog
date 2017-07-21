@extends('layouts.app')
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li class="active-link"><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="">Как это работает</a></li>
  <li><a href="">О нас</a></li>
@endsection
@section('content')

<div class="container">
<div class="panel-heading">Category</div>
                <div>
	                @if (count($categories) > 0)
	                        <ul>
	                        @foreach ($categories as $category)
	                            @include('partials.category', $category)
	                        @endforeach
	                        </ul>
	                @endif
                </div>
@foreach($lawyers as $lawyer)
	<div class="bg-info col-md-8" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12" >
				<label class="col-sm-6" >{{ $lawyer->user->firstName }}</label>
		</div>
	</div>
	@if($lawyer->user->file_id != null)
	<div class="row">
		<img src="{!!asset($lawyer->user->file->path . $lawyer->user->file->file)!!}" alt="..." class="img-thumbnail" style="width: 100px;">
	</div>
	@endif
</div>
@endforeach
@foreach($cities as $city)
	<ul>
		<li><a href="{{route('search.lawyers.bycity', ['name' => $city->name]) }}">{{$city->name}}</a></li>
	</ul>
@endforeach
	<div class="col-md-8">
		<div class="pager">
		{!! $lawyers->links('pagination') !!}
	</div>
	</div>
</div>
@endsection
@endsection
