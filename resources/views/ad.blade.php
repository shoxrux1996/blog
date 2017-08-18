@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/ad.css')}}" rel="stylesheet">
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
<div id="wrapper">
    <div class="container background-white padding-30">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-primary">Рекламодателям</h3>
                <p>Правовед.ru — один из крупнейших сервисов по оказанию юридических услуг онлайн. Сайт ежемесячно посещают более 2 500 000 человек. Размещение рекламы на нашем сайте — это отличная возможность найти новых клиентов и вывести свой бизнес на новый уровень!</p>
                <p><a href="#">Скачать Media Kit Правовед.ru</a></p>
                <p><a href="#">Скачать прайс-лист</a></p>
                <p><a href="#">Посмотреть доступные рекламные места</a></p>
                <br />
                <h6><b>По вопросам размещения рекламы обращайтесь:</b></h6>
                <div class="col-sm-3 card">
                    <h3>Сергей Андреев</h3>
                    <span>Директор по развитию</span>
                    <p><b>Эл. почта:</b> andreev@pravoved.ru</p>
                    <p><b>Телефон:</b> +7 (921) 999-70-54</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->
@endsection