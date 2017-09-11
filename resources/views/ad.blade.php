@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/ad.css')}}" rel="stylesheet">
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
                    <h3>Hamidulla Ziyoev</h3>
                    <span>Директор по развитию</span>
                    <p><b>Эл. почта:</b> hamidulla@yuridik.uz</p>
                    <p><b>Телефон:</b> +(97) 765-43-21</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->
@endsection