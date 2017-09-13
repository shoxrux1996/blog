@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/services.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/become-brilliant.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-2">
            <form method="post" action="{{ route('question.edit.submit', $question->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- Question submit form -->
                <div class="row ask-form">
                    <h4>@lang('question.Изменить вопрос')</h4>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label>@lang('question.Вы задаете вопрос как*')</label>
                            <label class="checkbox-inline">
                                <input type="radio" id="inlineCheckbox1" value="1" name="radio" checked> @lang('question.Частное лицо')
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="inlineCheckbox2" value="2" name="radio"> @lang('question.Представитель бизнеса')
                            </label>
                        </div>
                        <div class="form-group{{$errors->has('category') ? ' has-error' : '' }} ">
                            <label for="category">@lang('question.Категория права')</label>
                            @if ($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                            {{Form::select('category', $categories, $question->category->id, ['class'=>'form-control general-input', 'placeholder'=>''])}}
                        </div>
                        <div class="form-group{{$errors->has('title') ? ' has-error' : '' }} ">
                            <label for="question">@lang('question.Ваш вопрос*')</label>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                            <input value="{{$question->title}}" type="text" class="form-control general-input" id="question" placeholder="{{ __('question.Как подать в суд, если неизвестен адрес ответчика?') }}" name="title" />
                        </div>
                        <div class="form-group{{$errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">@lang('question.Подробное описание ситуации*')</label>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <textarea class="form-control general-input" rows="15" id="description" name="description">{{$question->text}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('question.Файлы')</label>
                            @foreach($question->files as $file)
                                <div>
                                    <a class="label label-default"
                                       href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                    <a onclick="return confirm('Вы уверены')" href="{{route('client.file.delete', $file->id)}}"> <i class="fa fa-trash-o"></i></a>
                                </div>

                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>@lang('question.Если нужно, прикрепите файл')</label>
                            <label class="btn btn-default general-input">
                                @lang('question.Выбрать файл') <input type="file" name="files[]" multiple hidden>
                            </label>
                            @if ($errors->any() && !($errors->has('description') || $errors->has('title') || $errors->has('name') || $errors->has('email') || $errors->has('password') || $errors->has('wrong-attempt') ))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('question.Изменить вопрос')</button>
                </div>
            </form>
        </div>
    </div>
@endsection