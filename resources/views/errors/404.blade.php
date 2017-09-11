@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/404.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
    <div class="row">
        <div class="text-center">
      
            <h3>@lang('404.Ошибка 404')</h3>
            <h5>
                <a href="{{ route('home') }}">@lang('404.Назад к главной страницу')</a>
            </h5>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <section class="comment-list">
                <!-- Alice -->
                <article class="row">
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="{{ asset('dist/images/headshot-2.jpg') }}" />
                            <figcaption class="text-center">@lang('404.Alice')</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{date('Y-m-d')}}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        @lang('404.Здравствуйте, такой страницы не существует. Могу ли я вам чем-нибудь помочь?')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Bob -->
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow right">
                            <div class="panel-body">
                                <header class="text-right">
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{date('Y-m-d')}}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        @lang('404.Здравствуйте. Мне необходимо получить консультацию юриста.')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="{{ asset('dist/images/headshot-3.jpg') }}" />
                            <figcaption class="text-center">@lang('404.Bob')</figcaption>
                        </figure>
                    </div>
                </article>

                <!-- Alice -->
                <article class="row">
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="{{ asset('dist/images/headshot-2.jpg') }}" />
                            <figcaption class="text-center">@lang('404.Alice')</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{date('Y-m-d')}}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        @lang('404.Вы можете') <a href="{{route('question.create')}}">@lang('404.задать вопрос')</a> @lang('404.через нашу форму.')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Bob -->
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow right">
                            <div class="panel-body">
                                <header class="text-right">
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{date('Y-m-d')}}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                       @lang('404.Понятно. Спасибо')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="{{ asset('dist/images/headshot-3.jpg') }}" />
                            <figcaption class="text-center">@lang('404.Bob')</figcaption>
                        </figure>
                    </div>
                </article>

            </section>
        </div>
    </div>
</div>
@endsection