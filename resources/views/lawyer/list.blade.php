@extends('layouts.app')
@section('scripts')
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/rotating-card.css')}}" rel="stylesheet">
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
    <!-- Lawyers -->

    <!-- Search Lawyer Section -->
    <div class="container-fluid" id="search-lawyer">
        <div class="row">
            <div class="col-sm-6 text-center" id="form">
                <h1>Поиск по юристов и адвокатов</h1>
                <form action="{{route('search.lawyers')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group text-left">
                        <label for="name"><i class="fa fa-address-card"></i> Имя или специализация</label>
                        <input id="name" name="search" list="names" type="text" class="form-control"
                               placeholder="“Бизнес” или “Жон Смит”"/>
                        <datalist id="names">
                            @foreach($best_lawyers as  $lawyer)
                                <option value="{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}"></option>
                            @endforeach
                            @foreach($categories as $category)
                                <option value="{{$category->name}}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-default blue-button">Поиск</button>
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
                    <img class="img-responsive" src="{{ asset('dist/images/return-money-icon.png')}}"
                         alt="Return money"/>
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
                    @foreach($categories as $category)
                        <div class="col-sm-4">
                            <h4><i class="fa fa-users"></i><a href="#"> {{$category->name}}</a></h4>
                            @foreach($category->children as $children)
                                <p><a href="#">{{$children->name}}</a></p>
                            @endforeach
                        </div>
                    @endforeach
                </div>


                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg blue-button">Показать все специализации</button>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-sm-3 text-center">
                <h3>Лучшие юристы</h3>
                @foreach($best_lawyers as $lawyer)
                    <div class="best-lawyers">
                        <img src="{{$lawyer->file != null ? asset($lawyer->file->path.$lawyer->file->file) : asset('dist/images/headshot-1.png')}}"
                             class="img-rounded"/>
                        <h3>{{$lawyer->user->firstName}}</h3>
                        <h6>
                            <b>{{$lawyer->job_status}}, г. {{  $lawyer->user->city->name }}</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="#">Посмотреть профиль</a>
                    </div>
                @endforeach

                <div class="ask-question-block text-center">
                    <img class="img-responsive" src="{{ asset('dist/images/one-word-save_0.png')}}"/>
                    <h6>
                        <b>Задайте вопрос бесплатно</b>
                    </h6>
                    <a class="btn btn-default btn-success pulse-button" type="button"
                       href="{{route('question.create')}}">Задать вопрос</a>
                </div>
            </div>
            <!-- /Sidebar -->
        </div>
        <div class="row">
            <div class="col-md-9" id="search-cities">
                <h3>Выбор юриста по городу</h3>
                <form action="{{route('search.lawyers')}}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="city" list="cities" class="form-control"
                           placeholder="Начните вводить название">
                </form>

                <datalist id="cities">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}"></option>
                    @endforeach
                </datalist>

                <div id="city-tags">
                    <form action="{{route('search.lawyers')}}" method="post">
                        {{csrf_field()}}
                        @foreach($cities as $index => $city)
                            @if($index <= 3)
                                <button type="submit" class="btn-link" name="city"
                                        value="{{$city->name}}">{{$city->name}}</button>
                                @if($index == 3)
                                    <a class="btn-link city1" onclick="showCities()">Все города ...</a>
                                    @endif
                            @else
                                <button type="submit" class="btn-link cities"  name="city"
                                        value="{{$city->name}}" style="display: none;">{{$city->name}}</button>
                            @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Последние добавленные юристы</h3>
                @foreach($lawyers as $lawyer)
                    <div class="col-sm-3">
                        <div class="card-container">
                            <div class="card">
                                <div class="front">
                                    <div class="cover">
                                        <img src="{{asset('dist/images/rotating-card-cover.png')}}"/>
                                    </div>
                                    <div class="user">
                                        <img class="img-circle"
                                             src="{{$lawyer->file != null ? asset($lawyer->file->path.$lawyer->file->file) : asset('dist/images/headshot-3.jpg')}}"/>
                                    </div>
                                    <div class="content">
                                        <div class="main">
                                            <h2 class="name">{{$lawyer->user->firstName}}</h2>
                                            <p class="profession">{{$lawyer->job_status}},
                                                г. {{$lawyer->user->city->name}}</p>
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
                                            <p class="text-center">@foreach($lawyer->categories as $category){{$category->name}}
                                                . @endforeach</p>

                                            <div class="stats-container text-center">
                                                <div class="stats">
                                                    <h4>{{$lawyer->experienced_year}}</h4>
                                                    <p>
                                                        лет стажа
                                                    </p>
                                                </div>
                                                <div class="stats">
                                                    <h4>{{$lawyer->categories->count()}}</h4>
                                                    <p>
                                                        специализаций
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="footer">
                                        <div class="social-links text-center">
                                            <button type="button" class="btn btn-default btn-block blue-button">
                                                Обратиться к юристу
                                            </button>
                                            <span>{{$lawyer->feedbacks->count()}} отзыва от клиентов</span>
                                        </div>
                                    </div>
                                </div> <!-- end back panel -->
                            </div> <!-- end card -->
                        </div> <!-- end card-container -->
                    </div>
                @endforeach
                <div class="col-sm-12 text-center">
                    {!! $lawyers->links('pagination') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Section -->

    <!-- /Lawyers -->

@endsection
@endsection
@section('styles')
<script>
    var index =0;
    function showCities() {
        var cities = document.getElementsByClassName('cities');


        if(index == 0)
        {
            for (var i = 0; i < cities.length; i++) {
                cities[i].style.display = "block";

            }
            index = 1;
        }
        else{
            for (var i = 0; i < cities.length; i++) {
                cities[i].style.display = "none";

            }
            index =0;
        }
    }
</script>
@endsection