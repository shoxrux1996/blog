@extends('layouts.app')
@section('styles')
    {!! Html::style('css/select2.min.css') !!}
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Блог</h2>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="{{ route('lawyer.blog.submit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif


                    <div class="form-group">
                        {{ Form::label('title', 'Title:')}}
                        <input type="text" name='title' value='' class="form-control"/>
                    </div>
                    <div class="form-group" >
                        <label>Tags: </label>
                        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value='{{$tag->id}}'>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('image'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                    @endif
                    <div class="panel panel-footer col-md-12 ">
                        <div class="col-md-4 "  >
                            {{ Form::label('image', 'Image:')}}
                            <div class="" style="padding-top: 40px;">
                                <input  type='file' name="image" onchange="readURL(this); "  />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <img id="blah" src="#" alt="your image" style="width: 500px; height: 200px;"  />
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
                        <div >
                            <input type='submit' value="Add Blog" class="btn btn-success col-md-12" style="height: 50px; margin-top: 50px; margin-bottom: 50px;">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/select2.js') !!}
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
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
    <script src={{asset('js/tinymce/tinymce.min.js')}}></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins:[ 'link code', "textcolor"],
            height: 500,
            toolbar: ['undo redo | cut copy paste forecolor backcolor fontsizeselect fontselect'],
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
        });</script>
@endsection

