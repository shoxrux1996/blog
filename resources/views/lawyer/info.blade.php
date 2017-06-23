@extends('layouts.app')

@section('content')
    <div class="container">
        {{Form::model($client, ['route' => ['lawyer.update', $lawyer->id], 'enctype' => 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal'])}}
        <div class="form-group">
            {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('email', $lawyer->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('firstName', $lawyer->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Last Name: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::text('lastName', $lawyer->user->lastName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Gender: ', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-6">
                {{Form::label('Male', 'Male: ', ['class' => 'col-sm-2'])}} {{Form::radio('gender', 'M')}}
            </div>
            <div class="col-sm-6">
                {{Form::label('Female', 'Female: ', ['class' => 'col-sm-2'])}} {{Form::radio('gender', 'F')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::date('dateOfBirth', $lawyer->user->dateOfBirth, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                {{Form::select('city', $cities, $client->user->city_id, ['class'=>'form-control'])}}
            </div>
        </div>


        <div class="form-group">
            @if ($errors->has('image'))
                <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
            @endif
            <img src="{!!asset('clients/photo/' . $lawyer->user->photo)!!}" alt="..." class="img-thumbnail" style="width: 100px;">
            {{Form::label('image', 'Photo: ', ['class' => 'col-sm-1 control-labe'])}}
            <div class="col-sm-8">
                <input class = "image" type="file" name="image" />

            </div>
        </div>

        {{Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
        {{Form::close()}}

    </div>
@endsection
