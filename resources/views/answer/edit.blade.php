@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="panel panel-default col-md-10" style="padding-top: 10px;">
                    <div class="panel-body">
                        <h3>@lang('lawyer-dashboard.Изменить ответ')</h3>
                    </div>
                    <div class="panel-heading">
                    {{Form::model($answer, ['route' => ['lawyer.answer.update', $answer->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                    @if ($errors->has('text'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        {{Form::textarea('text', $answer->text,['style' =>'width:100%;'])}}
                    </div>
                    <div class="form-group">
                        <label>@lang('question.Файлы')</label>
                        @foreach($answer->files as $file)
                            <div>
                                <a class="label label-default"
                                   href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                <a onclick="return confirm('Вы уверены')"
                                   href="{{route('lawyer.file.delete', $file->id)}}"> <i class="fa fa-trash-o"></i></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group" style="margin:10px;">
                        {{Form::file('files[]', ['multiple' => 'multiple'])}}
                    </div>
                    <div class="col-md-2 " style="float:right; margin: 10px;">
                        {{Form::submit(__('lawyer-dashboard.Изменить ответ'), ['class'=> 'btn btn-success'])}}
                    </div>
                    {{Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src={{asset('js/tinymce/tinymce.min.js')}}></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            height: 300,
            toolbar: 'undo redo | cut copy paste'
        });
    </script>
@endsection