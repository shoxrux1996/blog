@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/services.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/become-brilliant.css')}}" rel="stylesheet">
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
    <!-- {{Form::open(['route' => ['question.insert.submit'], 'enctype' => 'multipart/form-data', 'method' => 'POST'])}}
    	{{Form::label('category', 'Category: ')}}
        {{Form::select('category', $categories, null , ['class'=>'form-control'])}}
        {{Form::label('title', 'Your question: ')}}
        {{Form::text('title', null, ['class'=>'form-control']) }}
        {{Form::label('text', 'Text: ')}}
        {{Form::textarea('text', null, ['class'=>'form-control field']) }} -->

        <!-- {{Form::file('files[]', ['multiple' => 'multiple'])}} last version-->
        <!-- <input type="file" name="files[]" multiple ="multiple" />  -->  <!--new version --> 
           <!--  {{Form::label('email', 'Email: ', ['class' => 'col-sm-1 control-label'])}}
               
            {{Form::text('email', $client->email, ['class'=>'form-control', 'readonly' => 'readonly'])}}
             
         
            {{Form::label('name', 'First Name: ', ['class' => 'col-sm-1 control-labe'])}}
                
            {{Form::text('firstName', $client->user->firstName, ['class'=>'form-control', 'readonly' => 'readonly'])}}
            <br>
            {{Form::label('type', 'VIP ')}}
            {{Form::radio('type', 2, true)}}
            {{Form::label('type', 'Free ')}}
            {{Form::radio('type', 1)}}
            <br>
            {{Form::label('price', 'Price: ')}}
            {{Form::text('price', null, ['class' => 'form-control'])}}
        {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
    {{Form::close()}} -->

<!-- Content -->
<div id="wrapper">
    <div class="container">
        <h4><b>Задайте свой вопрос юристу</b></h4>

        <!-- How does it work ? -->
        <div class="row" id="how-it-works">
            <div class="col-sm-3 text-center">
                <h3 class="color-dark-blue">Как работает
                    Yuridik.uz?</h3>
            </div>
            <div class="col-sm-3 text-primary">
                <h5 class="text-primary"><span class="label label-primary">1</span> Задайте вопрос</h5>
                <p>Мы получаем более 1500 вопросов каждый день. Задайте свой!</p>
            </div>
            <div class="col-sm-3 text-info">
                <h5 class="text-info"><span class="label label-info">2</span> Получите ответы</h5>
                <p>На вопросы круглосуточно
                    отвечают юристы со всей России.
                    Среднее время ответа — 15 минут.</p>
            </div>
            <div class="col-sm-3 text-success">
                <h5 class="text-success"><span class="label label-success">3</span> Проблема решена!</h5>
                <p>95,4% клиентов остаются
                    полностью довольны ответами
                    и рекомендуют нас друзьям.</p>
            </div>
        </div>
        <!-- /How does it work? -->

        <form action="POST" action="{{ route('question.insert.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- Question submit form -->
            <div class="row ask-form">
                <h4>Задать вопрос</h4>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Вы задаете вопрос как*</label>
                        <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox1" value="option1" name="radio" checked> Частное лицо
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox2" value="option2" name="radio"> Представитель бизнеса
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="category">Категория права</label>
                        <input type="text" name="category" list="categories" class="form-control general-input" placeholder="Не выбрано" id="category">
                        <datalist id="categories">
                            <option value="Category 1"></option>
                            <option value="Category 2"></option>
                            <option value="Category 3"></option>    
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="question">Ваш вопрос*</label>
                        <input type="text" class="form-control general-input" id="question" placeholder="Как подать в суд, если неизвестен адрес ответчика?"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Подробное описание ситуации*</label>
                        <textarea class="form-control general-input" rows="15" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Если нужно, прикрепите файл</label>
                        <label class="btn btn-default general-input">
                            Выбрать файл <input type="file" hidden>
                        </label>
                    </div>
                </div>
            </div>
            <!-- /Question submit form -->

            <!-- Price table -->
            <div class="row price-table">
                <div class='wrapper'>
                    <div class='package col-sm-4'>

                        <input type="radio" name="price" id="standart-price"/>
                        <div class='name'>
                            <label for="standart-price">Стандартная</label>
                        </div>
                        <div class='price'>1000 сум</div>
                        <hr>
                        <ul>
                            <li>
                                Моментальная публикация вопроса
                            </li>
                            <li>
                                Гарантия обязательного
                                базового ответа юриста
                            </li>
                        </ul>
                    </div>
                    <div class='package brilliant col-sm-4'>
                        <input type="radio" name="price" checked id="vip-price"/>
                        <div class='name'>
                            <label for="vip-price">VIP-консультация</label>
                        </div>
                        <div class='price'>от 5000 сум</div>
                        <span>Стоимость вы устанавливаете сами</span>
                        <hr>
                        <ul>
                            <li>
                                Моментальная публикация вопроса
                            </li>
                            <li>
                                Гарантия полного и подробного
                                разбора ситуации
                            </li>
                            <li>
                                Мнения нескольких юристов
                            </li>
                            <li>
                                Первый ответ в течение 15 минут
                            </li>
                            <li>
                                Неограниченное количество
                                дополнительных вопросов, уточнений
                            </li>
                            <li>
                                Возможность скрыть вопрос от других
                                пользователей и поисковых систем
                            </li>
                        </ul>
                    </div>
                    <div class='package col-sm-4'>
                        <input type="radio" name="price" id="free-price"/>
                        <div class='name'>
                            <label for="free-price">Бесплатная</label>
                        </div>
                        <div class='price'>0 сум</div>
                        <hr>
                        <ul>
                            <li>
                                Публикация вопроса
                                в порядке очереди
                            </li>
                            <li>
                                Гарантии ответа нет
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-default blue-button btn-lg">Продолжить</button>
            </div>
            <!-- /Price table -->
        </form>
    </div>
</div>
<!-- /Content -->

@endsection
@endsection