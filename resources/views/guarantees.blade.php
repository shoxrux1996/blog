@extends('layouts.app')
@section('styles')
    <link href="{{asset('dist/css/guarantees.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li class="active-link"><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')



<!-- Guarantees page -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="client-protection">
                <h4><i class="fa fa-shield"></i> Политика защиты клиентов Yuridik.uz</h4>
                <p>Yuridik.uz предоставляет своим клиентам широкие гарантии качества, конфиденциальности и безопасности. На нашем сайте вы можете получить юридическую помощь по всем отраслям права, не беспокоясь о репутации юристов, безопасности платежей и ваших персональных данных - мы уже сделали все это за вас.</p>
            </div>
            <div class="best-of-the-best">
                <h4><i class="fa fa-star"></i> Лучшие из лучших</h4>
                <p>Наш сервис объединяет лучших специалистов со всей России, чтобы качественная юридическая консультация была доступна для вас в любое время.</p>
                <p>Все консультирующие юристы прошли процедуру подтверждения высшего образования и опыта работы.</p>
            </div>
            <div class="row flex-row">
                <div class="col-sm-6">
                    <div class="money-back">
                        <h4><i class="fa fa-money"></i> Возврат денег</h4>
                        <p>Если вы считаете, что юрист не помог вам, мы вернем вам деньги. Просто напишите нам об этом в течение 30 дней.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="confidentiality">
                        <h4><i class="fa fa-lock"></i> Конфиденциальность</h4>
                        <p>Мы ценим ваше доверие. Данные, указанные при регистрации и в процессе работы с сервисом, не публикуются в открытом доступе.</p>
                        <p>Контактные данные, включая номер телефона, могут быть доступны нашим юристам для уточнения деталей или оказания консультаций.</p>
                    </div>
                </div>
            </div>
            <div class="believe-us">
                <h2>Доверьте нам решение проблем!</h2>
                <button type="button" class="btn btn-success pulse-button">Задать вопрос юристу</button>
            </div>
            <div class="row flex-row">
                <div class="col-sm-6">
                    <div class="support">
                        <h4><i class="fa fa-life-ring"></i> Поддержка</h4>
                        <p>Если у вас возникли вопросы по работе с нашим сервисом, то мы с радостью поможем вам во всем разобраться. Просто<a href="#">напишите нам</a>.</p>
                        <p>Обратите, пожалуйста, внимание, что служба технической поддержки не оказывает консультаций по юридическим вопросам.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="dear-friends">
                        <h4><i class="fa fa-users"></i> Дорогие друзья,</h4>
                        <p>Мы делаем все, чтобы качество наших услуг было на самом высоком уровне, а вы чувствовали, что в любой момент вам есть к кому обратиться.
                            <a href="#">Напишите мне</a>, поделитесь своим мнением о работе сервиса и идеями по его улучшению. Мы ценим ваш выбор и гордимся оказанным нам доверием.</p>
                        <p>С уважением,
                            руководитель Yuridik.uz</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Guarantees page -->
@endsection