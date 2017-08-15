@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
@endsection

@section('menu')
    <li class="active-link"><a href="{{ route('home')}}">Главная</a></li>
    <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
    <li><a href="{{ route('question.list')}}">Вопросы</a></li>
    <li><a href="{{ route('web.blogs')}}">Блог</a></li>
    <li><a href="{{ route('how-works')}}">Как это работает</a></li>
    <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

    <!-- Search Section -->
    <div class="container-fluid" id="search-section">
        <div class="row">
            <div class="col-md-4">
                <h1>Уверенность в каждом решении</h1>
                <form action="{{route('search.all')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Поиск по юристом, вопросом и документом"/>
                        <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" >
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                      </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Search Section -->

    <!-- Services Section -->
    <div class="container-fluid" id="services-section">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset( 'dist/images/question-icon.png')}}" alt="Question icon"/>
                <a type="button" class="btn btn-default" href="{{ route('question.create')}}">Задать вопрос</a>
                <p class="statistics">50,000+</p>
                <p class="what">Отвеченных вопросов</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset('dist/images/call-icon.png')}}" alt="Call icon"/>
                {{--href="{{ route('call.create')}}"--}}
                <a type="button" class="btn btn-default" data-toggle="modal" data-target="#call-function">Заказать звонок</a>
                <p class="statistics">20,00,000+</p>
                <p class="what">Обратных звонков</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset('dist/images/document-icon.png')}}" class="img-responsive" alt="Document icon"/>
                {{--href="{{ route('document.create')}}"--}}
                <a type="button" class="btn btn-default" data-toggle="modal" data-target="#document-function">Заказать документ</a>
                <p class="statistics">40,000,000+</p>
                <p class="what">Cозданных документов</p>
            </div>
        </div>
    </div>

    <!-- Modal for call function-->
    <div id="call-function" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Скоро!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>Функция "заказать звонок" в процессе разработки</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">Закрыть</button>
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
                    <h4 class="modal-title">Скоро!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>Функция "заказать документ" в процессе разработки</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue" data-dismiss="modal">Закрыть</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal for document function-->

    <!-- /Services Section -->

    <!-- Questions Section -->
    <div class="container-fluid" id="questions-section">
        <h2 class="text-center">Задано <span class="total">{{$num_of_questions}}</span> вопроса</h2>
        <div class="questions-bg clearfix">
            <h3 class="category text-center">
                <button class="active btn-link" id="paid-questions">Платные</button>
                <span>
                     <button class="not-active btn-link" id="free-questions">Бесплатные</button>
                </span>
            </h3>
            <div id="paid-question-block">
                @foreach($paid_question_examples as $var)
                    <a href="{{ route('web.question.show',['id' => $var->id])}}" class="question clearfix">
                        <div class="asked-time">
                            {{$var->created_at}}
                        </div>
                        <div class="total-answers">
                            {{$var->countAnswers()}} ответов
                        </div>
                        <div class="asked-question">
                            {{$var->title}}
                        </div>
                        <div class="asked-price">
                            стоимость {{$var->price}} сум
                        </div>
                    </a>
                @endforeach
            </div>
            <div id="free-question-block" class="hidden">
                @foreach($free_question_examples as $var)
                    <a href="{{ route('web.question.show',['id' => $var->id])}}" class="question clearfix">
                        <div class="asked-time">
                            {{$var->created_at}}
                        </div>
                        <div class="total-answers">
                            {{$var->countAnswers()}} ответов
                        </div>
                        <div class="asked-question">
                            {{$var->title}}
                        </div>
                    </a>
                @endforeach
            </div>
            <a type="button" class="btn btn-default btn-lg btn-block btn-dark-blue" href="{{ route('question.list')}}">Смотреть
                все вопросы</a>
        </div>
    </div>
    <!-- /Questions -->

    <!-- Category Section -->
    <div class="container-fluid" id="category-section">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                @for($i=0; $i<$categories->count(); $i+=3)
                    <div class="row">
                        @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                            <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                <a href="{{route('web.category.show', [$categories[$j]->name])}}">
                                    <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name}}
                                </a>
                                @foreach($categories[$j]->children as $subcategory)
                                    <p><a href="{{route('web.category.show', [$subcategory->name])}}">{{$subcategory->name}}</a></p>
                                @endforeach
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>
            <div class="col-md-3 text-center view-all-categories">
                <h3>ПОМОЩЬ ЛЮБОГО ЮРИДИЧЕСКОГО ВОПРОСА</h3>
                <p>Наши юристы дают вам
                    представление и рекомендации по тысячам
                    юридических вопросов.</p>
                <a type="button" class="btn  btn-dark-blue" href="{{ route('category.list')}}">Просмотреть все
                    категории</a>
            </div>
        </div>
    </div>
    <!-- Category Section -->

    <!-- News Section -->
    <div class="container-fluid" id="news-section">
        <h1 class="text-center">Блоги</h1>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4">
                    @if($blog->file != null)
                        <img class="img-responsive img-thumbnail" src="{{ asset($blog->file->path.$blog->file->file)}}" alt="{{$blog->title}}"/>
                    @else
                        <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/blog-img-2.jpg')}}" alt="News 2"/>
                    @endif
                    <div class="middle">
                        <a class="btn btn-dark-blue text" href="{{route('web.blog.show', $blog->id)}}">Читать статью</a>
                    </div>
                    <h4><a href="{{route('web.blog.show', $blog->id)}}">{{substr($blog->title,0,50)}} {{strlen($blog->title) > 50 ? '...' : ""}}</a></h4>
                    <p>{{substr(strip_tags($blog->text),0,80)}} {{strlen(strip_tags($blog->text))>80 ? '...' : ""}}</p>
                </div>
            @endforeach

        </div>
        <div class="row text-center">
            <a type="button" class="btn  btn-dark-blue" href="{{route('web.blogs')}}">
                <i class="fa fa-book" aria-hidden="false"></i> Все статьи
            </a>
        </div>
    </div>
    <!-- /News Section -->

    <!-- Lawyers Section -->
    <div class="container-fluid text-center" id="lawyers-section">
        <h2>Консультации от <span class="total">{{$num_of_lawyers}}</span> юристов и адвокатов</h2>
        <h5>Наши юристы — профессионалы, которые обладают знаниями законодательной базы и богатой судебной практикой.
            Поэтому, обращаясь за бесплатной юридической консультацией, вы получите грамотный и обоснованный ответ.</h5>
        <div class="row" id="gallery">
            <div id="lawyers-carousel" class="crsl-nav">
                <a href="#" class="previous">Previous</a>
                <a href="#" class="next">Next</a>
            </div>
            <div class="crsl-items" data-navigation="lawyers-carousel">
                <div class="crsl-wrap">
                    @foreach($lawyers as $lawyer)
                        <figure class="crsl-item crsl-active">
                            <div class="lawyer text-center">
                                <a href="{{route('web.lawyer.show', $lawyer->id)}}">
                                    <img src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}" alt="headshot 1"
                                         class="img-responsive center-block"/>
                                    <h4>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h4>
                                    <h5>г. {{$lawyer->user->city->name}}</h5>
                                    <hr class="green-divider">
                                    <p><span class="total">{{$lawyer->feedbacks->count()}}</span> благодарностей</p>
                                </a>
                            </div>
                        </figure>
                    @endforeach


                </div>
            </div>
        </div>
        <a type="button" class="btn  btn-dark-blue" href="{{ route('lawyers.list')}}">Все юристы проекта</a>
    </div>
    <!-- Lawyers Section -->

    <!-- About Us Section -->
    <div class="container-fluid" id="about-us-section">
        <h1 class="text-center">О нас</h1>
        <div class="row" style="clear: both; overflow: hidden;">
            <div class="col-md-6 col-sm-6">
                <video width="100%" height="385" controls>
                    <source src="{{asset('dist/videos/test-youtube-video.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4>Профессиональная юридическая помощь в любой точке мира</h4>
                <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить
                    консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно
                    изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность
                    ошибок и вам нужна помощь?</p>
                <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить
                    консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно
                    изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность
                    ошибок и вам нужна помощь?</p>
                <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить
                    консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно
                    изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность
                    ошибок и вам нужна помощь?</p>
            </div>
        </div>
    </div>
    <!-- /About Us Section -->
@endsection
@section('scripts')
    <!-- responsiveCarousel.js -->
    <script src="{{ asset('dist/js/responsiveCarousel.min.js')}}"></script>
@endsection