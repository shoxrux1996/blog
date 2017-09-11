@extends('layouts.app-admin')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Админ панель</a></li>
        <li class="active">Модераторы</li>
    </ol>
    <div class="container-fluid" style="height: 100%">
        <div class="row">
            <div class="col-sm-6">
                <h3>Модераторы</h3>
            </div>
            <div class="col-sm-6 text-right">
                <h3>
                    <a href="{{route('admin.moderator.create')}}" type="button" class="btn btn-success">Добавить
                        модераторов</a>
                </h3>
            </div>
        </div>
        <div class="row moderator-list">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Почта</th>
                        <th>Имя</th>
                        <th>Удалить</th>
                        <th>Изменить</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($moderators as $moderator)
                        <tr>
                            <th>{{$moderator->email}}</th>
                            <th>{{$moderator->name}}</th>
                            <th>
                                <a onclick="return confirm('Вы уверены?');"
                                   href="{{route('admin.moderator.delete', $moderator->id)}}" type="submit"><i
                                            class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i></a>
                            </th>
                            <th>
                                <a href="{{route('admin.moderator.edit', $moderator->id)}}" type="submit"><i
                                            class="fa fa-pencil" data-toggle="tooltip" title="Изменить"></i></a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection