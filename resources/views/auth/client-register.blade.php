@extends('layouts.app')
@section('styles')
   <link href="{{ asset('dist/css/login-regis.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="">Как это работает</a></li>
  <li><a href="">О нас</a></li>
@endsection
@section('content')

<!-- Login Form -->
<div class="container">
    <div class="row" id="register-bg">
        <div class="col-md-7 col-sm-10 col-xs-12">
            <h1>Регистрация на Yuridik.uz</h1>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="{{ route('user.register', ['user'=>'client'])}}">Клиент</a></li>
                <li><a data-toggle="tab" href="{{ route('user.register', ['user'=>'lawyer'])}}">Юрист</a></li>
                <li><a data-toggle="tab" href="{{ route('user.register', ['user'=>'company'])}}">Компания</a></li>
            </ul>

            <div class="tab-content">
                <div id="client" class="tab-pane fade in active">
                    <span class="green-text">Выбирайте этот тип аккаунта, если вам нужна юридическая помощь.</span>
                    <h4>Ваш новый аккаунт</h4>
                    <form>
                        <div class="form-group">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            <input type="text"  class="form-control" id="name" placeholder="Введите вашу имя">
                        </div>
                        <div class="form-group">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> Эл. почта</label>
                            <input type="text"  class="form-control" id="username" placeholder="Введите электронную почту">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Пароль </label>
                            <input type="password" class="form-control" id="password" placeholder="Введите новую пароль">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> Повторите пароль </label>
                            <input type="password" class="form-control" id="password-confirm" placeholder="Введите заново новую пароль">
                        </div>
                        <span class="green-text">Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href="#">Пользовательского соглашени</a> и условия <a href="#">Политики конфиденциальности</a>.</span>
                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-primary pull-right green-button register">Зарегистрироваться</button>
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