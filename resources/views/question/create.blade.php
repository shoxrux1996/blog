@extends('layouts.app')

@section('title', "| Insert Category ")

@if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
@section('content')
    {{Form::open(['route' => ['question.insert.submit'], 'enctype' => 'multipart/form-data', 'method' => 'POST'])}}
    	{{Form::label('category', 'Category: ')}}
        {{Form::select('category', $categories, null , ['class'=>'form-control'])}}
        {{Form::label('title', 'Your question: ')}}
        {{Form::text('title', null, ['class'=>'form-control']) }}
        {{Form::label('text', 'Text: ')}}
        {{Form::textarea('text', null, ['class'=>'form-control field']) }}

        <!-- {{Form::file('files[]', ['multiple' => 'multiple'])}} -->
        <input type="file" name="files[]" multiple ="multiple" />    
            {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-label'])}}
               
            {{Form::text('email', $client->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
             
         
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
                
            {{Form::text('firstName', $client->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            <br>
            {{Form::label('type', 'VIP ')}}
            {{Form::radio('type', 2, true)}}
            {{Form::label('type', 'Free ')}}
            {{Form::radio('type', 1)}}
            <br>
            {{Form::label('price', 'Price: ')}}
            {{Form::text('price', null, ['class' => 'form-control'])}}
        {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
    {{Form::close()}}
@endsection