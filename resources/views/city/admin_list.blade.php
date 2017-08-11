@extends('layouts.app-admin')

@section('title', "| Города")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td> {{$city->id}}</td>
                        <td>{{$city->name}}</td>
                        <td><a href="{{route('admin.city.edit', $city->id)}}" class="btn btn-info btn-xs">Изменить</a></td>
                        <td><a onclick="return confirm('Вы уверены?');" href="{{route('admin.city.delete', $city->id)}}" class="btn btn-danger btn-xs">Удалить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <a href="{{route('admin.city.insert')}}" class="btn btn-default btn-sm">Добавить</a>
        </div>
    </div>
@endsection