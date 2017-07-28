@extends('layouts.app')
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
<div class="container">
        {{Form::open(['route' => ['document.store'], 'enctype' => 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal'])}}
        <div class="form-group">
            @foreach($types as $key => $value)
            <div class="col-sm-6">
                @if($key == 1)
                <!-- <input type="radio" name="docType" onclick="handler(this.value)" value="1" checked="checked"> -->
                    {{Form::radio('docType',$key, true, ['onclick' => 'handler(this.value)'])}}  {{Form::label($key, $value, ['class' => 'col-sm-3'])}}
                 @endif
                 @if($key != 1)
                 <!-- <input type="radio" name="docType" onclick="handler(this.value)" value="<?php echo htmlspecialchars($key); ?>" > -->
                    {{Form::radio('docType',$key, false, ['onclick' => 'handler(this.value)'])}}  {{Form::label($key, $value, ['class' => 'col-sm-3'])}}   
                @endif            
            </div>
            @endforeach

        </div>
        <div class="form-group">
            {{Form::label('subType', 'Тип документа', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-8">
            <!-- <select class="form-control" id="subType"></select> -->
                {{Form::select('subType', $default_options, null, ['class'=>'form-control', 'id'=>'subType'])}}
            </div>
        </div>
        
    

        <div class="form-group">
            {{Form::label('title', 'Мне нужно', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-8">
                {{Form::text('title', '', ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Подробное описание', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-8">
                {{Form::textarea('description', '', ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('attachment', 'Прикрепите файл', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-8">
            <input type="file" name="files[]" multiple ="multiple" />
            </div>
        </div>
        <div class="form-group">
            {{Form::label('price', 'Стоимость документа', ['class' => 'col-sm-1 control-label'])}}
            <div class="col-sm-6">
                {{Form::radio('payment_type', 'later')}}
                {{Form::label('later', 'По договоренности с юристом', ['class' => 'col-sm-6'])}}
            </div>
            <div class="col-sm-6">
                {{Form::radio('payment_type', 'about')}}
                {{Form::label('cost', 'Я планирую заплатить', ['class' => 'col-sm-6'])}}
                {{Form::text('cost','',['class'=>'form-control'])}}
            </div>
        </div>

        {{Form::submit('Готова', ['class' => 'btn btn-success']) }}
        {{Form::close()}}

</div>



@endsection
@section('scripts')
<script>
        
        var subtypes = {!!json_encode($subtypes, JSON_PRETTY_PRINT) !!}
        console.log(subtypes)
        
        var parents = {!!json_encode($parents, JSON_PRETTY_PRINT) !!}
        console.log(parents)

    </script>
{!! Html::script('js/document.js') !!}
@endsection
@endsection