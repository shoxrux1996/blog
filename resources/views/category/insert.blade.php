@extends('layouts.app')

@section('title', "| Insert Category ")


@section('content')
    {{Form::open(['route' => ['category.insert.submit'], 'method' => 'POST'])}}
        {{Form::label('name', 'Name: ')}}
        {{Form::text('name', null, ['class'=>'form-control'])}}
        {{Form::label('parent', 'Parent: ')}}
        {{Form::select('parent', $categories,null , ['class'=>'form-control'])}}
        {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
    {{Form::close()}}
@endsection