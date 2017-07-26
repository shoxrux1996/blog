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
                <div class="col-sm-12 question">
                    <h4 class="title"><a href="individual-question.html">Торговля алкогольной продукцией круглосуточно</a></h4>
                    <p class="description">Имею в посёлке собственный стационарный магазин продукты,так же есть лицензия на продажу крепкого алкоголя продажа разрешена до 20-00 Хочу сделать продажу алкоголя круглосуточно , какие документы для этого требуются</p>
                    <p>
                        <span class="date">09 Июля 2017, 20:14, </span>
                        <span class="number"> вопрос №1691270</span>
                        <span class="author">Олег, г. Нижневартовск</span>
                    </p>
                    <hr>
                    <p>
                        <a class="answers" href="individual-question.html">
                            10 ответов
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 question">
                    <span class="question-price">
                        <b>500 сум</b>
                        <span>
                            стоимость<br />
                            вопроса
                        </span>
                    </span>
                    <h4 class="title"><a href="individual-question.html">На что можно рассчитывать при сносе ветхого жилья (социальный найм) в случае расселения застройщиком</a></h4>
                    <p class="description">Добрый день. Наш дом попал в программу адресного расселения ветхого жилья. Квартира находится в очень хорошем районе, почти центр города.в частично благоустроенном двухквартирном доме (только центр. отопление), 36кв. м., 3 комнаты, по договору...</p>
                    <p>
                        <span class="date">10 Июля 2017, 06:38, </span>
                        <span class="number"> вопрос №1691463</span>
                        <span class="author">Бредун Светлана, г. Хабаровск </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="individual-category.html">Жилищное право</a></span>
                        <a class="answers" href="individual-question.html">
                            0 ответов
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 question">
                    <h4 class="title"><a href="individual-question.html">Добрый день</a></h4>
                    <p class="description">Добрый день..хочу Тещу отправить в декрет(по уходу за ребенком)на неполный рабочий день..что мне надо доя этого??<p>
                        <span class="date">10 Июля 2017, 06:30, </span>
                        <span class="number"> вопрос №1691457</span>
                        <span class="author">Gennadiy, г. Владивосток </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="individual-category.html">Защита прав работников</a></span>
                        <a class="answers" href="individual-question.html">
                            7 ответа
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 question">
                    <span class="question-price">
                        <b>2500 сум</b>
                        <span>
                            стоимость<br />
                            вопроса
                        </span>
                    </span>
                    <h4 class="title"><a href="individual-question.html">Расторжение договорных обязательств между арендатором ООО и арендодателем ООО?</a></h4>
                    <p class="description">Имеет ли право арендодатель не оповестив арендатора о расторжении договора аренды закрывать арендуемое помещение путем отбора ключей у работника работающего на арендатора, тем самым ограничив арендатора к оборудованию и материалам для производства?...</p>
                    <p>
                        <span class="date">10 Июля 2017, 04:13, </span>
                        <span class="number"> вопрос №1691444</span>
                        <span class="author">СЕРГЕЙ, г. Москва </span>
                    </p>
                    <hr>
                    <p>
                        <span class="category">Категория: <a href="individual-category.html">Договорное право</a></span>
                        <a class="answers" href="individual-question.html">
                            1 ответ
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 question">
                    <h4 class="title"><a href="individual-question.html">Как доказать отцовство и взыкать алименты</a></h4>
                    <p class="description">я мать одиночка обратилась в суд с иском о признании отцовства и алиментах. как доказать мне отцовство и что будет если отец ребенка не явится в суд вообще</p>
                    <p>
                        <span class="date">10 Июля 2017, 04:04, </span>
                        <span class="number"> вопрос №1691443</span>
                        <span class="author">Анна </span>
                    </p>
                    <hr>
                    <p>
                        <a class="answers" href="individual-question.html">
                            1 ответ
                        </a>
                    </p>
                </div>
                <div class="col-sm-12 question">
                    <span class="question-price">
                        <b>1500 сум</b>
                        <span>
                            стоимость<br />
                            вопроса
                        </span>
                    </span>
                    <h4 class="title"><a href="individual-question.html">Перепланировка квартиры</a></h4>
                    <p class="description">Доброго времени суток! Сделали небольшую перепланировку в не несущей стене кварты, то есть, в одном месте замуровали в другом открыли! Но тут соседка написала в жил инспецию, что за ремонт и есть ли перепланировка! Какие могут быть последствия...</p>
                    <p>
                        <span class="date">10 Июля 2017, 03:47, </span>
                        <span class="number"> вопрос №1688281</span>
                        <span class="author">Юлия, г. Артем </span>
                    </p>
                    <hr>
                    <p>
                        <a class="answers" href="individual-question.html">
                            3 ответа
                        </a>
                    </p>
                </div>
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

                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
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