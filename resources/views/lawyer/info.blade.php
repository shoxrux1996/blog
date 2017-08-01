@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyer.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
    <!-- <div class="container">
        {{Form::model($lawyer, ['route' => ['lawyer.update', $lawyer->id], 'enctype' => 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal'])}}
        <div class="form-group">
            {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('email', $lawyer->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('firstName', $lawyer->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Last Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('lastName', $lawyer->user->lastName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Gender: ', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-6">
                {{Form::label('Male', 'Male: ', ['class' => 'col-sm-2'])}} {{Form::radio('gender', 'M')}}
            </div>
            <div class="col-sm-6">
                {{Form::label('Female', 'Female: ', ['class' => 'col-sm-2'])}} {{Form::radio('gender', 'F')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::date('dateOfBirth', $lawyer->user->dateOfBirth, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::select('city', $cities, $lawyer->user->city_id, ['class'=>'form-control'])}}
            </div>
        </div>


        <div class="form-group">
            @if ($errors->has('image'))
                <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
            @endif
            @if($lawyer->user->file != null)
              <img src="{!!asset($lawyer->user->file->path . $lawyer->user->file->file)!!}" alt="..." class="img-thumbnail" style="height: 300px;">
            @endif
            {{Form::label('image', 'Photo: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                <input class = "image" type="file" name="image" />

            </div>
        </div>

        {{Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
        {{Form::close()}}

    </div> -->

<!-- Content -->
<div id="wrapper">
    <div class="container">
        <div class="col-sm-3">
            <!-- Profile -->
            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#profile">
                            Мой профиль <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="profile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h6><b>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</b></h6>
                                <p class="color-gray">г. {{$lawyer->user->city->name}}</p>
                                <a href="{{ route('lawyer.info')}}">Редактировать</a>
                            </li>
                            <li>
                                <i class="fa fa-hourglass pull-left"></i>
                                <p class="color-grey">
                                    Как считается рейтинг?
                                </p>
                                <p>
                                    <a href="#">Как считается рейтинг?</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="#">Отзывы:</a>
                                </p>
                                <p>
                                    0 положительных
                                </p>
                                <p>
                                    0 отрицательных
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Profile -->

            <!-- Account -->
            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#account">
                            Мой аккаунт <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="account" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h3>0 сум.</h3>
                                <h3>0 юркоинов</h3>
                                <a href="#">Управление балансом</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Account -->

            <!-- My practices -->
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#services">
                            Моя практика <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">Вопросы</a>
                            </li>
                            <li>
                                <a href="#">Заявки</a>
                            </li>
                            <li>
                                <a href="#">Документы</a>
                            </li>
                            <li>
                                <a href="#">Телефонные консультации</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /My practices -->
        </div>


        <div class="col-sm-9 background-white border-gray">
            <h5 class="text-success">Редактирование профиля</h5>
            <ul class="nav nav-tabs">
                <li class="{{$settingtype==='main' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#main">Основное</a>
                </li>
                <li class="{{$settingtype==='main' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#photo">Фотография</a>
                </li>
                <li class="{{$settingtype==='password' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#password">Почта и пароль</a>
                </li>
                <li class="{{$settingtype==='contacts' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#contacts">Контакты</a>
                </li>
                <li class="{{$settingtype==='education' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#education">Образование</a>
                </li>
                <li class="{{$settingtype==='experience' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#experience">Опыть</a>
                </li>
                <li class="{{$settingtype==='additional' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#additional">Дополнительно</a>
                </li>
                <li class="{{$settingtype==='awards' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#awards">Награды</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="main" class="tab-pane fade in {{$settingtype==='main' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('lawyer.update',['settingtype'=>'main'])}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input type="text" class="form-control " id="surname" name="surname" value="$lawyer->user->lastName" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control " id="name" name="name" value="$lawyer->user->firstName" />
                                </div>
                                <!-- <div class="form-group">
                                    <label for="patronymic">Отчество</label>
                                    <input type="text" class="form-control " id="patronymic"/>
                                </div> -->
                                <div class="form-group">
                                    <label for="city">Город</label>
                                     {{Form::select('city', $cities, $client->user->city_id, ['class'=>'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="status">Ваш статус</label>
                                    <select class="form-control" id="status">
                                        <option>Адвокат</option>
                                        <option>Нотариус</option>
                                        <option>Юрист</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Дата рождение</label>
                                    {{Form::date('dateOfBirth', $lawyer->user->dateOfBirth, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group form-inline">
                                    <label>Пол </label>
                                     <input type="radio" name="gender" value="M" {{$lawyer->gender==='M' ? 'checked' : ''}} /> Мужской
                                    <input type="radio" name="gender" value="F" {{$lawyer->gender==='F' ? 'checked' : ''}}/> Женский
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary pull-right">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="photo" class="tab-pane fade in {{$settingtype==='photo' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="img-responsive">
                                @if($client->user->file != null)
                                    <img src="{!!asset($client->user->file->path . $client->user->file->file)!!}" alt="..." class="img-thumbnail" style="height: 300px;">
                                @else
                                    <img class="img-thumbnail" src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}" />
                                @endif
                            </div>
                            <form action="{{ route('lawyer.update',['settingtype'=>'photo'])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                                    <label class="btn btn-default ">
                                        Выбрать файл <input class="image" type="file" name="image" hidden>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary">Загрузить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="password" class="tab-pane fade in {{$settingtype==='password' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('lawyer.update',['settingtype'=>'privacy'])}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control " id="email" readonly placeholder="{{$lawyer->email}}" />
                                </div>
                                <div class="form-group{{$errors->has('wrong-attempt') ? ' has-error' : '' }}">
                                    <label for="current-password">Текущий пароль</label>
                                    @if ($errors->has('wrong-attempt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                    </span>
                                    @endif
                                    <input type="password" class="form-control " id="current-password" name="current_password"/>
                                </div>
                                <div class="form-group{{$errors->has('new_password') ? ' has-error' : '' }}">
                                    <label for="new-password">Новый пароль</label>
                                    @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                    <input type="password" class="form-control " id="new-password" name="new_password"/>
                                </div>
                                <div class="form-group">
                                    <label for="news-password-confirm">Новый пароль еще раз</label>
                                    <input type="password" class="form-control " id="news-password-confirm" name="new_password_confirmation"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary pull-right">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="contacts" class="tab-pane fade in {{$settingtype==='contacts' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" class="form-control" id="phone"/>
                                </div>
                                <div class="form-group">
                                    <label for="fax">Факс</label>
                                    <input type="text" class="form-control" id="fax"/>
                                </div>
                                <div class="form-group">
                                    <label for="publish-email">Email для публикации</label>
                                    <input type="email" class="form-control" id="publish-email"/>
                                </div>
                                <div class="form-group">
                                    <label for="website">Личный сайт</label>
                                    <input type="text" class="form-control" id="website"/>
                                </div>
                                <div class="form-group">
                                    <label for="skype">Skype</label>
                                    <input type="text" class="form-control" id="skype"/>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-default btn-primary pull-right">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="education" class="tab-pane fade in {{$settingtype==='education' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="country">Страна</label>
                                <select class="form-control" id="country">
                                    <option>Узбекистан</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city-input">Город</label>
                                <input type="text" class="form-control" id="city-input"/>
                            </div>
                            <div class="form-group">
                                <label for="university">ВУЗ</label>
                                <input type="text" class="form-control" id="university"/>
                            </div>
                            <div class="form-group">
                                <label for="faculty">Факультет</label>
                                <input type="text" class="form-control" id="faculty"/>
                            </div>
                            <div class="form-group">
                                <label for="graduated-year">Год выпуска</label>
                                <select class="form-control" id="graduated-year">
                                    <option>2013</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="experience" class="tab-pane fade in {{$settingtype==='experience' ? 'active' : ''}}">
                    <div class="row">
                        <p class="color-gray">Выбор специализации (можно выбрать не более пяти)</p>
                        <div class="col-sm-6">
                            <label class="checkbox">
                                <input type="checkbox" value="">Конституционное право
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Семейное право
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Трудовое право
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Защита прав потребителей
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Наследство
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="checkbox">
                                <input type="checkbox" value="">Гражданское право
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Недвижимость
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Уголовное право
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Социальное обеспечение
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" value="">Бухгалтерский учет
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <p class="color-gray">Текущее место работы</p>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="company">Компания</label>
                                <input type="text" id="company" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="position">Должность</label>
                                <input type="text" id="position" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="experience-year">Юридический стаж</label>
                                <select class="form-control" id="experience-year">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="additional" class="tab-pane fade in {{$settingtype==='additional' ? 'active' : ''}}">
                    <div class="row">
                        <h6 class="color-gray"><b>Стоимость услуг в чате</b></h6>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="phone-consultion">Телефонная консультация (сум)</label>
                                <input type="text" id="phone-consultion" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="document-prep">Изготовление документа (сум)</label>
                                <input type="text" id="document-prep" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6><b>Дополнительно</b></h6>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="profile-shown-price">Стоимость услуг, отображаемая в профиле</label>
                                <textarea id="profile-shown-price" cols="20" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="about-me">О себе</label>
                                <textarea id="about-me" cols="20" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="awards" class="tab-pane fade in {{$settingtype==='awards' ? 'active' : ''}}">
                    <div class="row">
                        <h6><b>Награды</b></h6>
                        <div class="col-sm-3">
                            <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/exquisite-certificate-frames-with-template-vector.png')}}" />
                        </div>
                        <div class="col-sm-3">
                            <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/exquisite-certificate-frames-with-template-vector.png')}}" />
                        </div>
                        <div class="col-sm-3">
                            <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/exquisite-certificate-frames-with-template-vector.png')}}" />
                        </div>
                        <div class="col-sm-3">
                            <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/exquisite-certificate-frames-with-template-vector.png')}}" />
                        </div>
                        <form action="">

                            <p class="color-gray">Загрузите изображение Ваших наград или дипломов (в формате jpeg).</p>
                            <div class="form-group">
                                <label class="btn btn-default ">
                                    Выбрать файл <input type="file" hidden>
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-primary">Загрузить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->    

@endsection
@endsection