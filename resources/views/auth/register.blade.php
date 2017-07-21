@extends('layouts.app')
@section('styles')
   <link href="{{asset('dist/css/login-regis.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('content')

<!-- Login Form -->
<div class="container">
    <div class="row" id="register-bg">
        <div class="col-md-7 col-sm-10 col-xs-12">
            <h1>Регистрация на Yuridik.uz</h1>
            <ul class="nav nav-tabs">
                <li class="{{$activeuser==='client' ? 'active' : ''}}"><a data-toggle="tab" href="#client">Клиент</a></li>
                <li class="{{$activeuser==='lawyer' ? 'active' : ''}}"><a data-toggle="tab" href="#lawyer">Юрист</a></li>
                <li class="{{$activeuser==='company' ? 'active' : ''}}"><a data-toggle="tab" href="#company">Компания</a></li>
            </ul>

            <div class="tab-content">
                <div id="company" class="tab-pane fade in {{$activeuser==='company' ? 'active' : ''}}">
                    <span class="green-text">Для руководителей юридических компаний. В этот аккаунт вы сможете добавлять сотрудников, которые от имени компании будут консультировать клиентов.</span>
                    <h4>Ваш новый аккаунт</h4>
                    <form method="POST" action="{{ route('user.register.submit', ['usertype'=>'company'])}}">
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="surname"><i class="fa fa-address-book-o" aria-hidden="true"></i> Фамилия</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="surname" placeholder="Введите вашу фамилию">
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="name" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="email" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" id="password" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Введите заново новую пароль">
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="company-name"><i class="fa fa-building-o" aria-hidden="true"></i> Название компании</label>
                             @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="company-name" placeholder="Введите имя вашего компанию">
                        </div>
                        <span class="green-text">Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href="#">Пользовательского соглашени</a> и условия <a href="#">Политики конфиденциальности</a>.</span>
                        <div class="clearfix"></div>
                        
                        <button type="submit" class="btn btn-primary pull-right green-button register">Зарегистрироваться</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            <div id="lawyer" class="tab-pane fade in {{$activeuser==='lawyer' ? 'active' : ''}}">
                    <span class="green-text">Для специалистов в области права. Вы сможете оказывать клиентам все виды юридических услуг, доступных на сайте.</span>
                    <h4>Ваш новый аккаунт</h4>
                    <form method="POST" action="{{ route('user.register.submit', ['usertype'=>'lawyer'])}}">
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="surname"><i class="fa fa-address-book-o" aria-hidden="true"></i> Фамилия</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="surname" placeholder="Введите вашу фамилию">
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="name" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="email" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" id="password" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Введите заново новую пароль">
                        </div>
                        <span class="green-text">Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href="#">Пользовательского соглашени</a> и условия <a href="#">Политики конфиденциальности</a>.</span>
                        <div class="clearfix"></div>
                                                <button type="submit" class="btn btn-primary pull-right green-button register">Зарегистрироваться</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div id="client" class="tab-pane fade in {{$activeuser==='client' ? 'active' : ''}}">
                    <span class="green-text">Выбирайте этот тип аккаунта, если вам нужна юридическая помощь.</span>
                    <h4>Ваш новый аккаунт</h4>
                    <form method="POST" action="{{ route('user.register.submit', ['usertype'=>'client'])}}">
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="name" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="email" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" id="password" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Введите заново новую пароль">
                        </div>
                        <span class="green-text">Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href="#">Пользовательского соглашени</a> и условия <a href="#">Политики конфиденциальности</a>.</span>
                        <div class="clearfix"></div>
                                                <button type="submit" class="btn btn-primary pull-right green-button register">Зарегистрироваться</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Login Form -->
@endsection
@endsection