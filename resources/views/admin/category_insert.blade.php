@extends('layouts.app-admin')
@section('styles')

    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Категория</h2>
            </div>
            <div class="panel-body">
                {{Form::open(['route' =>['admin.category.insert.submit'], 'method' => 'POST'])}}
                {{ csrf_field() }}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <label>Name(uzb): </label>

                    {{Form::text('name',null, ['class'=>'form-control'])}}
                </div>
                @if ($errors->has('name_ru'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_ru') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <label>Name(ru): </label>

                    {{Form::text('name_ru',null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <label>Class name (fonts): </label>

                    {{Form::text('class',null, ['class'=>'form-control', 'placeholder'=>'fa-users'])}}
                    <a href="{{url('http://fontawesome.io/cheatsheet/')}}">list of icons</a>
                </div>

                <div class="form-group">
                    <label>Parent: </label>
                    {{Form::select('parent', $categories, null,['class' => 'form-control'])}}
                </div>
                @if ($errors->has('text'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                @endif
                <label>Text(uzb): </label>
                {{Form::textarea('text','',['class'=>'form-control'])}}
                @if ($errors->has('text_ru'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text_ru') }}</strong>
                                    </span>
                @endif
                <label>Text(ru): </label>
                {{Form::textarea('text_ru','',['class'=>'form-control'])}}
                <div class="form-group">
                    <div>
                        <input type='submit' value="Добавить" class="btn btn-success col-md-12"
                               style="height: 50px; margin-top: 50px; margin-bottom: 50px;">
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script src={{asset('js/tinymce/tinymce.min.js')}}></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            height: 500,
            toolbar: 'undo redo | cut copy paste'
        });</script>
@endsection

