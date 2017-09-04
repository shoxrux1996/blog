@extends('layouts.app-admin')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/individual-lawyer.css')}}" rel="stylesheet">
@endsection
@section('content')
    <nav class="navbar navbar-default" style="border-radius: 0; border-width: 0 0 thin 0;">
        <ul class="nav navbar-nav">
            <li class="{{ $section == 1 ? "active" : "" }}">
                <a href="{{route('admin.clients.index')}}" onclick="switchSection('section1')"><i
                            class="fa fa-columns"></i>
                    Клиенты</a>
            </li>
            <li class="{{ $section == 2 ? "active" : "" }}">
                <a href="{{route('admin.lawyers.index')}}" onclick="switchSection('section2')"><i
                            class="fa fa-list-alt"></i> Юристы</a>
            </li>
        </ul>
    </nav>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- Clients -->
            <div id="section1" class="section" style="display: {{ $section == 1 ? "block" : "none" }};">
                @foreach ($clients as $lawyer)
                    <div class="row profile border-gray">
                        <div class="col-md-3">
                            <div class="profile-sidebar">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <img src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-3.jpg')}}"
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
                                        {{--Был в сети сегодня в 15:04--}}
                                    </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->

                                <!-- END SIDEBAR BUTTONS -->
                                <!-- SIDEBAR MENU -->
                                <div class="profile-usermenu">
                                    <ul class="nav">
                                        <li class="active">
                                            <a data-toggle="tab" href="#profile-client-{{$lawyer->id}}">
                                                <i class="fa fa-user"></i>Профиль
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#questions-client-{{$lawyer->id}}">
                                                <i class="fa fa-user"></i>Вопросы <span class="badge">{{$lawyer->questions->count()}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#documents-client-{{$lawyer->id}}">
                                                <i class="fa fa-user"></i>Документы <span class="badge">{{$lawyer->documents->count()}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="col-md-9 tab-pane fade in active" id="profile-client-{{$lawyer->id}}">
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <h1>10,0</h1>
                                        <h6><b>Рейтинг Правовед.ru</b></h6>
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
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>
                                            <i class="fa fa-building"></i> О себе
                                        </h4>
                                        <p>
                                            {{$lawyer->user->description}}
                                        </p>
                                        <p><span class="color-gray">Почта: <strong>{{$lawyer->email}}</strong> </span></p>
                                        <p><span class="color-gray">Дата рождения: </span>
                                            <strong>
                                                {{Carbon\Carbon::parse($lawyer->user->dateOfBirth)->toFormattedDateString()}}
                                            </strong>
                                        </p>
                                        <p><span class="color-gray">город: </span> <strong>{{$lawyer->user->city->name}} </strong>
                                        </p>
                                        <p><span class="color-gray">тел: </span><strong>{{$lawyer->user->phone}} </strong></p>
                                        <p>
                                            <span class="color-gray">На проекте:</span>
                                            <strong>
                                                с {{Carbon\Carbon::parse($lawyer->created_at)->toFormattedDateString()}}
                                            </strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-9 tab-pane fade" id="questions-client-{{$lawyer->id}}">
                                <h4>Вопросы</h4>
                                <ul>
                                    <li>
                                        <a href="#">Questions</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9 tab-pane fade" id="documents-client-{{$lawyer->id}}">
                                <h4>Документы</h4>
                                <ul>
                                    <li>
                                        <a href="#">Documents</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <!-- Buttons -->
                        <div class="row">
                            @if($lawyer->isBlocked == false)
                                <form action="{{ route('admin.client.block', [$lawyer->id]) }}" class="form-inline"
                                      method="post">
                                    {{csrf_field()}}
                                    <input type="date" class="date form-control" name="date" style="margin: 10px 30px;"
                                           value="{{\Carbon\Carbon::now('Asia/Tashkent')->format('Y-m-d')}}">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            style="margin:0px 30px 0 0;">Блокировать
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.client.unblock', [$lawyer->id]) }}"
                                      method="post">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-success btn-sm"
                                            style="margin:0px 0 0 40px;">Разблокировать
                                    </button>
                                </form>
                            @endif
                        </div>
                        <!-- /Buttons -->
                    </div>
                @endforeach

            </div>
            <!-- /Clients -->

            <!-- Lawyers -->
            <div id="section2" class="section" style="display: {{ $section == 2 ? "block" : "none" }};">

                @foreach ($lawyers as $lawyer)
                    <div class="row profile border-gray">
                        <div class="col-md-3">
                            <div class="profile-sidebar">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <img src="{{$lawyer->user->file != null ? asset($lawyer->user->file->path.$lawyer->user->file->file) : asset('dist/images/headshot-3.jpg')}}"
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
                                    <button type="button" class="btn btn-success btn-sm">Обратиться к юристу</button>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->

                                <!-- SIDEBAR MENU -->
                                <div class="profile-usermenu">
                                    <ul class="nav">
                                        <li class="active"><a data-toggle="tab" href="#profile-{{$lawyer->id}}"><i
                                                        class="fa fa-user"></i>
                                                Профиль</a></li>
                                        <li><a data-toggle="tab" href="#specialisation-{{$lawyer->id}}"><i class="fa fa-tasks"></i>
                                                Специализация</a></li>
                                        <li><a data-toggle="tab" href="#education-{{$lawyer->id}}"><i class="fa fa-graduation-cap"></i>
                                                Образование</a></li>
                                        <li><a data-toggle="tab" href="#awards-{{$lawyer->id}}"><i class="fa fa-graduation-cap"></i>
                                                Сертификаты</a></li>
                                    </ul>
                                </div>
                                <!-- /SIDEBAR MENU -->
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="col-md-9 tab-pane fade in active profile-content" id="profile-{{$lawyer->id}}">
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <h1>10,0</h1>
                                        <h6><b>Рейтинг Правовед.ru</b></h6>
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
                                        <p><b>Email: </b> <a href="mailto:testtest@mail.ru">testtest@mail.ru</a></p>
                                        <p><b>Отчество:</b> Каюмович</p>
                                        <p>{{$lawyer->about_me}}</p>
                                        <p><b>Тел: </b>+(97) 765-32-21</p>
                                        <p><b>Пол: </b> Мужчина</p>
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
                            <div class="col-md-9 tab-pane fade profile-content" id="specialisation-{{$lawyer->id}}">
                                <div class="row" id="category-section">
                                    <h3>Специализация</h3>
                                    <h6 class="color-gray"><b>Всего {{$lawyer->answers->count()}} ответа</b></h6>
                                    <hr>
                                    <h6 class="color-gray"><b>Специализируется в 5 категориях:</b></h6>
                                    <div class="row">
                                        @foreach($lawyer->categories as $category)
                                            <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                                <a href="{{route('web.category.show', $category->name)}}">
                                                    <i class="fa fa-building"></i> {{$category->name}}
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
                            <div class="col-md-9 tab-pane fade profile-content" id="education-{{$lawyer->id}}">
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
                            <div class="col-md-9 tab-pane fade profile-content" id="awards-{{$lawyer->id}}">
                                <div class="row">
                                    <h6><b>Награды</b></h6>
                                    @if($lawyer->files != null)
                                        @foreach($lawyer->files as $award)
                                            <div class="col-sm-3">
                                                <img class="img-responsive img-thumbnail"
                                                     src="{!!asset($award->path . $award->file)!!}"/>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                @if($lawyer->type==1)
                                    <form action="{{ route('admin.lawyer.confirm',[$lawyer->id]) }}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 10px;">Принять
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.lawyer.confirm',[$lawyer->id]) }}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success btn-sm pull-right"  style="margin-right: 10px;">Отказать
                                        </button>
                                    </form>
                                @endif
                                @if($lawyer->isBlocked == false)
                                    <form action="{{ route('admin.lawyer.block', [$lawyer->id]) }}" class="form-inline"
                                          method="post">
                                        {{csrf_field()}}
                                        <input type="date" class="date form-control" name="date" style="margin: 0 10px;"
                                               value="{{\Carbon\Carbon::now('Asia/Tashkent')->format('Y-m-d')}}">
                                        <button type="submit" class="btn btn-danger btn-sm">Блокировать
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.lawyer.unblock', [$lawyer->id]) }}"
                                          method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px;">Разблокировать
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <!-- /Buttons -->
                    </div>
                @endforeach

            </div>
            <!-- /Lawyers -->

        </div>
    </div>
@endsection
