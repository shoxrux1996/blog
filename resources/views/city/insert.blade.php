@extends('layouts.app-admin')

@section('content')
	{{Form::open(['route' => ['admin.city.insert.submit'], 'method' => 'POST'])}}
		{{Form::label('name', 'Title: ')}}
		{{Form::text('name', null, ['class'=>'form-control'])}}
		{{Form::submit('Сохранить', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
	{{Form::close()}}
@endsection