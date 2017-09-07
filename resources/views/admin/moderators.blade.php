@extends('layouts.app-admin')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Админ панель</a></li>
        <li class="active">Модераторы</li>
    </ol>
    <div class="container-fluid" style="height: 100%">
        <div class="row">
            <div class="col-sm-6">
                <h3>Модераторы</h3>
            </div>
            <div class="col-sm-6 text-right">
                <h3><button type="button" class="btn btn-success">Добавить модераторов</button></h3>
            </div>
        </div>
        <div class="row moderator-list">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Действии</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Улугбек</th>
                            <th>Самигжонов</th>
                            <th>
                                <a href="#">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Улугбек</th>
                            <th>Самигжонов</th>
                            <th>
                                <a href="#">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Улугбек</th>
                            <th>Самигжонов</th>
                            <th>
                                <a href="#">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Улугбек</th>
                            <th>Самигжонов</th>
                            <th>
                                <a href="#">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Улугбек</th>
                            <th>Самигжонов</th>
                            <th>
                                <a href="#">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="Удалить"></i>
                                </a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection