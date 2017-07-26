@extends('layouts.app')
@section('body')
@extends('layouts.body')
@section('menu')
  <li class="active-link"><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
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
                        <li><a href="{{route('web.blogs')}}">Блоги</a></li>

                        <ul>
                            <li><a href="{{ route('question.create') }}">Задать вопрос</a></li>
                            <li><a href="{{ route('document.create') }}">Заказать документ</a></li>
                            
                        </ul>

                        <li><a href="{{ route('lawyers.list') }}">Наши юристы</a></li>
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
@endsection
