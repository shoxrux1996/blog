@extends('layouts.app')
@section('styles')
	<link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet"><!-- styles here -->
@endsection

@section('content')
	<div id="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<h1 style="margin-top: 0px">Заявки на документы</h1>
					<p>Чтобы взять в работу документ, просто ответьте на заявку с указанием цены и срока выполнения работы.</p>
					<br>
					<div id="section1" class="section">
						@if(Auth::guard('lawyer')->check())
							<!-- loop begins here foreach  documents as document-->
							@foreach($documents as $document)
								<div class="col-sm-12 question">
									<span class="question-price">
										@if($document->status==0)
											@if($document->payment_type=="about")
												<b>По договоренности</b>
											@else
												<b>{{$document->price}} сум</b>
												<span>
													@lang('questions.стоимость')<br/>
													@lang('questions.вопроса')
												</span>
											@endif
										@elseif($document->status==1)
											<b>Юрист выбран</b>
										@else
											<b>Заявка закрыта</b>
										@endif
									</span>
									<h4 class="title">
										<a href="{{route('lawyer.document.show',$document->id)}}">{{$document->title}}</a><!-- route('single.document') and document.title-->
									</h4>
									<p class="description">{{str_limit($document->description,200)}}</p><!-- document.description about 200 symbols -->
									<p>
										<span class="date">{{Carbon\Carbon::parse($document->created_at)->toFormattedDateString()}}, </span><!-- document.created_at -->
										<span class="number">документ №{{$document->id}}</span><!-- document.id -->
										<span class="author">{{$document->client->user->firstName}}, г.{{$document->client->user->city->name}} </span><!-- document.author -->
									</p>
									<hr>
									<p>
                                        <span class="category">@lang('questions.Категория'): {{$document->category->name}}</span>
										<a class="answers" href="{{route('lawyer.document.show',$document->id)}}"><!-- route('single.document') and document.answers.count -->
											{{$document->requests->count()}}
										</a>
									</p>
								</div>
							@endforeach
								<div class="col-sm-12 text-center">
									{!! $documents->links('pagination') !!}
								</div>
						@endif
					</div>
				</div>
				<!-- Sidebar -->
				<div class="col-sm-3 text-center">
					<h3>@lang('questions.Лучшие юристы')</h3>
					<div class="best-lawyers">
						<img src="{!! asset('dist/images/headshot-1.png')!!}"
							 class="img-rounded"/>
						<h5>Erkinboy Botirov</h5>
						<h6>
							<b>Адвокат, г. Ташкент</b>
						</h6>
						<a type="button" class="btn btn-default btn-success" href="">@lang('questions.Посмотреть профиль')</a>
					</div>
					<div class="ask-question-block text-center">
						<img class="img-responsive" src="{{ asset('dist/images/one-word-save_0.png')}}"/>
						<h6>
							<b>@lang('questions.Задайте вопрос бесплатно')</b>
						</h6>
						<a class="btn btn-default btn-success pulse-button" type="button"
						   href="{{route('question.create')}}">@lang('questions.Задать вопрос')</a>
					</div>
				</div>
				<!-- /Sidebar -->
			</div>
		</div>
	</div>

@endsection