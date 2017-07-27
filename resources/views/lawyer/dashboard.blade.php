@extends('layouts.app')

@section('body')
@extends('layouts.body')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lawyer Dashboard</div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <ul class="btn btn-default">
                    <li><a href="{{ route('lawyer.info') }}">Info</a></li>
                    <li><a href="{{ route('lawyer.blog.insert') }}">Написать блок</a></li>
                    <li><a href="{{route('question.list')}}">Вопросы</a></li>
                    <li><a href="{{route('web.blogs')}}">Блоги</a></li>

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
