@extends('layouts.app')
@section('body')
@extends('layouts.body')
@section('content')
<!-- <div class="container">
        {{Form::model($client, ['route' => ['client.update', $client->id], 'enctype' => 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal'])}}
         <div class="form-group">
            {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('email', $client->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('firstName', $client->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Last Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('lastName', $client->user->lastName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
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
            {{Form::date('dateOfBirth', $client->user->dateOfBirth, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::select('city', $cities, $client->user->city_id, ['class'=>'form-control'])}}
            </div>
        </div>
        

         <div class="form-group">
         @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
        @if($client->user->file != null)
          <img src="{!!asset($client->user->file->path . $client->user->file->file)!!}" alt="..." class="img-thumbnail" style="height: 300px;">
        @endif
            {{Form::label('image', 'Photo: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                <input class = "image" type="file" name="image" />   
            </div>
        </div>
    <div></div>
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
                                <h6><b>Улугбек</b></h6>
                                <p class="color-gray">г. Москва</p>
                                <a href="#">Редактировать</a>
                            </li>
                            <li>
                                <h3>{{$client->user->balance()}} сум.</h3>
                                <a href="#">Управление балансом</a>
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
                            Мой профиль <b class="caret"></b></a>
                    </h4>
                </div>
                <div id="services" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">Вопросы юристам</a>
                            </li>
                            <li>
                                <a href="#">Консультации по телефону</a>
                            </li>
                            <li>
                                <a href="#">Документы</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Site services -->
        </div>
        <div class="col-sm-9 border-gray background-white">
            <h5 class="text-success"><i class="fa fa-pencil"></i> Редактирование профиля</h5>
            <ul class="nav nav-tabs">
                <li class="{{$settingtype==='main' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#main">Основное</a>
                </li>
                <li class="{{$settingtype==='photo' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#photo">Фотография</a>
                </li>
                <li class="{{$settingtype==='privacy' ? 'active' : ''}}">
                    <a data-toggle="tab" href="#password">Почта и пароль</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="main" class="tab-pane fade in {{$settingtype==='main' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('client.update',['settingtype'=>'main'])}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input type="text" class="form-control " id="surname" name="lastName" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control " id="name" name="firstName" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="city">Город</label>
                                     {{Form::select('city', $cities, $client->user->city_id, ['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Дата рождение</label>
                                    {{Form::date('dateOfBirth', $client->user->dateOfBirth, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group form-inline">
                                    <label>Пол </label>
                                    <input type="radio" name="gender" value="M" {{$client->gender==='M' ? 'checked' : ''}} /> Мужской
                                    <input type="radio" name="gender" value="F" {{$client->gender==='F' ? 'checked' : ''}}/> Женский
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
                            <form action="{{ route('client.update',['settingtype'=>'photo'])}}" method="post">
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
                <div id="password" class="tab-pane fade in {{$settingtype==='privacy' ? 'active' : ''}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control " id="email" readonly placeholder="{{$client->user->email}}" />
                                </div>
                                <div class="form-group">
                                    <label for="new-password">Новый пароль</label>
                                    <input type="password" class="form-control " id="new-password"/>
                                </div>
                                <div class="form-group">
                                    <label for="news-password-confirm">Новый пароль еще раз</label>
                                    <input type="password" class="form-control " id="news-password-confirm"/>
                                </div>
                                <div class="form-group">
                                    <label for="current-password">Текущий пароль</label>
                                    <input type="password" class="form-control " id="current-password"/>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-default btn-primary pull-right">Сохранить</button>
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
@endsection