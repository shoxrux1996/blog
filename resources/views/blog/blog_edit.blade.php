@extends('layouts.app-admin')
@section('title', 'Insert')
@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ADMIN Insert</div>
                    <div class="panel-body">

                        {{Form::model($blog,['route' => ['admin.blog.edit.submit', $blog->id], 'method' => 'POST'])}}
                        {{ csrf_field() }}


                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif


                        <div class="form-group">
                            {{ Form::label('title', 'Title:')}}
                            <input type="text" name='title' class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Tags: </label>
                            {{Form::select('tags[]', $tags, $blog->tags, ['class' => 'form-control js-example-basic-multiple', 'multiple'=> 'multiple'])}}

                        </div>
                        @if ($errors->has('image'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                        @endif
                        <div class="panel panel-footer col-md-12 ">
                            <div class="col-md-4 ">
                                {{ Form::label('image', 'Image:')}}
                                <div class="" style="padding-top: 40px;">
                                    <input type='file' name="image" onchange="readURL(this); ">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <img id="blah" src="#" alt="your image" style="width: 500px; height: 200px;"/>
                            </div>
                        </div>
                        @if ($errors->has('text'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                        @endif
                        <label>Text: </label>
                        <textarea type='text' name='text' class="form-control">

                        </textarea>
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
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
            tags: true
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            toolbar: 'undo redo | cut copy paste'
        });</script>
@endsection

