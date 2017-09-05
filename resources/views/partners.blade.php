@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/partners.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">@lang('Главная')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('Юристы')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('Вопросы')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('Блог')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('Как это работает')</a></li>
    <li><a href="{{ route('about')}}">@lang('О нас')</a></li>
@endsection
@section('content')

<!-- Content -->
<div id="wrapper">
    <div class="container background-white padding-30">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-success">@lang('ПАРТНЕРЫ')</h3>
                <h6><b>@lang('Хотите стать нашим партнером?')</b></h6>
                <p>@lang('Сервис юридических онлайн консультаций «Yuridik.uz» приглашает к партнерству компании, заинтересованные в совместном привлечении новых клиентов. Наша целевая аудитория – индивидуальные предприниматели, руководители малого и среднего бизнеса, юристы и юридические компании, а также физические лица, нуждающиеся в консультации специалиста.')</p>
                <a href="#" class="pull-right">@lang('Стать партнером') <i class="fa fa-arrow-circle-o-right"></i> </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h6><b>@lang('Генеральные партнеры')</b></h6>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
                <div class="col-sm-12 sponsors">
                    <img class="img-responsive img-thumbnail" alt="Partners" src="dist/images/mailru.png" />
                    <h5><b>Электронный бухгалтер «Эльба»</b></h5>
                    <a href="#">http://www.e-kontur.ru/</a>
                    <p>
                        Интернет-сервис для индивидуальных предпринимателей и организаций на УСН и ЕНВД. Эльба позволяет самостоятельно вести элементарный бухучет и сдавать отчетность во все контролирующие органы. Пользователям «Правовед.RU» предоставляется сертификат на 3 бесплатных месяца использования сервисом электронного бухгалтера при оплате любого тарифа «Эльбы» хотя бы на месяц. Для получения сертификата, пожалуйста, отправьте запрос на адрес:
                        
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <h6><b>Партнеры проекта</b></h6>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
            <div class="col-sm-2 project-partners">
                <a href="#">
                    <img class="img-thumbnail" src="dist/images/mailru.png" />
                </a>
            </div>
        </div>
        <a href="#" class="pull-right">Стать партнером <i class="fa fa-arrow-circle-o-right"></i> </a>
    </div>
</div>
<!-- /Content -->
@endsection