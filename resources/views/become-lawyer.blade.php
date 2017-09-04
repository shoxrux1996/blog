@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/become-lawyer.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">@lang('become-lawyer.Главная')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('become-lawyer.Юристы')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('become-lawyer.Вопросы')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('become-lawyer.Блог')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('become-lawyer.Как это работает')</a></li>
    <li><a href="{{ route('about')}}">@lang('become-lawyer.О нас')</a></li>
@endsection
@section('content')

<!-- Content -->
<div class="container-fluid" id="are-you-lawyer">
    <div class="row">
        <div class="col-sm-8">
            <span class="big-text">
                @lang('become-lawyer.Вы — юрист?')
            </span>
            <h1 class="text-primary">@lang('become-lawyer.Нам нужны лучшие из лучших!')</h1>
            <p>Yuridik.uz — @lang('become-lawyer.это сервис юридических консультаций онлайн, которым пользуются более 300 000 человек!')</p>
            <p><a href="{{ route('user.register') }}">@lang('become-lawyer.Станьте нашим экспертом')</a>, @lang('become-lawyer.чтобы оценить преимущества дистанционной работы.')</p>
        </div>
    </div>
</div>
<div class="container-fluid" id="online-consultion">
    <div class="row text-center">
        <h3>@lang('become-lawyer.Оказание консультаций онлайн — это:')</h3>
        <div class="col-sm-4">
            <i class="fa fa-money text-primary"></i>
            <h6>
                <b>@lang('become-lawyer.Дополнительный заработок в удобное вам время из любой точки мира')</b>
            </h6>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-users text-danger"></i>
            <h6>
                <b>@lang('become-lawyer.Возможность найти новых клиентов и заработать хорошую репутацию')</b>
            </h6>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-handshake-o text-success"></i>
            <h6>
                <b>@lang('become-lawyer.Постоянное развитие, решение интересных профессиональных задач и обмен опытом')</b>
            </h6>
        </div>
    </div>
</div>
<div class="container-fluid" id="innovational">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="text-center">@lang('become-lawyer.Инновационный сервис оказания услуг')</h1>
            <span class="big-text text-primary">Yuridik.uz</span>
            <br />
            <h4><i class="fa fa-check-square-o text-primary"></i> @lang('become-lawyer.2 года успешной работы')</h4>
            <h4><i class="fa fa-check-square-o text-primary"></i> @lang('become-lawyer.3503 практикующих юриста')</h4>
            <h4><i class="fa fa-check-square-o text-primary"></i> @lang('become-lawyer.1857 реальных клиентов в день')</h4>
        </div>
        <div class="col-sm-6">
            <img class="img-responsive" alt="Innovation" src="dist/images/MacBook%20Pro%202016.png" />
        </div>
    </div>
</div>
<div class="container-fluid" id="how-it-works">
    <div class="row text-center">
        <h3>@lang('become-lawyer.Как это работает?')</h3>
        <div class="col-sm-4">
            <span class="label label-success">1</span>
            <p>@lang('become-lawyer.Зарегистрируйтесь на проекте в качестве юриста и подтвердите свое образование.')</p>
        </div>
        <div class="col-sm-4">
            <span class="label label-primary">2</span>
            <p>@lang('become-lawyer.Общайтесь с клиентами онлайн и оказывайте услуги прямо на сайте!')</p>
        </div>
        <div class="col-sm-4">
            <span class="label label-danger">3</span>
            <p>@lang('become-lawyer.Получайте достойный гонорар и отзывы от благодарных клиентов!')</p>
        </div>
    </div>
    <div class="text-center">
        <a type="button" class="btn btn-default btn-success pulse-button btn-lg">@lang('become-lawyer.Стать экспертом')</a>
    </div> 
</div>
<!-- /Content -->
@endsection