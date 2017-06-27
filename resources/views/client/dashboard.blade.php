@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Client Dashboard</div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                        <a class="btn btn-info btn-sm col-md-offset-1" href="{{ route('client.info') }}">Info</a>
                    <ul>
                        <li><a href="#">Заказать услугу</a></li>
                        <ul>
                            <li><a href="{{ route('client.info') }}">Задать вопрос</a></li>
                            <li><a href="{{ route('client.info') }}">Заказать документ</a></li>
                            <li><a href="{{ route('client.info') }}">Заказать звонок</a></li>
                        </ul>

                        <li><a href="{{ route('client.info') }}">Наши юристы</a></li>
                        <li><a href="#">Активные заявки</a></li>
                        <ul>
                            <li><a href="{{ route('client.info') }}">Вопросы</a></li>
                            <li><a href="{{ route('client.info') }}">Консультация по телефону</a></li>
                        </ul>
                    </ul>
                    <div class="panel-body">
                        @component('components.who')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
