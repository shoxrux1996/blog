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
                    <label>Name: </label>
                    {{Form::text('name',$category->name), ['class'=>'form-control']}}
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
                <label>Text: </label>
                {{Form::textarea('text',$category->text,['class'=>'form-control'])}}

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

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            height: 500,
            toolbar: 'undo redo | cut copy paste'
        });</script>
@endsection

