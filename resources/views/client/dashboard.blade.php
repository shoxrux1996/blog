@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/client.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li><a href="{{ route('home')}}">@lang('Главная')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('Юристы')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('Вопросы')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('Блог')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('Как это работает')</a></li>
    <li><a href="{{ route('about')}}">@lang('О нас')</a></li>
@endsection
@section('content')
<!-- Modal for message-->
    <div id="dashboard-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('client-dashboard.modaltitle')</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/email-send.jpg')}}" alt="Email send"/>
                    <h4>@lang('client-dashboard.modalbody')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('client-dashboard.close')</button>
                </div>
            </div>

        </div>
    </div>
<!-- /Modal for message-->
    <!-- Modal for call function-->
    <div id="call-function" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('index.soon')!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>@lang('index.callinprocess')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('index.close')</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal for call function-->

    <!-- Modal for document function-->
    <div id="document-function" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('index.soon')!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>@lang('index.documentinprocess')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">@lang('index.close')</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal for document function-->
    <!-- Content -->
    <div id="wrapper">
        <div class="container">
            <div class="col-sm-3">
                <!-- Profile -->
                <div class="panel panel-default panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#profile">
                                @lang('Мой профиль') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="profile" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <h6><b>{{$client->user->firstName}} {{$client->user->lastName}}</b></h6>
                                    <p class="color-gray">г. {{$client->user->city->name}}</p>
                                    <a href="{{ route('client.info')}}">@lang('Редактировать')</a>
                                </li>
                                <li>
                                    <h3>{{$client->user->balance()}} @lang('сум').</h3>
                                    <a href="#">@lang('Управление балансом')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile -->

                <!-- Site services -->
                <div class="panel panel-default panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#services">
                                @lang('Мой профиль') <b class="caret"></b></a>
                        </h4>
                    </div>
                    <div id="services" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('my.questions')}}">@lang('Вопросы юристам')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('Консультации по телефону')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('Документы')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Site services -->
            </div>
            <div class="col-sm-9">
                <div class="row text-center background-white border-gray" id="services-list">
                    <div class="col-sm-4">
                        <h4 class="text-success">@lang('Вопрос')</h4>
                        <p>@lang('Задайте любой вопрос, и в течение 15 минут вы получите ответы наших юристов.')</p>
                        <a href="{{ route('question.create') }}" type="button" class="btn btn-default btn-success">@lang('Задать вопрос')</a>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text-primary">@lang('Звонок')</h4>
                        <p>@lang('Оставьте номер телефона, и наш юрист свяжется с вами, чтобы проконсультировать вас по любому вопросу.')</p>
                        <a data-toggle="modal" data-target="#call-function" type="button" class="btn btn-default btn-primary">@lang('Заказать звонок')</a>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text-warning">@lang('Документ')</h4>
                        <p>@lang('Закажите документ, после чего наш юрист свяжется с вами, уточнит детали и подготовит его.')</p>
                        <a data-toggle="modal" data-target="#document-function" type="button" class="btn btn-default btn-warning">@lang('Заказать документ')</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 border-gray background-white" id="orders">
                        <h5 class="text-success">@lang('Мои заказы')</h5>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#asked-questions">@lang('Вопросы юристам')</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#call-consultions">@lang('Консультации по телефону')</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#document-requests">@lang('Документы')</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#notifications"><i class="fa fa-bell"
                                                                              aria-hidden="true">{{$client->unreadNotifications->count()}}</i></a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="asked-questions" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul>
                                            @foreach($client->questions->reverse() as $question)
                                                <li>
                                                    <a href="{{ route('web.question.show', ['id'=>$question->id])}}">{{$question->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
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
                                            @foreach($client->documents->reverse() as $document)
                                                <li>
                                                    <a href="{{ route('client.document.show', ['id'=>$document->id])}}">{{$document->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="notifications" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul>
                                            @foreach($client->unreadNotifications as $notification)
                                                @if(class_basename($notification->type) == "ClientRequestNotification")
                                                    <a href="{{route('client.document.show', $notification->data['request']['document_id'])}}">{{$notification->data['request']['description']}}</a>
                                                @endif
                                            @endforeach

                                        </ul>
                                        <div >
                                            <a href="{{route('client.notifications.delete')}}"
                                               class="btn btn-info btn-xs"> @lang('Mark as Ready')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->

@endsection
@if(Session::has('question-create'))
    @section('scripts')
        <script type="text/javascript">
            $("#confirm-email-modal").modal();
        </script>
    @endsection
@endif