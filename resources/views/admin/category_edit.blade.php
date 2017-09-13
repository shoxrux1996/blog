@extends('layouts.app-admin')
@section('styles')

    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Блог</h2>
            </div>
            <div class="panel-body">
                {{Form::model($category, ['route' =>['admin.category.edit.submit', $category->id], 'method' => 'POST'])}}
                {{ csrf_field() }}

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <label>Name(ru): </label>
                    {{Form::text('name',$category->name, ['class'=>'form-control'])}}
                </div>
                @if ($errors->has('name_uz'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name_uz') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <label>Name(uz): </label>
                    {{Form::text('name_uz',$category->name_uz, ['class'=>'form-control'])}}
                </div>
                 <div class="form-group">
                    <label>Class name (fonts): </label>

                    {{Form::text('class',$category->class, ['class'=>'form-control', 'placeholder'=>'fa-users'])}}
                    <a href="{{url('http://fontawesome.io/cheatsheet/')}}">list of icons</a>
                </div>
                <div class="form-group">
                    <label>Parent: </label>
                    {{Form::select('category', $categories, $category->parent == null ? null : $category->parent->id,['class' => 'form-control'])}}
                </div>
                @if ($errors->has('text'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                @endif
                <label>Text(ru): </label>
                {{Form::textarea('text',$category->text,['class'=>'form-control'])}}
                @if ($errors->has('text_uz'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text_uz') }}</strong>
                                    </span>
                @endif
                <label>Text(uz): </label>
                {{Form::textarea('text_uz',$category->text_uz,['class'=>'form-control'])}}
                <div class="form-group">
                    <div>
                        <input type='submit' value="Изменить" class="btn btn-success col-md-12"
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
            plugins:[ 'link code', "textcolor"],
            height: 500,
            toolbar: ['undo redo | cut copy paste forecolor backcolor fontsizeselect fontselect'],
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
        });</script>
@endsection

