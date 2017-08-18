@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/become-lawyer.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li class="active-link"><a href="{{ route('home')}}">@lang('index.home')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('index.lawyers')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('index.questions')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('index.blog')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('index.howworks')</a></li>
    <li><a href="{{ route('about')}}">@lang('index.aboutus')</a></li>
@endsection
@section('content')

<!-- Content -->
<div class="container-fluid" id="are-you-lawyer">
    <div class="row">
        <div class="col-sm-8">
            <span class="big-text">
                Вы — юрист?
            </span>
            <h1 class="text-primary">Нам нужны лучшие из лучших!</h1>
            <p>Правовед.RU — это сервис юридических консультаций онлайн, которым пользуются более 300 000 человек!</p>
            <p><a href="register.html">Станьте нашим экспертом</a>, чтобы оценить преимущества дистанционной работы.</p>
        </div>
    </div>
</div>
<div class="container-fluid" id="online-consultion">
    <div class="row text-center">
        <h3>Оказание консультаций онлайн — это:</h3>
        <div class="col-sm-4">
            <i class="fa fa-money text-primary"></i>
            <h6>
                <b>Дополнительный заработок
                    в удобное вам время из любой
                    точки мира</b>
            </h6>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-users text-danger"></i>
            <h6>
                <b>Возможность найти новых
                    клиентов и заработать хорошую
                    репутацию</b>
            </h6>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-handshake-o text-success"></i>
            <h6>
                <b>Постоянное развитие, решение
                    интересных профессиональных
                    задач и обмен опытом</b>
            </h6>
        </div>
    </div>
</div>
<div class="container-fluid" id="innovational">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="text-center">Инновационный сервис оказания услуг</h1>
            <span class="big-text text-primary">Правовед.RU</span>
            <br />
            <h4><i class="fa fa-check-square-o text-primary"></i> 2 года успешной работы</h4>
            <h4><i class="fa fa-check-square-o text-primary"></i> 3503 практикующих юриста</h4>
            <h4><i class="fa fa-check-square-o text-primary"></i> 1857 реальных клиентов в день</h4>
        </div>
        <div class="col-sm-6">
            <img class="img-responsive" alt="Innovation" src="dist/images/MacBook%20Pro%202016.png" />
        </div>
    </div>
</div>
<div class="container-fluid" id="how-it-works">
    <div class="row text-center">
        <h3>Как это работает?</h3>
        <div class="col-sm-4">
            <span class="label label-success">1</span>
            <p>Зарегистрируйтесь на проекте
                в качестве юриста и подтвердите
                свое образование.</p>
        </div>
        <div class="col-sm-4">
            <span class="label label-primary">2</span>
            <p>
                Общайтесь с клиентами онлайн
                и оказывайте услуги
                прямо на сайте!
            </p>
        </div>
        <div class="col-sm-4">
            <span class="label label-danger">3</span>
            <p>
                Получайте достойный гонорар
                и отзывы от благодарных
                клиентов!
            </p>
        </div>
    </div>
    <button type="button" class="btn btn-default btn-success pulse-button center-block btn-lg">Стать экспертом</button>
</div>
<!-- /Content -->
@endsection