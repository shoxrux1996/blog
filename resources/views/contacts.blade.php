@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/contacts.css')}}" rel="stylesheet">
@endsection

@section('content')


<div id="wrapper">
    <div class="container background-white" id="contacts">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-8 color-dark-blue">
                    <h3 class="text-primary">@lang('contacts.КОНТАКТЫ')</h3>
                    <p>@lang('contacts.Если у вас возникли вопросы, связанные с работой сайта, или есть предложения о сотрудничестве, вы всегда можете связаться с нами, используя контакты, указанные ниже.')</p>
                    <p><b><i class="fa fa-phone" aria-hidden="true"></i></b></p>
                    <p><b><i class="fa fa-envelope" aria-hidden="true"></i></b></p>
                    <p><b>@lang('contacts.ООО') «Yuridik.uz»</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <p><b><i class="fa fa-map-marker" aria-hidden="true"></i> @lang('contacts.Наш адрес')</b></p>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2995.6361361262757!2d69.3323413153006!3d41.33852497926874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x38aef48a8ed4d0e9%3A0x3772abeffc72e7b8!2z0KPQvdC40LLQtdGA0YHQuNGC0LXRgiDQmNC90YXQsCwgWml5b2xpbGFyIHN0ciA5LCBNaXJ6byBVbHVnYmVrIGRpc3RyaWN0LCDQotC-0YjQutC10L3Rgiwg0KPQt9Cx0LXQutC40YHRgtCw0L0!3m2!1d41.338525!2d69.33453!5e0!3m2!1sru!2sru!4v1499257170969" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container" id="tech-sup">
        <div class="row">
            <h4>@lang('contacts.ТЕХНИЧЕСКАЯ ПОДДЕРЖКА')</h4>
            <div class="support">
                <p>@lang('contacts.Здесь вы можете оставить свой вопрос, связанный с работой сайта.')</p>
                <p>@lang('contacts.Внимание!')<br />
                    @lang('contacts.Данные контакты НЕ предназначены для юридических консультаций. Если вы хотите задать вопрос юристам, воспользуйтесь формой подачи вопроса.')</p>
                <a type="button" class="btn btn-default btn-success">@lang('contacts.НАПИСАТЬ СООБЩЕНИЕ')</a>
            </div>
        </div>
    </div>
</div>
@endsection