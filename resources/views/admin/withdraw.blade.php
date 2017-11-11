@extends('layouts.app-admin')
@section('styles')
    <link href="{{asset('dist/css/homepage.css')}}" rel="stylesheet">
    <style>
        .large-size{
            font-family: Calibri;
            font-size: 20px;
        }
    </style>
@endsection
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Админ панель</a></li>
        <li class="active">Запросы на оплату</li>
    </ol>
    <div class="container-fluid" style="height: 100%">
        <div class="row">
            <div class="col-sm-6">
                <h3>Запросы на оплату</h3>
            </div>

        </div>
        <div class="row moderator-list">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-xs-2">Имя</th>
                        <th class="col-xs-2">Майл</th>
                        <th class="col-xs-2">Номер карты</th>
                        <th class="col-xs-1">Срок</th>
                        <th class="col-xs-2">Сумма (сум)</th>
                        <th class="col-xs-2">Дата</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <th >{{$withdraw->id}}</th>
                            <th>{{$withdraw->user->firstName}} {{$withdraw->user->lastName}}</th>
                            <th>{{$withdraw->user->lawyer->email}}</th>
                            <th class="large-size"><input value="{{$withdraw->user->card_number}}" disabled></th>
                            <th class="large-size"><input value="{{$withdraw->user->expire_date}}" disabled style="width: 60px;"></th>
                            <th class="large-size">{{number_format($withdraw->amount,2)}}</th>
                            <th>{{$withdraw->created_at}}</th>
                           <th>
                                <a onclick="return confirm('Вы уверены?');" class="btn btn-xs btn-primary"
                                   href="{{route('admin.withdraw.submit', $withdraw->id)}}" type="submit">Снять денги</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-12">
                    {!! $withdraws->links('pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
