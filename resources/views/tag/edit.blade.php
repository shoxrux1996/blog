@extends('layouts.app-admin')



@section('content')
	{{Form::model($tag, ['route' => ['admin.tag.update', $tag->id], 'method' => 'PUT'])}}
		{{Form::label('name', 'Title: ')}}
		{{Form::text('name', null, ['class'=>'form-control'])}}
		{{Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
	{{Form::close()}}
@endsection