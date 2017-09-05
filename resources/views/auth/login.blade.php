@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/login-regis.css')}}" rel="stylesheet">
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">@lang('login.Главная')</a></li>
  <li><a href="{{ route('lawyers.list')}}">@lang('login.Юристы')</a></li>
  <li><a href="{{ route('question.list')}}">@lang('login.Вопросы')</a></li>
  <li><a href="{{ route('web.blogs')}}">@lang('login.Блог')</a></li>
  <li><a href="{{ route('how-works')}}">@lang('login.Как это работает')</a></li>
  <li><a href="{{ route('about')}}">@lang('login.О нас')</a></li>
@endsection
@section('content')

<!-- Modal for message-->
    <div id="confirm-email-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('login.modaltitle')</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/email-send.png')}}" alt="Email send"/>
                    <h4>@lang('login.modalbody1')</h4>
                    @if(Session::has('question-create'))
                        <h6>@lang('login.modalbody2')</h6>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('login.close')</button>
                </div>
            </div>

        </div>
    </div>
<!-- /Modal for message-->

<!-- Login Form -->
<div class="container">
    <div class="row" id="login-bg">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <h1>@lang('login.Вход на Yuridik.uz')</h1>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menu1">@lang('login.Войти')</a></li>
                <li><a href="{{ route('user.register')}}">@lang('login.Регистрация')</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <h4>@lang('login.Ваш аккаунт')</h4>
                    <form id="login-form" role="form" method="POST" action="{{ route('user.login.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ ($errors->has('email') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-user-circle" aria-hidden="true"></i> @lang('login.Эл. почта')</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control" id="email" name="email" placeholder="{{ __('login.Введите электронную почту') }}" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group{{ ($errors->has('password') || $errors->has('wrong-attempt')) ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> @lang('login.Пароль')</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @elseif ($errors->has('wrong-attempt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                </span>
                            @endif
                            <input type="password"  class="form-control" id="password" name="password" placeholder="{{ __('login.Введите пароль') }}" required>
                        </div>
                        <a href="{{ route('user.password.request') }}">@lang('login.Забыли пароль?')</a>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value=""> @lang('login.Запомнить меня')</label>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right green-button">@lang('login.Войти')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Login Form -->

@endsection
@if(Session::has('confirm-email') || Session::has('question-create'))
    @section('scripts')
        <script type="text/javascript">
            $("#confirm-email-modal").modal();
        </script>
    @endsection
@endif