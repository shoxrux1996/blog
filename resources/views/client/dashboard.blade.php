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
                        <li>Заказать услугу</li>
                        <ul>
                            <li><a href="{{ route('question.create') }}">Задать вопрос</a></li>
                            
                        </ul>

                        <li><a href="{{ route('search.lawyers') }}">Наши юристы</a></li>
                        <li><a href="#">Активные заявки</a></li>
                        <ul>
                            <li><a href="{{ route('question.list') }}">Вопросы</a></li>
                            
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
