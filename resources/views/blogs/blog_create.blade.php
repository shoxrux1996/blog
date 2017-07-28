@extends('layouts.app')
@section('styles')
    {!! Html::style('css/select2.min.css') !!}
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
@endsection
@section('body')
    @extends('layouts.body')
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
                <form role="form" method="POST" action="{{ route('lawyer.blog.submit') }}">
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
                        <select class="form-control col-md-12 js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value='{{$tag->id}}'>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('text'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                    @endif
                    <label>Text: </label>
                    <textarea type='text' name='text' class="form-control"></textarea>
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

