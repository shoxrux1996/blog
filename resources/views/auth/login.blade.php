@extends('layouts.app')
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                                 @if (Session::has('message'))
                                 <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                @if (Session::has('error-message'))
                                 <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                <div class="panel-heading">User Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ ($errors->has('email') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('password') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @elseif ($errors->has('wrong-attempt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('user.password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Login Form -->
<div class="container">
    <div class="row" id="login-bg">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <h1>Вход на Yuridik.uz</h1>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menu1">Войты</a></li>
                <li><a href="{{ route('user.register')}}">Регистрация</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <h4>Ваш аккаунт</h4>
                    <form id="login-form">
                        {{ csrf_field() }}
                        <div class="form-group{{ ($errors->has('email') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-user-circle" aria-hidden="true"></i> Эл. почта</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="username" name="email" placeholder="Введите электронную почту" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group{{ ($errors->has('password') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @elseif ($errors->has('wrong-attempt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                </span>
                            @endif
                            <input type="password"  class="form-control" id="password" name="password" placeholder="Введите пароль" required>
                        </div>
                        <a href="{{ route('user.password.request') }}">Забыли пароль?</a>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value=""> Запомнить меня</label>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right green-button">Войты</button>
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