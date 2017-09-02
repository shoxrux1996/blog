@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
    <link href="{{ asset('dist/css/rotating-card.css')}}" rel="stylesheet">
@endsection
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
                <form action="{{route('search.lawyers')}}" method="get">
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
                @for($i=0; $i<$categories->count(); $i+=3)
                    <div class="row">
                        @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                            <div class="col-sm-4 col-xs-6">
                                <h4><i class="fa {{$categories[$j]->class}}"></i>
                                    <a type="submit"
                                       href="{{route('search.lawyers.bycategory', ['name'=>$categories[$j]->name])}}"
                                       name="category">
                                        {{$categories[$j]->name}}</a>
                                </h4>

                                @foreach($categories[$j]->children as $children)
                                    <p><a type="submit"
                                          href="{{route('search.lawyers.bycategory', ['name'=>$children->name])}}"
                                          name="category">
                                            {{$children->name}}</a></p>
                                @endforeach
                            </div>
                        @endfor
                    </div>
                @endfor

                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg blue-button">Показать все специализации</button>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-sm-3 text-center">
                <h3>Лучшие юристы</h3>
                @foreach($best_lawyers as $lawyer)
                    <div class="best-lawyers">
                        <img src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}"
                             class="img-circle"/>
                        <h3>{{$lawyer->user->firstName}}</h3>
                        <h6>
                            <b>{{$lawyer->job_status}}, г. {{  $lawyer->user->city->name }}</b>
                        </h6>
                        <a type="button" class="btn btn-default btn-success" href="{{route('web.lawyer.show', $lawyer->id)}}">Посмотреть профиль</a>
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
                <form action="{{route('search.lawyers')}}" method="get">
                    <input type="text" name="city" list="cities" class="form-control"
                           placeholder="Начните вводить название">
                </form>

                <datalist id="cities">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}"></option>
                    @endforeach
                </datalist>

                <div id="city-tags">
                    <form action="{{route('search.lawyers')}}" method="get">
                        <?php $i = 0; $count = count($cities); ?>
                        @foreach($cities as $index => $city)
                            <?php if($city->name == " ") continue ?>
                            @if($index <= 5)
                                <button type="submit" class="btn-link" name="city"
                                        value="{{$city->name}}">{{$city->name}}</button>
                                @if($index == 5)
                                    <a class="btn-link" onclick="showCities()" id="show-cities">Все города ...</a>
                                @endif
                            @else
                                <?php if($i % 5 == 0) echo "<p style=\"margin-bottom: 0; \">" ?>
                                <button type="submit" class="btn-link cities" name="city" value="{{$city->name}}" style="display: none;">{{$city->name}}</button>
                                <?php $i++; if($i % 5 == 0 || $count == $index) echo "</p>" ?>
                            @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Найденные юристы</h3>
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
                                             src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}"/>
                                    </div>
                                    <div class="content">
                                        <div class="main">
                                            <h2 class="name">{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h2>
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
                                            <a href="{{route('web.lawyer.show', $lawyer->id)}}" type="button" class="btn btn-default btn-block blue-button">
                                                Обратиться к юристу
                                            </a>
                                            <span>{{$lawyer->feedbacks->count()}} отзыва от клиентов</span>
                                        </div>
                                        {{--<button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)" id="rotate-back-button">--}}
                                        {{--<i class="fa fa-reply"></i> Back--}}
                                        {{--</button>--}}
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
@section('scripts')
    <script>
        var index = 0;
        function showCities() {
            var showCityButton = $('#show-cities');
            showCityButton.css('display', 'none');
            var cities = document.getElementsByClassName('cities');

            if (index === 0) {
                for (var i = 0; i < cities.length; i++) {
                    cities[i].style.display = "inline";
                }
                index = 1;
            }
            else {
                for (var i = 0; i < cities.length; i++) {
                    cities[i].style.display = "none";
                }
                index = 0;
            }
        }


        function rotateCard(btn){
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if($card.hasClass('hover')){
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }

    </script>
@endsection