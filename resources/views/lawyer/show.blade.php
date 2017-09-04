@extends('layouts.app')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/individual-lawyer.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/blog.css')}}" rel="stylesheet">

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
                            <img style="width: 200px; height: 200px;"
                                 src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-3.jpg')}}"
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
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#refer-lawyer">Обратиться к юристу
                            </button>
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
                                            <img src="{{asset('dist/images/under-development.png')}}"
                                                 alt="Under development"/>
                                            <h4>Функция "обратиться к юристу" в процессе разработки</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-dark-blue"
                                                    data-dismiss="modal">@lang('index.close')</button>
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
                                        Отвеченные вопросы <span class="badge">{{$questions->total()}}</span></a></li>
                                <li><a data-toggle="tab" href="#articles"><i class="fa fa-newspaper-o"></i>
                                        Статьи <span class="badge">{{$blogs->total()}}</span></a></li>
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
                            <h6 class="color-gray"><b>Всего {{$lawyer->answers->count()}} ответа</b></h6>
                            <hr>
                            <h6 class="color-gray"><b>Специализируется в {{$lawyer->categories->count()}} категориях:</b></h6>
                            <div class="row">
                                @foreach($lawyer->categories as $category)
                                    <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                        <a href="{{route('web.category.show', $category->name)}}">
                                            <i class="fa {{$category->class}}"></i> {{$category->name}}
                                        </a>
                                        @foreach($category->children as $sub_category)
                                            <p>
                                                <a href="{{route('web.category.show', $sub_category->name)}}">{{$sub_category->name}}</a>
                                            </p>
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
                            @foreach($questions as $question)
                                <div class="col-sm-12 question">
                                    @if($question->type == 2 || $question->type == 1)
                                        <span class="question-price">
                                        <b>{{$question->price}} сум</b>
                                        <span>
                                            стоимость<br/>
                                            вопроса
                                        </span>
                                    </span>
                                    @endif
                                    <h4 class="title"><a
                                                href="{{route('web.question.show', $question->id)}}">{{$question->title}}</a>
                                    </h4>
                                    <p class="description">{{$question->text}}</p>
                                    <p>
                                        <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                                        <span class="number"> вопрос №{{$question->id}}</span>
                                        <span class="author">{{$question->client->user->firstName}}
                                            , г.{{$question->client->user->city->name}} </span>
                                    </p>
                                    <hr>
                                    <p>
                                        <span class="category">Категория: <a
                                                    href="{{route('web.category.show', $question->category->name)}}">{{$question->category->name}}</a></span>
                                        <a class="answers" href="{{route('web.question.show', $question->id)}}">
                                            {{$question->answers->count()}}
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                            <div class="col-sm-12 text-center">
                                {!! $questions->links('pagination') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 tab-pane fade profile-content" id="articles">
                        <div class="row">
                            @foreach($blogs as $blog)
                                <a href="{{route('web.blog.show', $blog->id)}}">
                                    <div class="col-sm-6">
                                        <div class="blog-item">
                                            <div class="ribbon">
                                                <span>{{$blog->blogable_type != 'yuridik\Admin' ? 'Юрист' : 'Модератор'}}</span>
                                            </div>
                                            <div class="blog-item-img">
                                                @if($blog->file != null)
                                                    <img alt="Blog item image"
                                                         src="{{asset($blog->file->path.$blog->file->file)}}">
                                                @else
                                                    <img alt="Blog item image"
                                                         src="{{asset('dist/images/blog-img-2.jpg')}}">
                                                @endif
                                                <div class="middle">
                                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                                </div>
                                            </div>
                                            <div class="blog-item-description">
                                                <h5>
                                                    <b>{{substr($blog->title,0,70)}} {{strlen($blog->title)>70 ? '...' : ""}}</b>
                                                </h5>
                                                <p>{{substr(strip_tags($blog->text),0,180)}} {{strlen(strip_tags($blog->text))>180 ? '...' : ""}}</p>
                                                <p class="post-info">
                                            <span>
                                                <i class="fa fa-eye"></i> {{$blog->count}}
                                            </span>
                                                    @foreach($blog->tags as $tag)
                                                        <span style="margin-left:10px;"><strong>{{$tag->name}}</strong></span>
                                                    @endforeach
                                                    <span class="pull-right">
                                                <i class="fa fa-comments-o"></i> {{$blog->comments->count()}}
                                            </span>
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="blog-item-footer">
                                            <span>
                                                <i class="fa fa-user"></i> {{$blog->blogable->user != null ? $blog->blogable->user->firstName : $blog->blogable->name}}
                                            </span>
                                                <span class="pull-right">
                                            <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="col-sm-12 text-center">
                                {!! $blogs->links('pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Lawyer answered questions -->
                <!-- Lawyer's articles -->
                <!-- Lawyer answered questions -->
            </div>
        </div>
    </div>
@endsection