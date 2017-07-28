@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li class="active-link"><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
<!-- 
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
	@endforeach -->

	<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">

                <p class="question-type">
                    <span class="active-type"><a href="#">Все</a> </span>
                    <span> <a href="#">Платные</a> </span>
                    <span> <a href="#">Бесплатные</a> </span>
                </p>
                @foreach($questions as $question)

                <div class="col-sm-12 question">
                    @if($question->type ==2)
                        <span class="question-price">
                        <b>{{$question->price}} сум</b>
                        <span>
                            стоимость<br />
                            вопроса
                        </span>
                    </span>
                    @endif
                    <h4 class="title"><a href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a></h4>
                    <p class="description">{{$question->text}}</p>
                    <p>
                        <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                        <span class="number"> вопрос №{{$question->id}}</span>
                        <span class="author">{{$question->client->user->firstName}}, г.{{$question->client->user->city->name}} </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="">{{$question->category->name}}</a></span>
                        <a class="answers" href="{{route('web.question.show', $question->id)}}">
                            {{$question->answers->count()}}
                        </a>
                    </p>
                </div>
                @endforeach


                <div class="col-sm-12 question">
                    <h4 class="title"><a href="individual-question.html">Законно ли требование бывшей супруги покинуть квартиру и отдать ей ключи?</a></h4>
                    <p class="description">В браке состояли более 20 лет. Квартира приобретена в браке. Оформлена на жену. (по договору купли-продажи).Развод произошел в феврале 2017г. По требованию бывшей супруги (тогда еще жены) съехал из квартиры в ноябре 2016г. В квартире прописаны 4...</p>
                    <p>
                        <span class="date">10 Июля 2017, 02:22, </span>
                        <span class="number"> вопрос №1691430</span>
                        <span class="author">Тимур, г. Жуковский </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="individual-category.html">Семейное право</a></span>
                        <a class="answers" href="individual-question.html">
                            3 ответа
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 text-center">
                    {!! $questions->links('pagination') !!}

                </div>
            </div>
            <div class="col-sm-3 text-center">
                <h3>Лучшие юристы</h3>
                <div class="best-lawyers">
                    <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded" />
                    <h3>Керс Олег</h3>
                    <h6>
                        <b>юрист, г. Калининград</b>
                    </h6>
                    <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть профиль</a>
                </div>
                <div class="best-lawyers">
                    <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded" />
                    <h3>Керс Олег</h3>
                    <h6>
                        <b>юрист, г. Калининград</b>
                    </h6>
                    <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть профиль</a>
                </div>
                <div class="best-lawyers">
                    <img src="{{ asset('dist/images/headshot-1.png')}}" class="img-rounded" />
                    <h3>Керс Олег</h3>
                    <h6>
                        <b>юрист, г. Калининград</b>
                    </h6>
                    <a type="button" class="btn btn-default btn-success" href="individual-lawyer.html">Посмотреть профиль</a>
                </div>
                <div class="ask-question-block text-center">
                    <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0')}}.png" />
                    <h6>
                        <b>Задайте вопрос бесплатно</b>
                    </h6>
                    <a class="btn btn-default btn-success pulse-button" type="button" href="ask-question.html">Задать вопрос</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@endsection