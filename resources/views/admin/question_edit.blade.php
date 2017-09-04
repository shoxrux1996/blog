@extends('layouts.app-admin')
@section('styles')
    <link href="{{ asset('dist/css/services.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/become-brilliant.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{ route('admin.question.edit.submit', $question->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row ask-form">
                    <h4>Изменить вопрос</h4>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="category">@lang('question.Категория права')</label>
                            {{Form::select('category', $categories, $question->category->id , ['class'=>'form-control general-input', 'placeholder'=>''])}}
                        </div>
                        <div class="form-group{{$errors->has('title') ? ' has-error' : '' }} ">
                            <label for="question">@lang('question.Ваш вопрос*')</label>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                            <input type="text" value="{{$question->title}}" class="form-control general-input"
                                   id="question"
                                   placeholder="{{ __('question.Как подать в суд, если неизвестен адрес ответчика?') }}"
                                   name="title"/>
                        </div>
                        <div class="form-group{{$errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">@lang('question.Подробное описание ситуации*')</label>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <textarea class="form-control general-input" rows="15"
                                      id="description" name="description">{{$question->text}}</textarea>
                        </div>

                        <button type="submit"
                                class="btn btn-default blue-button btn-lg">@lang('question.Продолжить')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection