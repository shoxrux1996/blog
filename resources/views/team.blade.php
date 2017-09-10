@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/team.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">@lang('team.Главная')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('team.Юристы')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('team.Вопросы')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('team.Блог')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('team.Как это работает')</a></li>
    <li><a href="{{ route('about')}}">@lang('team.О нас')</a></li>
@endsection
@section('content')

<!-- Content -->
<div id="wrapper"></div>
<div class="container" id="mission">
    <div class="row">
        <h3 class="text-center text-success">О YURIDIK.UZ И ЛЮДЯХ, КОТОРЫЕ ЕГО СОЗДАЮТ</h3>
        <p>@lang('team.Yuridik.uz — это крупнейший узбекский интернет сервис по оказанию юридических услуг в режиме онлайн. Сегодня аудитория нашего проекта — это сотни тысяч людей из разных уголков Узбекистана. В основе Yuridik.uz лежит идея о том, что около 70% всех юридических услуг могут быть оказаны удаленно, онлайн, без посещения офиса юриста.')</p>
        <p>@lang('team.Мы делаем Yuridik.uz, чтобы навсегда изменить ваше представление о том, как можно взаимодействовать с юристами, консультироваться, готовить документы, получать эффективную юридическую защиту.')</p>
        <a href="#">@lang('team.Посмотрите видео как работает Yuridik.uz.')</a>
        <p>@lang('team.Yuridik.uz создают увлеченные талантливые люди, которые являются самой большей ценностью нашей компании. Это инженеры в сфере программного обеспечения, разработчики баз данных, проектировщики веб-интерфейсов, дизайнеры, интернет-маркетологи, юристы. Большая часть нашей команды (а пока это 18 человек) находится в Санкт-Петербурге. Несколько человек работают и в других городах: Москве, Новосибирске, Нью-Йорке.')</p>
        <div class="row">
            <div class="col-sm-6">
                <div class="text-center text-success">
                    <i class="fa fa-bullseye"></i>
                    <h3 class="text-success">@lang('team.МИССИЯ')</h3>
                </div>
                <p>@lang('team.Миссия Yuridik.uz — сделать юридические услуги в Узбекистана по-настоящему доступными и инновационными.')</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-check-square-o text-primary"></i> @lang('team.Мы считаем, что юридическая помощь должна быть доступна для всех, в независимости от ситуации.)')</li>
                    <li><i class="fa fa-check-square-o text-primary"></i> @lang('team.Мы стремимся предоставить людям возможность быть свободными в вопросах защиты своих прав.')</li>
                    <li><i class="fa fa-check-square-o text-primary"></i> @lang('team.Мы помогаем найти людей, которые могут оказать компетентную юридическую помощь.')</li>
                    <li><i class="fa fa-check-square-o text-primary"></i> @lang('team.Мы внедряем в отрасль юридических услуг новые технологии;')</li>
                    <li><i class="fa fa-check-square-o text-primary"></i> @lang('team.Мы вносим свою лепту в формирование гражданского общества в Узбекистан.')</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="text-center text-success">
                    <i class="fa fa-superpowers"></i>
                    <h3 class="text-success">@lang('team.ПРИНЦИПЫ')</h3>
                </div>
                <p>@lang('team.Yuridik.uz — это коммерческое предприятие. Тем не менее, мы придерживаемся ряда принципов, соблюдение, которых отодвигает на второй план даже вопросы прибыли')</p>
                <p><span class="text-success"><b>@lang('team.КАЧЕСТВО:')</b></span> @lang('team.для оказания юридических услуг мы привлекаем только проверенных и опытных специалистов')</p>
                <p><span class="text-success"><b>@lang('team.ДОСТУПНОСТЬ:')</b></span> @lang('team.юристы работают по всей стране, в разных часовых поясах и готовы оказать помощь в любое время суток')</p>
                <p><span class="text-success"><b>@lang('team.СВОБОДА:')</b></span>  @lang('team.мы за честное общение между клиентами и юристами, за право клиента самому выбирать юриста нужной квалификации, а юриста —самостоятельно устанавливать размер гонорара')</p>
                <p><span class="text-success"><b>@lang('team.СОВЕРШЕНСТВО:')</b></span>  @lang('team.мы не останавливаемся на достигнутом и делаем все, чтобы наши услуги были оказаны на самом высоком уровне')</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="work">
    <div class="row">
        <h3 class="text-success">@lang('team.РАБОТА В Yuridik.uz')</h3>
        <h4 class="text-danger">@lang('team.Кого мы ищем в свою команду?')</h4>
        <p>@lang('team.Мы постоянно развиваемся и ищем талантливых людей.')</p>
        <p>@lang('team.В нашей компании мы стараемся поддерживать баланс между атмосферой стартапа и умудренной опытом корпорации. Мы убеждены, что создаем лучший интернет-сервис в Узбекистана в сфере юридических онлайн-услуг, который изменит жизнь многих людей к лучшему.')</p>
        <p>@lang('team.Мы хотим быстро меняться, успешно развивать и укреплять проект.')</p>
        <p>@lang('team.Если вы разделяете такой взгляд на жизнь, то переходите на нашу сторону!')</p>
    </div>
    <div class="row">
        <h4 class="text-danger">@lang('team.Наши преимущества')</h4>
        <p>@lang('team.Работа в Yuridik.uz даст вам возможность решать увлекательные и сложные задачи. Вместе мы будем создавать продукт, которым будут пользоваться миллионы людей по всей Узбекистана.')</p>
        <p>@lang('team.Кроме этого, есть много других преимуществ, включая:')</p>
        <ul class="list-unstyled">
            <li><i class="fa fa-check-square"></i> @lang('team.нужные для работы книги и журналы')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.оплата необходимых конференций, курсов, семинаров')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.возмещение 50% расходов на посещение спортивного зала')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.мы купим для вас любое необходимое для работы оборудование и софт')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.гибкая и справедливая политика предоставления оплачиваемых отпусков')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.офис в десяти минутах ходьбы от станции метро “Московские ворота”')</li>
            <li><i class="fa fa-check-square"></i> @lang('team.ну и стандартный набор: зерновой кофе, чай, печенье, пятничные пиццы')</li>
        </ul>
        <h6 class="text-danger"><b>@lang('team.ОСТАЛИСЬ ВОПРОСЫ О РАБОТЕ В Yuridik.uz?')</b> <button type="button" class="btn btn-default btn-primary">@lang('team.Напишите нам')</button> </h6>
    </div>
</div>

<div class="container-fluid" id="vacancy">
    <div class="row text-center">
        <div class="col-sm-6">
            <h3 class="text-danger">@lang('team.Хотите работу мечты?')</h3>
            <h6 class="text-danger"><b>@lang('team.Смотрите наши вакансии')</b></h6>
            <button type="button" class="btn btn-default btn-success pulse-button">@lang('team.Посмотреть вакансии')</button>
        </div>
    </div>
</div>
<!-- /Content -->
@endsection