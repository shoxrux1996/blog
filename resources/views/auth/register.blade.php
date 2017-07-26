@extends('layouts.app')
@section('styles')
   <link href="{{asset('dist/css/login-regis.css')}}" rel="stylesheet">
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
                        <div class="form-group{{ $errors->has('company.leadersurname') ? ' has-error' : '' }}">
                            <label for="surname"><i class="fa fa-address-book-o" aria-hidden="true"></i> Фамилия</label>
                            @if ($errors->has('company.leadersurname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company.leadersurname') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="company[leadersurname]" placeholder="Введите вашу фамилию">
                        </div>
                        <div class="form-group{{ $errors->has('company.leadername') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('company.leadername'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company.leadername') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="company[leadername]" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('company.email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('company.email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company.email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="company[email]" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('company.password') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('company.password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company.password') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" name="company[password]" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" name="company[password-confirm]" placeholder="Введите заново новую пароль">
                        </div>
                        <div class="form-group{{ $errors->has('company.name') ? ' has-error' : '' }}">
                            <label for="company-name"><i class="fa fa-building-o" aria-hidden="true"></i> Название компании</label>
                             @if ($errors->has('company.name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company.name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="company[name]" placeholder="Введите имя вашего компанию">
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
                        <div class="form-group{{ $errors->has('lawyer.surname') ? ' has-error' : '' }}">
                            <label for="surname"><i class="fa fa-address-book-o" aria-hidden="true"></i> Фамилия</label>
                            @if ($errors->has('lawyer.surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lawyer.surname') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="lawyer[surname]" placeholder="Введите вашу фамилию">
                        </div>
                        <div class="form-group{{ $errors->has('lawyer.name') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('lawyer.name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lawyer.name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="lawyer[name]" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('lawyer.email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('lawyer.email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lawyer.email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="lawyer[email]" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('lawyer.password') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('lawyer.password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lawyer.password') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" name="lawyer[password]" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" name="lawyer[password-confirm]" placeholder="Введите заново новую пароль">
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
                        <div class="form-group{{ $errors->has('client.name') ? ' has-error' : '' }}">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('client.name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client.name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="client[name]" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group{{ $errors->has('client.email') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('client.email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client.email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" name="client[email]" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group{{ $errors->has('client.password') || $errors->has('client.password_confirm') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            @if ($errors->has('client.password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client.password') }}</strong>
                                </span>
                            @endif
                            @if ($errors->has('client.password_confirm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client.password_confirm') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control" name="client[password]" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" name="client[password_confirm]" placeholder="Введите заново новую пароль">
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