@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/lawyers.css')}}" rel="stylesheet">
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
                                @lang('lawyer-dashboard.Мой профиль') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="profile" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <h6><b>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</b></h6>
                                    <p class="color-gray">@lang('lawyer-dashboard.г'). {{$lawyer->user->city->name}}</p>
                                    <a href="{{ route('lawyer.info')}}">@lang('lawyer-dashboard.Редактировать')</a>
                                </li>
                                <li>
                                    <i class="fa fa-hourglass pull-left"></i>
                                    <p class="color-grey">
                                        @lang('lawyer-dashboard.Как считается рейтинг?')
                                    </p>
                                    <p>
                                        <a href="#">@lang('lawyer-dashboard.Как считается рейтинг?')</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="#">@lang('lawyer-dashboard.Отзывы'):</a>
                                    </p>
                                    <p>
                                        {{$lawyer->countPositiveFeedbacks()}} @lang('lawyer-dashboard.положительных')
                                    </p>
                                    <p>
                                        {{$lawyer->countNegativeFeedbacks()}} @lang('lawyer-dashboard.отрицательных')
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
                                @lang('lawyer-dashboard.Мой аккаунт') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="account" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    @php
                                        $balance = $lawyer->user->balance();
                                    @endphp
                                    <h3>{{$balance}} @lang('lawyer-dashboard.сум').</h3>
                                    <h3>0 @lang('lawyer-dashboard.юркоинов')</h3>
                                    <a href="{{route('card.payment')}}">@lang('lawyer-dashboard.Управление балансом')</a>
                                    @if(!$lawyer->user->sentWithdrawRequest() and $balance > 0)
                                        <form action="{{route('lawyer.withdraw.request')}}" method="post" onclick="return confirm(shox);">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-default">Hisobni yechis</button>
                                        </form>
                                    @endif
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
                                @lang('lawyer-dashboard.Моя практика') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="services" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">@lang('lawyer-dashboard.Вопросы')</a>
                                </li>

                                <li>
                                    <a href="{{route('lawyer.blog.insert')}}">@lang('lawyer-dashboard.Написать Блог')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('lawyer-dashboard.Документы')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('lawyer-dashboard.Телефонные консультации')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /My practices -->
            </div>
            <div class="col-sm-9">
                <div class="row text-center background-white border-gray" id="services-list">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="text-success">@lang('app.Вопросы')</h4>
                            <p>@lang('lawyer-dashboard.Отвечайте на вопросы клиентов – зарабатывайте деньги и рейтинг')</p>
                            <a type="button" href="{{route('question.list')}}"
                               class="btn btn-default btn-success">@lang('lawyer-dashboard.Перейти к вопросам »')</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-primary">@lang('lawyer-dashboard.Телефонные консультации')</h4>
                            <p>@lang('lawyer-dashboard.Консультируйте клиентов по телефону, используя нашу систему')</p>
                            <button type="button"
                                    class="btn btn-default btn-primary">@lang('lawyer-dashboard.Перейти к заявкам »')</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="text-warning">@lang('lawyer-dashboard.Документы')</h4>
                            <p>@lang('lawyer-dashboard.Готовьте различные юридические документы для наших клиентов')</p>
                            <a type="button" href="{{ route
                        ('lawyer.document.info')}}"
                               class="btn btn-default btn-warning">@lang('lawyer-dashboard.Перейти к документам »')</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-danger">@lang('lawyer-dashboard.Заявки')</h4>
                            <p>@lang('lawyer-dashboard.Приобретайте заявки (вопросы и контакты клиента) по необходимым параметрам')</p>
                            <button type="button"
                                    class="btn btn-default btn-danger">@lang('lawyer-dashboard.Перейти к заявкам »')</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 border-gray background-white" id="orders">
                        <h5 class="text-success">@lang('lawyer-dashboard.Моя юридическая практика')</h5>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#answered-questions">@lang('lawyer-dashboard.Ответы')</a>
                            </li>
                            <li>
                                <a data-toggle="tab"
                                   href="#call-consultions">@lang('lawyer-dashboard.Консультации по телефону')</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#document-requests">@lang('lawyer-dashboard.Документы')</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#blog-created">@lang('lawyer-dashboard.Блоги')</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="answered-questions" class="tab-pane fade in active">
                                @foreach($lawyer->answers->reverse() as $answer)
                                    <div class="row well well-sm" style="padding: 10px;">
                                        <span class="col-sm-3">{{$answer->created_at}}</span>
                                        <a class="col-sm-8" href="{{ route('web.question.show',$answer->question->id)}}">{{substr(strip_tags($answer->text),0,100)}} {{strlen(strip_tags($answer->text))>100 ? '...' : ""}}</a>
                                        <a class="col-sm-1" href="{{route('lawyer.answer.edit',$answer->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </div>
                                @endforeach
                            </div>
                            <div id="call-consultions" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-4">

                                    </div>
                                </div>
                            </div>
                            <div id="document-requests" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul>
                                            @foreach($lawyer->requests->unique('document_id')->reverse() as $request)
                                                <li>
                                                    <a href="{{ route('lawyer.document.show',$request->document->id)}}"> {{$request->document->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="blog-created" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul>
                                            @foreach($lawyer->blogs as $blog)
                                                <li><a href="{{ route('web.blog.show',$blog->id)}}"> {{$blog->title}}</a>
                                                    @if(\Carbon\Carbon::parse($blog->created_at)->addDays(5) > \Carbon\Carbon::now())
                                                    <a class="btn btn-info btn-xs"
                                                       href="{{route('lawyer.blog.edit', $blog->id)}}">@lang('lawyer-dashboard.Изменить')</a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($lawyer->unreadNotifications->count())
                        <div id="notif">
                            <div class="col-sm-12 border-gray background-white orders">
                                <h5 class="text-success">@lang('lawyer-dashboard.Уведомление')<i class="fa fa-bell" aria-hidden="true">{{$lawyer->unreadNotifications->count()}}</i></h5>
                                <ul class="nav nav-tabs">
                                </ul>

                                <div class="tab-content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul>
                                                @if($lawyer->questionNotifications->count())
                                                    <li>@lang('lawyer-dashboard.Новые вопросы')
                                                        <ul>
                                                            @foreach($lawyer->questionNotifications as $notification)
                                                                <li>
                                                                    <a href="{{route('web.question.show', $notification->data['id'])}}">{{$notification->data['title']}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($lawyer->documentNotifications->count())
                                                    <li>Documents
                                                        <ul>
                                                            @foreach($lawyer->documentNotifications as $notification)
                                                                <li>
                                                                    @if($notification->data['status']==0)
                                                                        <a href="{{route('lawyer.document.show', $notification->data['id'])}}"> New document: {{$notification->data['title']}}</a>
                                                                    @elseif($notification->data['status']==2)
                                                                        <a href="{{route('lawyer.document.show', $notification->data['id'])}}"> Document closed: {{$notification->data['title']}}</a>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($lawyer->requestNotifications->count())
                                                    <li>Requests
                                                        <ul>
                                                            @foreach($lawyer->requestNotifications as $notification)
                                                                <li>
                                                                    @if($notification->data['status']==-1)
                                                                        <a href="{{route('lawyer.document.show', $notification->data['document_id'])}}"> Your request is rejected: {{$notification->data['title']}}</a>
                                                                    @elseif($notification->data['status']==1)
                                                                        <a href="{{route('lawyer.document.show', $notification->data['document_id'])}}"> Your request is accepted: {{$notification->data['title']}}</a>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($lawyer->responseNotifications->count())
                                                    <li>Responses
                                                        <ul>
                                                            @foreach($lawyer->responseNotifications as $notification)
                                                                <li>
                                                                    <a href="{{route('lawyer.document.show', $notification->data['document_id'])}}"> Client responded: {{$notification->data['title']}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($lawyer->blogNotifications->count())
                                                    <li>@lang('lawyer-dashboard.Новые блоги')
                                                        <ul>
                                                            @foreach($lawyer->blogNotifications as $notification)
                                                                <li>
                                                                    <a href="{{route('web.blog.show', $notification->data['id'])}}">{{$notification->data['title']}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                                @if($lawyer->commentNotifications->count())
                                                    <li>@lang('lawyer-dashboard.Новые комменты')
                                                        <ul>
                                                            @foreach($lawyer->commentNotifications as $notification)
                                                                <li>
                                                                    <a href="{{route('web.blog.show', $notification->data['blog_id'])}}">{{$notification->data['comment']}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            </ul>
                                            <div>
                                                <a href="{{route('lawyer.notification.asRead')}}"
                                                   class="btn btn-info btn-xs"> @lang('lawyer-dashboard.Отметить')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
@section('scripts')
    <script>
        var shox = [{!! json_encode(__('guarantees.Послу успешной'))!!}]
        $(document).ready(function () {
            $('html,body').animate({
                scrollTop: $("#notif").offset().top}, 1000);
        });
    </script>
@endsection
