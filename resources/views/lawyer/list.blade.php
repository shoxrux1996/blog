@extends('layouts.app')
@section('scripts')
<link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
<link href="{{ asset('dist/css/rotating-card.css')}}" rel="stylesheet" >
@endsection
@section('body')

@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li class="active-link"><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

<!-- <div class="container">
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
</div> -->

<!-- Lawyers -->

<!-- Search Lawyer Section -->
<div class="container-fluid" id="search-lawyer">
    <div class="row">
        <div class="col-sm-6 text-center" id="form">
            <h1>Поиск по юристов и адвокатов</h1>
            <form action="default">
                <div class="form-group text-left">
                    <label for="name"><i class="fa fa-address-card"></i> Имя или специализация</label>
                    <input id="name" list="names" type="text" class="form-control" placeholder="“Бизнес” или “Жон Смит”" />
                    <datalist id="names">
                        <option value="Ташкент 1"></option>
                        <option value="Ташкент 2"></option>
                        <option value="Ташкент 3"></option>
                    </datalist>
                </div>
                <div class="form-group text-left">
                    <label for="place"><i class="fa fa-location-arrow"></i> Местоположение</label>
                    <input id="place" list="places" type="text" class="form-control" placeholder="Ташкент, Узбекистан" value="Ташкент, Узбекистан"/>
                    <datalist id="places">
                        <option value="Ташкент 1"></option>
                        <option value="Ташкент 2"></option>
                        <option value="Ташкент 3"></option>
                    </datalist>
                </div>
                <button type="button" class="btn btn-default blue-button">Поиск</button>
            </form>
        </div>
    </div>
</div>
<!-- /Search Lawyer Section -->

<!-- Statistics Section -->
<div class="container" id="statistics">
    <div class="row text-center">
        <div class="col-sm-4">
            <div>
                <h1>19519</h1>
                <h4>проверенных юристов со всей страны</h4>
            </div>
        </div>
        <div class="col-sm-4">
            <div>
                <h1>12</h1>
                <h4>лет — средний стаж наших специалистов</h4>
            </div>
        </div>
        <div class="col-sm-4">
            <div>
                <img class="img-responsive" src="{{ asset('dist/images/return-money-icon.png')}}" alt="Return money" />
                <h4>Мы вернём деньги, если юрист не сможет вам помочь! Узнать больше</h4>
            </div>
        </div>
    </div>
</div>
<!-- /Statistics Section -->

<!-- Main Section -->
<div class="container-fluid color-dark-blue" id="main-section">
    <div class="row">
        <div class="col-sm-9" id="specialisation">
            <h3>Выбор юриста по специализации</h3>
            <div class="row">
                <div class="col-sm-4">
                    <h4><i class="fa fa-users"></i><a href="#"> Гражданское право</a></h4>
                    <p><a href="#">Договорное право</a></p>
                    <p><a href="#">Право собственности</a></p>
                    <p><a href="#">Взыскание задолженности</a></p>
                    <p><a href="#">Кредитование</a></p>
                </div>
                <div class="col-sm-4">
                    <h4><i class="fa fa-connectdevelop"></i><a href="#"> Трудовое право</a></h4>
                    <p><a href="#">Защита прав работников</a></p>
                    <p><a href="#">Защита прав работодателя</a></p>
                </div>
                <div class="col-sm-4">
                    <h4><i class="fa fa-child"></i><a href="#"> Семейное право</a></h4>
                    <p><a href="#">Заключение и расторжение брака</a></p>
                    <p><a href="#">Алименты</a></p>
                    <p><a href="#">Раздел имущества</a></p>
                    <p><a href="#">Усыновление, опека и попечительство</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h4><i class="fa fa-building"></i><a href="#"> Недвижимость</a></h4>
                    <p><a href="#">Жилищное право</a></p>
                    <p><a href="#">Ипотека</a></p>
                    <p><a href="#">ЖКХ</a></p>
                    <p><a href="#">Долевое участие в строительстве</a></p>
                    <p><a href="#">Приватизация</a></p>
                    <p><a href="#">Земельное право</a></p>
                </div>
                <div class="col-sm-4">
                    <h4><i class="fa fa-car"></i><a href="#"> Автомобильное право</a></h4>
                    <p><a href="#">ДТП, ГИБДД, ПДД</a></p>
                    <p><a href="#">Лишение водительских прав</a></p>
                </div>
                <div class="col-sm-4">
                    <h4><i class="fa fa-trademark"></i><a href="#"> Интеллектуальная собственность</a></h4>
                    <p><a href="#">Авторские и смежные права</a></p>
                    <p><a href="#">Товарные знаки, патенты</a></p>
                    <p><a href="#">Интернет и право</a></p>
                    <p><a href="#">Программы ЭВМ и базы данных</a></p>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary btn-lg blue-button">Показать все специализации</button>
            </div>
        </div>
        <!-- Sidebar -->
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
                <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0.png')}}" />
                <h6>
                    <b>Задайте вопрос бесплатно</b>
                </h6>
                <a class="btn btn-default btn-success pulse-button" type="button" href="ask-question.html">Задать вопрос</a>
            </div>
        </div>
        <!-- /Sidebar -->
    </div>
    <div class="row">
        <div class="col-md-9" id="search-cities">
            <h3>Выбор юриста по городу</h3>
            <input type="text" name="city" list="cities" class="form-control" placeholder="Начните вводить название">
            <datalist id="cities">
                <option value="Ташкент 1"></option>
                <option value="Ташкент 2"></option>
                <option value="Ташкент 3"></option>
            </datalist>
            
            <div id="city-tags">
                <a href="#">Андижан</a>
                <a href="#">Бухара</a>
                <a href="#">Джизак</a>
                <a href="#">Карши</a>
                <a href="#">Навои</a>
                <a href="#">Ташкент</a>
                <a href="#">Фергана</a>
                <a href="#">Ургенч</a>
                <a href="#">Hукус</a>
                <a href="#">все города...</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Последние добавленные юристы</h3>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-3.jpg')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-4.jpg')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-5.jpg')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-1.png')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-1.png')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-1.png')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-1.png')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div>
            <div class="col-sm-3">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="{{ asset('dist/images/rotating-card-cover.png')}}"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="{{ asset('dist/images/headshot-1.png')}}"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h2 class="name">Казаков Илья</h2>
                                    <p class="profession">юрист, г. Калининград</p>
                                    <p class="text-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="text-center rank">8,0 Рейтинг</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Перевернуть
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Специализация</h4>
                                    <p class="text-center">Банкротство и ликвидация, Защита бизнеса,Налоговая и корпоративная оптимизация. Арбитраж в Москве и Калининграде.</p>

                                    <div class="stats-container text-center">
                                        <div class="stats">
                                            <h4>17</h4>
                                            <p>
                                                лет стажа
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>5</h4>
                                            <p>
                                                специализаций
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <button type="button" class="btn btn-default btn-block blue-button">Обратиться к юристу</button>
                                    <span>1152 отзыва от клиентов</span>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
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
    </div>
</div>
<!-- /Main Section -->

<!-- /Lawyers -->

@endsection
@endsection
