@extends('layouts.app-admin')

@section('content')
	{{Form::model($city, ['route' => ['admin.city.update', $city->id], 'method' => 'post'])}}
        {{csrf_field()}}
		{{Form::label('name', 'Title: ')}}
		{{Form::text('name', null, ['class'=>'form-control'])}}
		{{Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
	{{Form::close()}}
@endsection