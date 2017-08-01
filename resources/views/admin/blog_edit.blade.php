@extends('layouts.app-admin')
@section('styles')
    {!! Html::style('css/select2.min.css') !!}
    <link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Блог</h2>
            </div>
            <div class="panel-body">
                {{Form::model($blog, ['route' =>['admin.blog.edit.submit', $blog->id], 'method' => 'POST'])}}
                {{ csrf_field() }}

                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif

                <div class="form-group">
                    {{ Form::label('title', 'Title:')}}
                    {{Form::text('title', $blog->title, ['class' => 'form-control'])}}
                    
                </div>
                <div class="form-group">
                    <label>Tags: </label>
                    {{Form::select('tags[]', $tags, $blog->tags, ['class' => 'form-control js-example-basic-multiple', 'multiple'=> 'multiple'])}}
                </div>
                @if ($errors->has('text'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                @endif
                <label>Text: </label>
                {{Form::textarea('text',$blog->text,['class'=>'form-control'])}}

                <div class="form-group">
                    <div>
                        <input type='submit' value="Add Blog" class="btn btn-success col-md-12"
                               style="height: 50px; margin-top: 50px; margin-bottom: 50px;">
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    {!! Html::script('js/select2.js') !!}
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            height: 500,
            toolbar: 'undo redo | cut copy paste'
        });</script>
@endsection

