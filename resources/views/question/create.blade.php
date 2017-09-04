@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/services.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/become-brilliant.css')}}" rel="stylesheet">
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">@lang('question.home')</a></li>
  <li><a href="{{ route('lawyers.list')}}">@lang('question.lawyers')</a></li>
  <li><a href="{{ route('question.list')}}">@lang('question.questions')</a></li>
  <li><a href="{{ route('web.blogs')}}">@lang('question.blog')</a></li>
  <li><a href="{{ route('how-works')}}">@lang('question.howworks')</a></li>
  <li><a href="{{ route('about')}}">@lang('question.aboutus')</a></li>
@endsection
@section('content')
    

<!-- Content -->
<div id="wrapper">
    <div class="container">
        <h3><b>@lang('question.Задайте свой вопрос юристу')</b></h3>

        <!-- How does it work ? -->
        <div class="row" id="how-it-works">
            <div class="col-sm-3 text-center">
                <h3 class="color-dark-blue">@lang('question.Как работает Yuridik.uz?')</h3>
            </div>
            <div class="col-sm-3 text-primary">
                <h5 class="text-primary"><span class="label label-primary">1</span> @lang('question.Задайте вопрос')</h5>
                <p>@lang('question.Мы получаем более 1500 вопросов каждый день. Задайте свой!')</p>
            </div>
            <div class="col-sm-3 text-info">
                <h5 class="text-info"><span class="label label-info">2</span> @lang('question.Получите ответы')</h5>
                <p>@lang('question.На вопросы круглосуточно отвечают юристы со всей Узбекистана. Среднее время ответа — 15 минут.')</p>
            </div>
            <div class="col-sm-3 text-success">
                <h5 class="text-success"><span class="label label-success">3</span> @lang('question.Проблема решена!')</h5>
                <p>@lang('question.95,4% клиентов остаются полностью довольны ответами и рекомендуют нас друзьям.')</p>
            </div>
        </div>
        <!-- /How does it work? -->

        <form method="post" action="{{ route('question.insert.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Question submit form -->
            <div class="row ask-form">
                <h4>@lang('question.Задать вопрос')</h4>
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
                        {{Form::select('category', $categories, null , ['class'=>'form-control general-input', 'placeholder'=>''])}}
                    </div>
                    <div class="form-group{{$errors->has('title') ? ' has-error' : '' }} ">
                        <label for="question">@lang('question.Ваш вопрос*')</label>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        <input type="text" class="form-control general-input" id="question" placeholder="{{ __('question.Как подать в суд, если неизвестен адрес ответчика?') }}" name="title" />
                    </div>
                    <div class="form-group{{$errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">@lang('question.Подробное описание ситуации*')</label>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                        <textarea class="form-control general-input" rows="15" id="description" name="description"></textarea>
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
            <!-- /Question submit form -->
            
            @if(!Auth::guard('client')->check())
                <div class="row ask-form">
                <h1>@lang('question.Как с вами связаться?')</h1>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name-div" style="display:{{ $errors->has('name')  ? 'block' : '' }};">
                            <label for="name"><i class="fa fa-user-circle" aria-hidden="true"></i> Имя</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control general-input" name="name" placeholder="{{ __('question.Введите вашу имя') }}">
                        </div>
                        <div class="form-group{{ $errors->has('email') || $errors->has('wrong-attempt') ? ' has-error' : '' }}">
                            <label for="username"><i class="fa fa-envelope-o" aria-hidden="true"></i> @lang('question.Эл. почта')</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="text"  class="form-control general-input" id="email" name="email" placeholder="{{ __('question.Введите электронную почту') }}">
                        </div>
                        <div class="form-group{{ $errors->has('password') || $errors->has('wrong-attempt') || $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> @lang('question.Пароль') </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @elseif ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @elseif ($errors->has('wrong-attempt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                </span>
                            @endif
                            <input type="password" class="form-control general-input" name="password" placeholder="{{ __('question.Введите новую пароль') }}">
                        </div>
                        <div class="form-group" id="password-confirm-div">
                            <label for="password-confirm"><i class="fa fa-lock" aria-hidden="true"></i> @lang('question.Повторите пароль') </label>
                            <input type="password" class="form-control general-input" name="password_confirmation" placeholder="{{ __('question.Введите заново новую пароль') }}">
                        </div>
                       
                        
                </div>
            @endif

            <!-- Price table -->
            <div class="row price-table">
                <div class='wrapper'>
                    <div class='package col-sm-4'>

                        <input type="radio" name="type" id="standart-price" value="1" disabled/>
                        <div class='name'>
                            <label for="standart-price">@lang('question.Стандартная')</label>
                        </div>
                        <div class='price'>1000 @lang('question.сум')</div>
                        <hr>
                        <ul>
                            <li>
                                @lang('question.Моментальная публикация вопроса')
                            </li>
                            <li>
                                @lang('question.Гарантия обязательного базового ответа юриста')
                            </li>
                        </ul>
                    </div>
                    <div class='package brilliant col-sm-4' >
                        <input type="radio" name="type" id="vip-price" value="2" disabled/>
                        <div class='name'>
                            <label for="vip-price">@lang('question.VIP-консультация')</label>
                        </div>
                        <div class='price'>@lang('question.от') 5000 @lang('question.сум')</div>
                        <span>@lang('question.Стоимость вы устанавливаете сами')</span>
                        <hr>
                        <ul>
                            <li>
                                @lang('question.Моментальная публикация вопроса')
                            </li>
                            <li>
                                @lang('question.Гарантия полного и подробного разбора ситуации')
                            </li>
                            <li>
                                @lang('question.Мнения нескольких юристов')
                            </li>
                            <li>
                                @lang('question.Первый ответ в течение 15 минут')
                            </li>
                            <li>
                                @lang('question.Неограниченное количество дополнительных вопросов, уточнений')
                            </li>
                            <li>
                                @lang('question.Возможность скрыть вопрос от других пользователей и поисковых систем')
                            </li>
                        </ul>
                    </div>
                    <div class='package col-sm-4' >
                        <input type="radio" name="type" id="free-price" value="0" checked/>
                        <div class='name'>
                            <label for="free-price">@lang('question.Бесплатная')</label>
                        </div>
                        <div class='price'>0 @lang('question.сум')</div>
                        <hr>
                        <ul>
                            <li>
                                @lang('question.Публикация вопроса в порядке очереди')
                            </li>
                            <li>
                                @lang('question.Гарантии ответа нет')
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-default blue-button btn-lg">Опубликовать вопрос</button>


                <!-- Modal for paid questions-->
                <div id="paid-questions-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">@lang('index.soon')!!!</h4>
                            </div>
                            <div class="modal-body">
                                <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                                <h4>Функция "платные вопросы" в процессе разработки</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('index.close')</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Modal for paid questions-->

            </div>
            <!-- /Price table -->
        </form>
    </div>
</div>
<!-- /Content -->
@endsection
@section('scripts')
    <script>

        @php
            echo "var emails = ". json_encode($emails) . ";\n";
        @endphp
        
        $('#email').on('input', function() { 
            for(index in emails){
                if(emails[index] == $(this).val()){
                    $('#password-confirm-div').css("display","none");
                    $('#name-div').css("display","none");
                    break;
                }
                if(emails[index] != $(this).val()){
                    $('#password-confirm-div').css("display","block");
                    $('#name-div').css("display","block");
                    continue;
                }
            }

        });


        $('.price-table .package').click(function () {
           if(!($(this).find('input').is(':checked'))){
               $('#paid-questions-modal').modal('show');
           }
        });


    </script>
@endsection

