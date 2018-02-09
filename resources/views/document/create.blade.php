@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/services.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Content -->
<div id="wrapper">
    <div class="container" id="order-document">
        <!-- Info -->
        <div class="row background-white padding-30 text-center">
            <h3>Подготовка документов</h3>
            <h6>Вам нужно составить иск или претензию? Подготовить договор? Зарегистрировать ООО?
                Оставьте заявку на сайте и получите предложения от юристов со всей России. Бесплатно!</h6>
            <h4><span class="label label-primary">1</span> Заполните заявку <i class="fa fa-arrow-circle-o-right"></i> <span class="label label-info">2</span> Получите предложения <i class="fa fa-arrow-circle-o-right"></i> <span class="label label-success">3</span> Выберите юриста</h4>
        </div>
        <!-- /Info -->

        <!-- Document ask form -->
        <div class="row ask-form">
            <h4>Ваш вопрос</h4>
            <div class="col-sm-7">
                <form action="{{ route('document.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="row">
                        @foreach($types as $key => $value)
                        <div class="col-sm-6">
                            <input type="radio" id="docType" name="docType" {{old('docType')==null ? ($key=="1" ? 'checked='.'"'.'checked'.'"' : '') : (old('docType')==$key ? 'checked='.'"'.'checked'.'"' : '')}} value="{{$key}}" onclick="handler(this.value)" />
                            <label for="{{$key}}">{{$value}}</label>
                            <p>{{$definitions[$key]}}</p>
                        </div>
                        @endforeach
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="document-type">Тип документа</label>
                        {{Form::select('subType', $default_options, null, ['class'=>'form-control general-input', 'id'=>'subType'])}}
                    </div>
                    <div class="form-group{{$errors->has('title') ? ' has-error' : '' }}">
                        <label for="question">Мне нужно</label>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        <input type="text" class="form-control general-input" id="question" name="title" value="{{old('title')}}"/>
                    </div>
                    <div class="form-group{{$errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Подробное описание</label>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        <textarea class="form-control general-input" rows="15" name="description" placeholder="Чем подробнее вы опишете требования к документу,тем точнее юристы смогут оценить его стоимость.">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Если нужно, прикрепите файл</label>
                        <label class="btn btn-default general-input">
                            Выбрать файл <input type="file" name="files[]" value="{{old('files')}}" multiple>
                        </label>
                        @if ($errors->any() && !($errors->has('description') || $errors->has('title')))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Стоимость документа</label>
                        <p>
                            <input type="radio" name="payment_type" value="later" id="cost-1" checked onclick="disable()" {{old('payment_type')=="later" ? 'checked='.'"'.'checked'.'"' : '' }}/>
                            <label for="cost-1">По договоренности с юристом</label>
                        </p>
                        <p>
                            <input type="radio" name="payment_type" value="about" id="cost-2" onclick="enable()" {{old('payment_type')=="about" ? 'checked='.'"'.'checked'.'"' : '' }}/>
                            <label for="cost-2">Я планирую заплатить</label>
                            <input type="number" name="cost" value="{{old('cost')}}" class="general-input" id="cost" disabled /> сум
                        </p>
                    </div>

                    <button type="submit" class="btn btn-default blue-button pull-right">Готово</button>
                </form>
            </div>
            <div class="col-sm-5">
                <h4>3 причины оставить заявку</h4>
                <ul class="list-unstyled">
                    <li>
                        <h4><i class="fa fa-check-square-o text-success"></i> Это бесплатно</h4>
                        <p>Вы оставляете заявку абсолютно бесплатно и ничего не теряете, если никто из юристов вам не подойдет.</p>
                    </li>
                    <li>
                        <h4><i class="fa fa-check-square-o text-success"></i> У вас появится выбор</h4>
                        <p>Вы сравниваете предложения
                            разных юристов и выбираете самые
                            выгодные условия.</p>
                    </li>
                    <li>
                        <h4><i class="fa fa-check-square-o text-success"></i> Это бесплатно</h4>
                        <p>Если вы останетесь недовольны
                            результатом, напишите нам, и мы
                            вернем вам деньги!.</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Document ask form -->
    </div>
</div>
<!-- /Content -->


@endsection
@section('scripts')
<script>
    var subtypes = {!!json_encode($subtypes, JSON_PRETTY_PRINT) !!}
        console.log(subtypes)
    var parents = {!!json_encode($parents, JSON_PRETTY_PRINT) !!}
        console.log(parents)
</script>

@if(old('docType')!= null)
    <script>
        var type_option = document.getElementById('subType');
        var l=type_option.length;
        var docTypeValue = {!! old('docType') !!}
        for(var i=0;i<l;i++){
            type_option.remove(0);
        }
        for(index in subtypes) {
            if(parents[index]==docTypeValue){
                var option = document.createElement("option");
                option.text = subtypes[index];
                option.value = index;
                type_option.add(option);
                if({!! old('subType') !!} == index)
                    option.selected = "selected";
            }
        }
    </script>
@endif
{!! Html::script('js/document.js') !!}
@endsection