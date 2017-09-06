@extends('layouts.app-admin')

@section('content')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Панель
        </li>
    </ol>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$admin->userNotifications()->count()}}</div>
                            <div>Новых пользователей!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.clients.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Показать</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$admin->commentNotifications()->count()}}</div>
                            <div>Новых комментарии!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.comments.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Показать</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$admin->blogNotifications()->count()}}</div>
                            <div>Новых статьи!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.blogs')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Показать</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-question-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$admin->questionNotifications()->count()}}</div>
                            <div>Новых вопросов!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.questions.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Показать</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 border-gray">
            <h4>Статистика вопросов</h4>
            {{--<div id="questionsBar" style="height: 250px;">
            </div>--}}
        </div>
    </div>
    <div class="row border-gray" id="donuts">
        <div class="col-sm-6">
            <h4>Статистика пользователей</h4>
           {{-- <div id="usersDonut" style="height: 250px;">
            </div>--}}
        </div>
        <div class="col-sm-6">
            <h4>Количество бесплатных/платных вопросов</h4>
            {{--<div id="questionsDonut" style="height: 250px;">
            </div>  --}}
        </div>
    </div>

@endsection