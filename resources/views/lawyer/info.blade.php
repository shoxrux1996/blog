@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyer.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div id="wrapper">
        <div class="container">
            <div class="col-sm-3">
                <!-- Profile -->
                <div class="panel panel-default panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#profile">
                                @lang('lawyer-settings.Мой профиль') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="profile" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <h6><b>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</b></h6>
                                    <p class="color-gray">г. {{$lawyer->user->city->name}}</p>
                                    <a href="{{ route('lawyer.dashboard')}}">@lang('lawyer-settings.Личный кабинет')</a>
                                </li>
                                <li>
                                    <i class="fa fa-hourglass pull-left"></i>
                                    <p class="color-grey">
                                        @lang('lawyer-settings.Как считается рейтинг?')
                                    </p>
                                    <p>
                                        <a href="#">@lang('lawyer-settings.Как считается рейтинг?')</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="#">@lang('lawyer-settings.Отзывы'):</a>
                                    </p>
                                    <p>
                                        {{$lawyer->countPositiveFeedbacks()}} @lang('lawyer-settings.положительных')
                                    </p>
                                    <p>
                                        {{$lawyer->countNegativeFeedbacks()}} @lang('lawyer-settings.отрицательных')
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile -->

                <!-- Account -->
                <div class="panel panel-default panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#account">
                                @lang('lawyer-settings.Мой аккаунт') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="account" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <h3>0 @lang('lawyer-settings.сум').</h3>
                                    <h3>0 @lang('lawyer-settings.юркоинов')</h3>
                                    <a href="#">@lang('lawyer-settings.Управление балансом')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Account -->

                <!-- My practices -->
                <div class="panel panel-default panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#services">
                                @lang('lawyer-settings.Моя практика') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="services" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">@lang('lawyer-settings.Вопросы')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('lawyer-settings.Заявки')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('lawyer-settings.Документы')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('lawyer-settings.Телефонные консультации')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /My practices -->
            </div>


            <div class="col-sm-9 background-white border-gray">
                <h5 class="text-success">@lang('lawyer-settings.Редактирование профиля')</h5>
                <ul class="nav nav-tabs">
                    <li class="{{$settingtype==='main' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#main">@lang('lawyer-settings.Основное')</a>
                    </li>
                    <li class="{{$settingtype==='photo' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#photo">@lang('lawyer-settings.Фотография')</a>
                    </li>
                    <li class="{{$settingtype==='password' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#password">@lang('lawyer-settings.Почта и пароль')</a>
                    </li>
                    <li class="{{$settingtype==='contacts' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#contacts">@lang('lawyer-settings.Контакты')</a>
                    </li>
                    <li class="{{$settingtype==='education' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#education">Образование</a>
                    </li>
                    <li class="{{$settingtype==='experience' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#experience">@lang('lawyer-settings.Опыть')</a>
                    </li>
                    <li class="{{$settingtype==='additional' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#additional">@lang('lawyer-settings.Дополнительно')</a>
                    </li>
                    <li class="{{$settingtype==='awards' ? 'active' : ''}}">
                        <a data-toggle="tab" href="#awards">@lang('lawyer-settings.Сертификаты')</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#lawyer-card">Карта юриста</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="main" class="tab-pane fade in {{$settingtype==='main' ? 'active' : ''}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{ route('lawyer.update',['settingtype'=>'main'])}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="surname">@lang('lawyer-settings.Фамилия')</label>
                                        <input type="text" class="form-control " id="surname" name="surname"
                                               value="{{$lawyer->user->lastName}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">@lang('lawyer-settings.Имя')</label>
                                        <input type="text" class="form-control " id="name" name="name"
                                               value="{{$lawyer->user->firstName}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="patronymic">@lang('lawyer-settings.Отчество')</label>
                                        <input type="text" class="form-control " id="patronymic" name="patronymic"
                                               value="{{$lawyer->fatherName}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">@lang('lawyer-settings.Город')</label>
                                        {{Form::select('city', $cities, $lawyer->user->city_id, ['class'=>'form-control'])}}
                                    </div>
                                    <div class="form-group">
                                        <label for="status">@lang('lawyer-settings.Ваш статус')</label>
                                        <select class="form-control" id="status" name="job_status">
                                            <option value="lawyer" {{$lawyer->job_status==='lawyer' ? 'selected' : ''}}>
                                                @lang('lawyer-settings.Адвокат')
                                            </option>
                                            <option value="notary" {{$lawyer->job_status==='notary' ? 'selected' : ''}}>
                                                @lang('lawyer-settings.Нотариус')
                                            </option>
                                            <option value="jurist" {{$lawyer->job_status==='jurist' ? 'selected' : ''}}>
                                                @lang('lawyer-settings.Юрист')
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">@lang('lawyer-settings.Дата рождение')</label>
                                        {{Form::date('dateOfBirth', $lawyer->user->dateOfBirth, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group form-inline">
                                        <label>@lang('lawyer-settings.Пол') </label>
                                        <input type="radio" name="gender"
                                               value="M" {{$lawyer->gender==='M' ? 'checked' : ''}} /> @lang('lawyer-settings.Мужской')
                                        <input type="radio" name="gender"
                                               value="F" {{$lawyer->gender==='F' ? 'checked' : ''}}/> @lang('lawyer-settings.Женский')
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="photo" class="tab-pane fade in {{$settingtype==='photo' ? 'active' : ''}}">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="img-responsive">
                                    @if($lawyer->user->file != null)
                                        <img id="blah"
                                             src="{!!asset($lawyer->user->file->path . $lawyer->user->file->file)!!}"
                                             alt="..." class="img-thumbnail" style="height: 300px;">
                                    @else
                                        <img id="blah" class="img-thumbnail"
                                             src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}"/>
                                    @endif
                                </div>
                                <form action="{{ route('lawyer.update',['settingtype'=>'photo'])}}" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group{{$errors->has('image') ? ' has-error' : '' }}">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                        <label class="btn btn-default ">
                                            @lang('lawyer-settings.Выбрать файл') <input onchange="readURL(this);"
                                                                                         class="image" type="file"
                                                                                         name="image" hidden>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary">@lang('lawyer-settings.Загрузить')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="password" class="tab-pane fade in {{$settingtype==='password' ? 'active' : ''}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{ route('lawyer.update',['settingtype'=>'password'])}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">@lang('lawyer-settings.Email')</label>
                                        <input type="email" class="form-control " id="email" readonly
                                               placeholder="{{$lawyer->email}}"/>
                                    </div>
                                    <div class="form-group{{$errors->has('wrong-attempt') ? ' has-error' : '' }}">
                                        <label for="current-password">@lang('lawyer-settings.Текущий пароль')</label>
                                        @if ($errors->has('wrong-attempt'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('wrong-attempt') }}</strong>
                                    </span>
                                        @endif
                                        <input type="password" class="form-control " id="current-password"
                                               name="current_password"/>
                                    </div>
                                    <div class="form-group{{$errors->has('new_password') ? ' has-error' : '' }}">
                                        <label for="new-password">@lang('lawyer-settings.Новый пароль')</label>
                                        @if ($errors->has('new_password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                        @endif
                                        <input type="password" class="form-control " id="new-password"
                                               name="new_password"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="news-password-confirm">@lang('lawyer-settings.Новый пароль еще раз')</label>
                                        <input type="password" class="form-control " id="news-password-confirm"
                                               name="new_password_confirmation"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="contacts" class="tab-pane fade in {{$settingtype==='contacts' ? 'active' : ''}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{ route('lawyer.update',['settingtype'=>'contacts'])}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group{{$errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone">@lang('lawyer-settings.Телефон')</label>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{$lawyer->user->phone}}" placeholder="99897-123-4567"/>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="fax">Факс</label>
                                        <input type="text" class="form-control" id="fax"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="publish-email">Email для публикации</label>
                                        <input type="email" class="form-control" id="publish-email"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Личный сайт</label>
                                        <input type="text" class="form-control" id="website"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="skype">Skype</label>
                                        <input type="text" class="form-control" id="skype"/>
                                    </div>-->
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="education" class="tab-pane fade in {{$settingtype==='education' ? 'active' : ''}}">
                        <!-- Lawyer's education -->
                        @foreach($lawyer->educations as $education)
                            @if( $loop->index%3 ==0)<div class="row" style="padding: 10px;" >@endif
                                <div class="col-sm-4" style="background-color:#fdfdfd;border: 1px solid #f7f7f7;">
                                    <ul class="list-unstyled">
                                        <h5><b><i class="fa fa-graduation-cap"></i> Образование {{$loop->iteration}}</b></h5>
                                        <li><h6><span class="color-gray">Страна:</span> {{$education->country->name}}</h6></li>
                                        <li><h6><span class="color-gray">Город:</span> {{$education->city}}</h6></li>
                                        <li><h6><span class="color-gray">ВУЗ:</span> {{$education->university}}</h6></li>
                                        <li><h6><span class="color-gray">Факультет:</span> {{$education->faculty}}</h6></li>
                                        <li><h6><span class="color-gray">Год выпуска:</span> {{$education->year}}</h6></li>

                                        <a href="{{route('lawyer.education.delete', $education->id)}}" style="float: right;"><i class="fa fa-trash fa-2x"></i></a>
                                    </ul>
                                </div>
                                @if(($loop->iteration)%3 ==0 ||$loop->last)</div>@endif
                    @endforeach
                    <!-- Lawyer's education -->
                        <div class="row" style="padding: 35px;background-color:#F7F7F7;border: 1px solid #DDD;">
                            <form action="{{ route('lawyer.update',['settingtype'=>'education'])}}" method="post">
                                {{csrf_field()}}
                                <div class="col-sm-10" >
                                    <div class="form-group">
                                        <label for="country">Страна</label>
                                        <select name="country" class="form-control" id="country">
                                            @foreach($countries as $key => $country)
                                                <option value="{{$key}}" {{$key == 860 ? "selected": ""}}>{{$country['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group{{$errors->has('city') ? ' has-error' : '' }}">
                                        <label for="city-input">Город</label>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                        <input name="city" type="text" class="form-control" id="city-input"/>
                                    </div>
                                    <div class="form-group{{$errors->has('university') ? ' has-error' : '' }}">
                                        <label for="university">ВУЗ</label>
                                        @if ($errors->has('university'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('university') }}</strong>
                                        </span>
                                        @endif
                                        <input name="university" type="text" class="form-control" id="university"/>
                                    </div>
                                    <div class="form-group{{$errors->has('degree') ? ' has-error' : '' }}">
                                        <label for="degree">Степень</label>
                                        @if ($errors->has('degree'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                        </span>
                                        @endif
                                        <select name="degree" type="text" class="form-control" id="degree">
                                            <option value="Бакалавр">Бакалавр</option>
                                            <option value="Магистр">Магистр</option>
                                            <option value="Докторат">Докторат</option>
                                            <option value="Другой">Другой</option>
                                        </select>
                                    </div>
                                    <div class="form-group{{$errors->has('faculty') ? ' has-error' : '' }}">
                                        <label for="faculty">Факультет</label>
                                        @if ($errors->has('faculty'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                        </span>
                                        @endif
                                        <input name="faculty" type="text" class="form-control" id="faculty"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="graduated-year">Год выпуска</label>
                                        <select name="year" class="form-control" id="graduated-year">
                                            @for($i = 2017; $i>=1970; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="experience" class="tab-pane fade in {{$settingtype==='experience' ? 'active' : ''}}">
                        <form action="{{ route('lawyer.update',['settingtype'=>'experience'])}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <p class="color-gray">@lang('lawyer-settings.Выбор специализации (можно выбрать не более пяти)')</p>
                                <div class="col-sm-6">
                                    @foreach($categories as $category)
                                        @if($category->id%2==1)
                                            <label class="checkbox">
                                                <input type="checkbox" name="specialization[]"
                                                       value="{{$category->id}}" @foreach($lawyer->categories as $var){{$var->id==$category->id ? 'checked' : ''}}@endforeach>{{$category->name}}
                                            </label>
                                    @endif
                                @endforeach
                                <!-- <label class="checkbox">
                                    <input type="checkbox" value="">Конституционное право
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Семейное право
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Трудовое право
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Защита прав потребителей
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Наследство
                                </label> -->
                                </div>
                                <div class="col-sm-6">
                                    @foreach($categories as $category)
                                        @if($category->id%2==0)
                                            <label class="checkbox">
                                                <input type="checkbox" name="specialization[]"
                                                       value="{{$category->id}}" @foreach($lawyer->categories as $var){{$var->id==$category->id ? 'checked' : ''}}@endforeach>{{$category->name}}
                                            </label>
                                    @endif
                                @endforeach
                                <!-- <label class="checkbox">
                                    <input type="checkbox" value="">Гражданское право
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Недвижимость
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Уголовное право
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Социальное обеспечение
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="">Бухгалтерский учет
                                </label> -->
                                </div>
                            </div>
                            <div class="row">
                                <p class="color-gray">@lang('lawyer-settings.Текущее место работы')</p>
                                <div class="col-sm-6">
                                    <div class="form-group{{$errors->has('company') ? ' has-error' : '' }}">
                                        <label for="company">@lang('lawyer-settings.Компания')</label>
                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                        @endif
                                        <input type="text" id="company" name="company" class="form-control"
                                               value="{{$lawyer->company}}"/>
                                    </div>
                                    <div class="form-group{{$errors->has('position') ? ' has-error' : '' }}">
                                        <label for="position">@lang('lawyer-settings.Должность')</label>
                                        @if ($errors->has('position'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                        @endif
                                        <input type="text" id="position" name="position" class="form-control"
                                               value="{{$lawyer->position}}"/>
                                    </div>
                                    <div class="form-group{{$errors->has('experience_year') ? ' has-error' : '' }}">
                                        <label for="experience-year">@lang('lawyer-settings.Юридический стаж')</label>
                                        @if ($errors->has('experience_year'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('experience_year') }}</strong>
                                    </span>
                                        @endif
                                        <input type="text" class="form-control" id="experience-year"
                                               name="experience_year" value="{{$lawyer->experience_year}}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="additional" class="tab-pane fade in {{$settingtype==='additional' ? 'active' : ''}}">
                        <form method="post" action="{{ route('lawyer.update', ['settingtype'=>'additional'])}}">
                            {{csrf_field()}}
                            <div class="row">
                                <h6 class="color-gray"><b>@lang('lawyer-settings.Стоимость услуг в чате')</b></h6>
                                <div class="col-sm-4">
                                    <div class="form-group{{$errors->has('call_price') ? ' has-error' : ''}}">
                                        <label for="phone-consultion">@lang('lawyer-settings.Телефонная консультация (сум)')</label>
                                        @if($errors->has('call_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('call_price') }}</strong>
                                    </span>
                                        @endif
                                        <input type="text" id="phone-consultion" class="form-control" name="call_price"
                                               value="{{$lawyer->call_price}}"/>
                                    </div>
                                    <div class="form-group{{$errors->has('doc_price') ? ' has-error' : ''}}">
                                        <label for="document-prep">@lang('lawyer-settings.Изготовление документа (сум)')</label>
                                        @if($errors->has('doc_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('doc_price') }}</strong>
                                    </span>
                                        @endif
                                        <input type="text" id="document-prep" class="form-control" name="doc_price"
                                               value="{{$lawyer->doc_price}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h6><b>@lang('lawyer-settings.Дополнительно')</b></h6>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="profile-shown-price">@lang('lawyer-settings.Стоимость услуг, отображаемая в профиле')</label>
                                        <textarea id="profile-shown-price" cols="20" class="form-control" rows="5"
                                                  name="profile_shown_price">{{$lawyer->profile_shown_price}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="about-me">@lang('lawyer-settings.О себе')</label>
                                        <textarea id="about-me" cols="20" class="form-control" rows="5"
                                                  name="about_me">{{$lawyer->about_me}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-default btn-primary pull-right">@lang('lawyer-settings.Сохранить')
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div id="awards" class="tab-pane fade in {{$settingtype==='awards' ? 'active' : ''}}">
                        <div class="row">
                            <h6><b>@lang('lawyer-settings.Сертификаты')</b></h6>
                            @if($lawyer->files != null)
                                @for($i=0; $i<$lawyer->files->count(); $i+=3)
                                    <div class="row">
                                        @for($j=$i; $j<=$i+2 && $j<$lawyer->files->count(); $j++)
                                            <div class="col-sm-3">
                                                <a href="{{route('lawyer.award.delete', $lawyer->files[$j]->id)}}"
                                                   onclick="return confirm('Вы уверены')" class="btn btn-sm btn-danger"
                                                   style="position: absolute;">X</a>
                                                <img class="img-responsive img-thumbnail"
                                                     src="{!!asset($lawyer->files[$j]->path. $lawyer->files[$j]->file)!!}"/>
                                            </div>
                                        @endfor
                                    </div>
                                @endfor
                            @endif
                            <form method="post" action="{{ route('lawyer.update', ['settingtype'=>'awards'])}}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <p class="color-gray">@lang('lawyer-settings.Загрузите изображение Ваших сертификатов или дипломов (в формате jpeg)')
                                    .</p>
                                <div class="form-group">
                                    <label class="btn btn-default ">
                                        @lang('lawyer-settings.Выбрать файл') <input type="file" name="files[]" multiple
                                                                                     hidden>
                                    </label>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-default btn-primary">@lang('lawyer-settings.Загрузить')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Lawyer card info -->
                    <div id="lawyer-card" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="img-responsive" align="Card image" src="{{asset('dist/images/Credit-Card-PNG-Image.png')}}" />
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="card-number">Номер карты</label>
                                        <input type="text" id="card-number" class="form-control" placeholder="Номер вашей карты"/>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="expire-date">Дата истечения</label>
                                        <input type="text" id="expire-date" class="form-control" placeholder="мм/гг"/>
                                    </div>
                                </div>
                                <br>
                                <button type="button" class="btn btn-primary pull-right">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Lawyer card info -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>


    <script>

        $('#card-number').inputmask("9999 9999 9999 999");
        $('#expire-date').inputmask("99/99");

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                            .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection