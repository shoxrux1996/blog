@extends('layouts.app')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/blog.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/individual-lawyer.css')}}" rel="stylesheet">
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
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img style="width: 200px; height: 200px;" src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-3.jpg')}}"
                                 class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                {{$lawyer->user->firstName}}
                                {{$lawyer->user->lastName}}
                            </div>
                            <div class="profile-usertitle-job">
                                {{$lawyer->job_status}}, г. {{$lawyer->user->city->name}} <br/>
                                {{--Был в сети сегодня в 15:04--}}
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#refer-lawyer">Обратиться к юристу</button>

                            <!-- Modal for refer lawyer function-->
                            <div id="refer-lawyer" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">@lang('index.soon')!!!</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                                            <h4>Функция "обратиться к юристу" в процессе разработки</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('index.close')</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /Modal for refer lawyer function-->

                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-user"></i>
                                        Профиль</a></li>
                                <li><a data-toggle="tab" href="#specialisation"><i class="fa fa-tasks"></i>
                                        Специализация</a></li>
                                <li><a data-toggle="tab" href="#education"><i class="fa fa-graduation-cap"></i>
                                        Образование</a></li>
                                <li><a data-toggle="tab" href="#answers"><i class="fa fa-reply"></i>
                                        Отвеченные вопросы <span class="badge">7</span></a></li>
                                <li><a data-toggle="tab" href="#articles"><i class="fa fa-newspaper-o"></i>
                                        Статьи <span class="badge">4</span></a></li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
                <div class="tab-content">
                    <!-- Lawyer's profile -->
                    <div class="col-md-9 tab-pane fade in active profile-content" id="profile">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                <h1>10,0</h1>
                                <h6><b>Рейтинг Yuridik.uz</b></h6>
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h1>99%</h1>
                                <h6><b>довольных клиентов</b></h6>
                                <p>
                                    <a href="#">{{$lawyer->countPositiveFeedbacks() }} отзывов</a>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h1>
                                    <i class="fa fa-registered"></i>
                                    <h5><b>Член экспертного совета Правовед.ru</b></h5>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>
                                    <i class="fa fa-building"></i> О себе
                                </h4>
                                <p>{{$lawyer->about_me}}</p>

                                <p><span class="color-gray">На проекте:</span>
                                    с {{Carbon\Carbon::parse($lawyer->created_at)->toFormattedDateString()}}</p>
                            </div>
                            <div class="col-sm-6">
                                <h4>
                                    <i class="fa fa-money"></i> Стоимость услуг
                                </h4>
                                <p>{{$lawyer->profile_shown_price}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Lawyer's profile -->

                    <!-- Lawyer's specialisation -->
                    <div class="col-md-9 tab-pane fade profile-content" id="specialisation">
                        <div class="row" id="category-section">
                            <h3>Специализация</h3>
                            <h6 class="color-gray"><b>Всего {{$lawyer->answers->count()}} </b></h6>
                            <hr>
                            <h6 class="color-gray"><b>Специализируется в 5 категориях:</b></h6>
                            <div class="row">
                                @foreach($lawyer->categories as $category)
                                    <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                        <a href="{{route('web.category.show', $category->name)}}">
                                            <i class="fa fa-building"></i> {{$category->name}}
                                        </a>
                                        @foreach($category->children as $sub_category)
                                            <p><a href="{{route('web.category.show', $sub_category->name)}}">{{$sub_category->name}}</a></p>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Lawyer's specialisation -->

                    <!-- Lawyer's education -->
                    <div class="col-md-9 tab-pane fade profile-content" id="education">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <h5><b><i class="fa fa-graduation-cap"></i> Образование 1</b></h5>
                                    <li><h6><span class="color-gray">Страна:</span> Россия</h6></li>
                                    <li><h6><span class="color-gray">Город:</span> Красноярск</h6></li>
                                    <li><h6><span class="color-gray">ВУЗ:</span> СибЮИ ФСКН</h6></li>
                                    <li><h6><span class="color-gray">Факультет:</span> Общеюридический</h6></li>
                                    <li><h6><span class="color-gray">Год выпуска:</span> 2013</h6></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <h5><b><i class="fa fa-graduation-cap"></i> Образование 2</b></h5>
                                    <li><h6><span class="color-gray">Страна:</span> Россия</h6></li>
                                    <li><h6><span class="color-gray">Город:</span> Красноярск</h6></li>
                                    <li><h6><span class="color-gray">ВУЗ:</span> СибЮИ ФСКН</h6></li>
                                    <li><h6><span class="color-gray">Факультет:</span> Общеюридический</h6></li>
                                    <li><h6><span class="color-gray">Год выпуска:</span> 2013</h6></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Lawyer's education -->

                    <!-- Lawyer answered questions -->
                    <div class="col-md-9 tab-pane fade profile-content" id="answers">
                        <div class="col-sm-12">
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
                                        10 
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
                                        0 
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
                                        7 
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
                                        1 
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
                                        1 
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
                                        3 
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
                                        3 
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
                    </div>
                    <!-- Lawyer answered questions -->

                    <!-- Lawyer's articles -->
                    <div class="col-md-9 tab-pane fade profile-content" id="articles">
                        <div class="row">
                            <a href="individual-blog.html">
                                <div class="col-sm-6">
                                    <div class="blog-item">
                                        <div class="ribbon"><span>Модераторы</span></div>
                                        <div class="blog-item-img">
                                            <img alt="Blog item image" src="{{asset('dist/images/blog-img-3.jpg')}}"/>
                                            <div class="middle">
                                                <button class="btn btn-dark-blue text">Читать статью</button>
                                            </div>
                                        </div>
                                        <div class="blog-item-description">
                                            <h5><b>Как работать, если подписал договор ГПХ вместо трудового</b></h5>
                                            <p>В чем сложности, идет ли стаж, можно ли работать из дома — и другие детали.</p>
                                            <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-sm-6">
                                    <div class="blog-item">
                                        <div class="ribbon"><span>Модераторы</span></div>
                                        <div class="blog-item-img">
                                            <img alt="Blog item image" src="{{asset('dist/images/blog-img-1.jpg')}}"/>
                                            <div class="middle">
                                                <button class="btn btn-dark-blue text">Читать статью</button>
                                            </div>
                                        </div>
                                        <div class="blog-item-description">
                                            <h5><b>Как работать, если подписал договор ГПХ вместо трудового</b></h5>
                                            <p>В чем сложности, идет ли стаж, можно ли работать из дома — и другие детали.</p>
                                            <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-sm-6">
                                    <div class="blog-item">
                                        <div class="ribbon"><span>Модераторы</span></div>
                                        <div class="blog-item-img">
                                            <img alt="Blog item image" src="{{asset('dist/images/blog-img-2.jpg')}}"/>
                                            <div class="middle">
                                                <button class="btn btn-dark-blue text">Читать статью</button>
                                            </div>
                                        </div>
                                        <div class="blog-item-description">
                                            <h5><b>Как работать, если подписал договор ГПХ вместо трудового</b></h5>
                                            <p>В чем сложности, идет ли стаж, можно ли работать из дома — и другие детали.</p>
                                            <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Lawyer answered questions -->
                </div>
            </div>
        </div>
    </div>
@endsection