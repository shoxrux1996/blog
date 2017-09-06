@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">@lang('client-settings.Главная')</a></li>
  <li><a href="{{ route('lawyers.list')}}">@lang('client-settings.Юристы')</a></li>
  <li><a href="{{ route('question.list')}}">@lang('client-settings.Вопросы')</a></li>
  <li><a href="{{ route('web.blogs')}}">@lang('client-settings.Блог')</a></li>
  <li><a href="{{ route('how-works')}}">@lang('client-settings.Как это работает')</a></li>
  <li><a href="{{ route('about')}}">@lang('client-settings.О нас')</a></li>
@endsection
@section('content')
<!-- Content -->
<div id="wrapper">
    <div class="container">
        <div class="col-sm-3">
            <!-- Profile -->
            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#profile">
                            @lang('client-settings.Мой профиль') <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="profile" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h6><b>{{$client->user->firstName}} {{$client->user->lastName}}</b></h6>
                                <p class="color-gray">@lang('client-settings.г'). {{$client->user->city->name}}</p>
                                <a href="{{ route('client.dashboard')}}">@lang('client-settings.Личный кабинет')</a>
                            </li>
                            <li>
                                <h3>{{$client->user->balance()}} @lang('client-settings.сум').</h3>
                                <a href="#">@lang('client-settings.Управление балансом')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Profile -->

            <!-- Site services -->
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#services">
                            @lang('client-settings.Мой профиль') <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">@lang('client-settings.Вопросы юристам')</a>
                            </li>
                            <li>
                                <a href="#">@lang('client-settings.Консультации по телефону')</a>
                            </li>
                            <li>
                                <a href="#">@lang('client-settings.Документы')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Site services -->
        </div>
        <div class="col-sm-9 border-gray background-white">
            <h5 class="text-success"><i class="fa fa-pencil"></i> @lang('client-settings.Редактирование профиля')</h5>
            <ul class="nav nav-tabs">
                <li class="{{$settingtype==='main' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#main">@lang('client-settings.Основное')</a>
                </li>
                <li class="{{$settingtype==='photo' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#photo">@lang('client-settings.Фотография')</a>
                </li>
                <li class="{{$settingtype==='privacy' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#password">@lang('client-settings.Почта и пароль')</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="main" class="tab-pane fade in {{$settingtype==='main' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('client.update',['settingtype'=>'main'])}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="surname">@lang('client-settings.Фамилия')</label>
                                    <input type="text" class="form-control " id="surname" name="surname" value="{{$client->user->lastName}}" />
                                </div>
                                <div class="form-group">
                                    <label for="name">@lang('client-settings.Имя')</label>
                                    <input type="text" class="form-control " id="name" name="name" value="{{$client->user->firstName}}" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="city">@lang('client-settings.Город')</label>
                                     {{Form::select('city', $cities, $client->user->city_id, ['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    <label for="birthday">@lang('client-settings.Дата рождение')</label>
                                    {{Form::date('dateOfBirth', $client->user->dateOfBirth, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group form-inline">
                                    <label>@lang('client-settings.Пол') </label>
                                    <input type="radio" name="gender" value="M" {{$client->gender==='M' ? 'checked' : ''}} /> @lang('client-settings.Мужской')
                                    <input type="radio" name="gender" value="F" {{$client->gender==='F' ? 'checked' : ''}}/> @lang('client-settings.Женский')
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary pull-right">@lang('client-settings.Сохранить')</button>
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
                                <img id="blah" src="{!!asset($client->user->file->path . $client->user->file->file)!!}" alt="..." class="img-thumbnail" style="height: 300px;">
                            @else
                                <img class="img-thumbnail" id="blah" src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}" />
                            @endif
                            </div>
                            <form action="{{ route('client.update',['settingtype'=>'photo'])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                                    <label class="btn btn-default ">
                                        @lang('client-settings.Выбрать файл') <input class="image" type="file" onchange="readURL(this);"  name="image" hidden>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary">@lang('client-settings.Загрузить')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="password" class="tab-pane fade in {{$settingtype==='privacy' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('client.update',['settingtype'=>'privacy'])}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="email">@lang('client-settings.Email')</label>
                                    <input type="email" class="form-control " id="email" readonly placeholder="{{$client->email}}" />
                                </div>
                                <div class="form-group{{$errors->has('wrong-attempt') ? ' has-error' : '' }}">
                                    <label for="current-password">@lang('client-settings.Текущий пароль')</label>
                                    @if ($errors->has('wrong-attempt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                    </span>
                                    @endif
                                    <input type="password" class="form-control " id="current-password" name="current_password"/>
                                </div>
                                <div class="form-group{{$errors->has('new_password') ? ' has-error' : '' }}">
                                    <label for="new-password">@lang('client-settings.Новый пароль')</label>
                                    @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                    <input type="password" class="form-control " id="new-password" name="new_password" />
                                </div>
                                <div class="form-group">
                                    <label for="news-password-confirm">@lang('client-settings.Новый пароль еще раз')</label>
                                    <input type="password" class="form-control " id="new-password-confirm" name="new_password_confirmation" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-primary pull-right">@lang('client-settings.Сохранить')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection