@extends('layouts.app')

@section('title', "| Insert Category ")


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
        @if (Auth::guard('client')->check())
        <?php $client = Auth::guard('client')->user();  ?>
    
            {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-label'])}}
               
            {{Form::text('email', $client->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
             
         
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
                
            {{Form::text('firstName', $client->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
        @endif
        {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
    {{Form::close()}}
@endsection