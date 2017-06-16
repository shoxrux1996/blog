@extends('layouts.app-admin')

@section('title', "| Insert Tag ")


@section('content')
	{{Form::open(['route' => ['admin.tag.insert.submit'], 'method' => 'POST'])}}
		{{Form::label('name', 'Title: ')}}
		{{Form::text('name', null, ['class'=>'form-control'])}}
		{{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
	{{Form::close()}}
@endsection