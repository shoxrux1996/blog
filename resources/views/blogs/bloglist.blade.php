@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/blog.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li class="active-link"><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

<!-- <div class="container">

	@foreach($blogs as $blog)
		<a href="{{route('web.blog.show', ['id' => $blog->id])}}">
			<div class="bg-info col-md-8" style="margin-bottom: 20px;">
				<div class="row">
					<div class="col-md-12">
						<label class="col-sm-6">{{ $blog->title }}</label>
						<div class="tags col-md-8 ">
							@foreach($blog->tags as $tag)
								<span class="label label-default"> {{ $tag->name}}</span>
							@endforeach
							<hr>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-4">
						<p>{{substr(strip_tags($blog->text),0,250)}} {{strlen(strip_tags($blog->text))>250 ? '...' : ""}}</p>
					</div>
				</div>
			</div>
		</a>
	@endforeach
		<div class="col-md-8">

			<div class="pager">
				{!! $blogs->links('pagination') !!}
			</div>
		</div>
</div> -->

<!-- Content -->
<div id="wrapper">
    <div class="container-fluid">
        <div class="row text-center">
            <h3>БЛОГ YURIDIK.UZ</h3>
        </div>
        <br />
        <div class="row">
            <!-- Posts -->
            <div class="col-sm-9">
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Модераторы</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-1.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Как работать, если подписал договор ГПХ вместо трудового</b></h5>
                                <p>В чем сложности, идет ли стаж, можно ли работать из дома — и другие детали.</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Юристы</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-2.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Что делать, если нечем платить кредит</b></h5>
                                <p>Как добраться до дна долговой ямы, оглядеться, обжиться — и успокоиться.</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Сайт</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-3.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Как составляют брачный договор умные люди</b></h5>
                                <p>Сколько у вас шансов получить жилье, деньги и свободную жизнь.</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Модераторы</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-4.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Как выбивать долги по зарплате: 3 готовых решения</b></h5>
                                <p>Ждать не стоит. У заработной платы тоже есть «срок годности».</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Юристы</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-5.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Как отказаться от навязанной страховки по кредиту</b></h5>
                                <p>Оптимальный способ получить у банка деньги — и не платить лишнего.</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="individual-blog.html">
                    <div class="col-sm-6">
                        <div class="blog-item">
                            <div class="ribbon"><span>Сайт</span></div>
                            <div class="blog-item-img">
                                <img alt="Blog item image" src="{{ asset('dist/images/blog-img-6.jpg')}}"/>
                                <div class="middle">
                                    <button class="btn btn-dark-blue text">Читать статью</button>
                                </div>
                            </div>
                            <div class="blog-item-description">
                                <h5><b>Как оформить возврат в интернет-магазин</b></h5>
                                <p>Что делать, когда не радует онлайн-покупка?</p>
                                <p class="post-info">
                                <span>
                                    <i class="fa fa-eye"></i> 124
                                </span>
                                <span class="pull-right">
                                    <i class="fa fa-comments-o"></i> 24
                                </span>
                                </p>
                            </div>
                            <hr>
                            <div class="blog-item-footer">
                            <span>
                                <i class="fa fa-user"></i> Улугбек
                            </span>
                            <span class="pull-right">
                                <i class="fa fa-calendar"></i> 10 Июль, 2017
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="text-center">
                    <button type="button" class="btn btn-default btn-lg blue-button show-others">Показать еще</button>
                </div>
            </div>
            <!-- /Posts -->

            <!-- Sidebar -->
            <div class="col-sm-3 sidebar">
                <div class="panel-group">
                    <!-- Category -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-category">
                                    Категория</a>
                            </h4>
                        </div>
                        <div id="accordion-category" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        <a href="#">Новости</a>
                                    </li>
                                    <li>
                                        <a href="#">Анализ и обзор</a>
                                    </li>
                                    <li>
                                        <a href="#">Творчество юристов</a>
                                    </li>
                                    <li>
                                        <a href="#">Новость сайта</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Category -->

                    <!-- Last posts -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-last-posts">
                                    Последние публикации</a>
                            </h4>
                        </div>
                        <div id="accordion-last-posts" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-1.jpg')}}" />
                                    <span>
                                        <b>Что делать, если нечем платить кредит</b>
                                    </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-2.jpg')}}" />
                                    <span>
                                        <b>Что делать, если нечем платить кредит</b>
                                    </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-3.jpg')}}" />
                                    <span>
                                        <b>Что делать, если нечем платить кредит</b>
                                    </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-4.jpg')}}" />
                                    <span>
                                        <b>Что делать, если нечем платить кредит</b>
                                    </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Last posts -->

                    <!-- Popular posts -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-popular-posts">
                                    Популярные статьи</a>
                            </h4>
                        </div>
                        <div id="accordion-popular-posts" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-1.jpg')}}" />
                                        <span>
                                            <b>Что делать, если нечем платить кредит</b>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-eye"></i> 100
                                        </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-2.jpg')}}" />
                                        <span>
                                            <b>Что делать, если нечем платить кредит</b>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-eye"></i> 200
                                        </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-3.jpg')}}" />
                                        <span>
                                            <b>Что делать, если нечем платить кредит</b>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-eye"></i> 300
                                        </span>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="post-mini">
                                        <img class="img-thumbnail" alt="post-mini-img" src="{{ asset('dist/images/blog-img-4.jpg')}}" />
                                        <span>
                                            <b>Что делать, если нечем платить кредит</b>
                                        </span>
                                        <span class="pull-right">
                                            <i class="fa fa-eye"></i> 400
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Popular posts -->

                    <!-- Comments -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#accordion-last-comments">
                                    Последние комментарии</a>
                            </h4>
                        </div>
                        <div id="accordion-last-comments" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <a href="#">
                                    <div class="last-comments">
                                        <img alt="last-comment-author" src="{{ asset('dist/images/headshot-1.png')}}" class="img-circle"/>
                                        <p>
                                    <span class="comment-author">
                                        <i class="fa fa-user"></i> <b>Улугбек</b>
                                    </span>
                                            <span class="comment-time"> 1 день назад</span>
                                        </p>
                                        <p class="comment-content">
                                            Начало будет традиц - этом мой первый отзыв, так что сильно не пинайте)
                                        </p>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="last-comments">
                                        <img alt="last-comment-author" src="{{ asset('dist/images/headshot-2.jpg')}}" class="img-circle"/>
                                        <p>
                                    <span class="comment-author">
                                        <i class="fa fa-user"></i> <b>Улугбек</b>
                                    </span>
                                            <span class="comment-time"> 1 день назад</span>
                                        </p>
                                        <p class="comment-content">
                                            Начало будет традиц - этом мой первый отзыв, так что сильно не пинайте)
                                        </p>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="last-comments">
                                        <img alt="last-comment-author" src="{{ asset('dist/images/headshot-3.jpg')}}" class="img-circle"/>
                                        <p>
                                    <span class="comment-author">
                                        <i class="fa fa-user"></i> <b>Улугбек</b>
                                    </span>
                                            <span class="comment-time"> 1 день назад</span>
                                        </p>
                                        <p class="comment-content">
                                            Начало будет традиц - этом мой первый отзыв, так что сильно не пинайте)
                                        </p>
                                    </div>
                                </a>
                                <hr>
                                <a href="#">
                                    <div class="last-comments">
                                        <img alt="last-comment-author" src="{{ asset('dist/images/headshot-4.jpg')}}" class="img-circle"/>
                                        <p>
                                    <span class="comment-author">
                                        <i class="fa fa-user"></i> <b>Улугбек</b>
                                    </span>
                                            <span class="comment-time"> 1 день назад</span>
                                        </p>
                                        <p class="comment-content">
                                            Начало будет традиц - этом мой первый отзыв, так что сильно не пинайте)
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Comments -->
                </div>
            </div>
            <!-- /Sidebar -->
        </div>
        <br />
        <div class="row subscribe">
            <div class="padding-30 text-center">
                <h2>Нравится журнал? Подпишись!</h2>
                <h4>Самое интересное 2 раза в месяц на ваш e-mail</h4>
                <div class="col-sm-offset-3 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control general-input" placeholder="Введите ваш email" />
                    </div>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-default dark-blue">Подписаться</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

@endsection
@endsection

