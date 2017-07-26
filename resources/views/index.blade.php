@extends('layouts.app')
@section('styles')
<link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
@endsection
@section('body')
@extends('layouts.body')
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
            <form action="main-search.html">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Поиск по юристом, вопросом и документом"/>
                <span class="input-group-btn">
                  <a class="btn btn-default" href="main-search.html">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
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
          <img src="{{ asset('dist/images/question-icon.png')}}" alt="Question icon"/>
          <a type="button" class="btn btn-default" href="{{ route('question.create')}}">Задать вопрос</a>
          <p class="statistics">50,000+</p>
          <p class="what">Отвеченных вопросов</p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
          <img src="{{ asset('dist/images/call-icon.png')}}" alt="Call icon"/>
          <a type="button" class="btn btn-default" href="order-call.html">Заказать звонок</a>
          <p class="statistics">20,00,000+</p>
          <p class="what">Обратных звонков</p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
          <img src="{{ asset('dist/images/document-icon.png')}}" class="img-responsive" alt="Document icon"/>
          <a type="button" class="btn btn-default" href="{{ route('document.create')}}">Заказать документ</a>
          <p class="statistics">40,000,000+</p>
          <p class="what">Cозданных документов</p>
        </div>
      </div>
    </div>
<!-- /Services Section -->

<!-- Questions Section -->
    <div class="container-fluid" id="questions-section">
        <h2 class="text-center">Задано <span class="total">{{$num_of_questions}}</span> вопроса</h2>
        <div class="questions-bg clearfix">
            <h3 class="category text-center">
                <button class="active btn-link" id="paid-questions">Платные </button>
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
              <!-- <a href="individual-question.html" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 18:14
                  </div>
                  <div class="total-answers">
                      8 ответов
                  </div>
                  <div class="asked-question">
                      Оформление отношений между Перевозчиком и Водителем
                  </div>
                  <div class="asked-price">
                      стоимость 800 сум
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 17:16
                  </div>
                  <div class="total-answers">
                      6 ответов
                  </div>
                  <div class="asked-question">
                      Как перевести категорию использования части земельного участка?
                  </div>
                  <div class="asked-price">
                      стоимость 1400 сум
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 15:58
                  </div>
                  <div class="total-answers">
                      6 ответов
                  </div>
                  <div class="asked-question">
                      Как получить в своё распоряжение участок земли недалеко от озера?
                  </div>
                  <div class="asked-price">
                      стоимость 589 сум
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 15:58
                  </div>
                  <div class="total-answers">
                      5 ответов
                  </div>
                  <div class="asked-question">
                      Приобретение квартиры в ипотеку на имя внука (внучки)
                  </div>
                  <div class="asked-price">
                      стоимость 500 сум
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 15:03
                  </div>
                  <div class="total-answers">
                      3 ответов
                  </div>
                  <div class="asked-question">
                      Как правильно оформить безвозмездное право использования исходного кода
                  </div>
                  <div class="asked-price">
                      стоимость 800 сум
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 14:56
                  </div>
                  <div class="total-answers">
                      5 ответов
                  </div>
                  <div class="asked-question">
                      Составление долгосрочного договора между физлицом и юридическим лицом
                  </div>
                  <div class="asked-price">
                      стоимость 1000 сум
                  </div>
              </a>-->
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
              <!-- <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 04:13
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Расторжение договорных обязательств между арендатором ООО и арендодателем ООО?
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 04:04
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Как доказать отцовство и взыкать алименты
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 03:49
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Имею ли я право уволиться?
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 03:45
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Сосед обрезал кусты вдоль дороги, аргументируя тем, что они ему мешают при выезде с участка
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 03:09
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Тонировка предписание
                  </div>
              </a>
              <a href="#" class="question clearfix">
                  <div class="asked-time">
                      Сегодня 02:55
                  </div>
                  <div class="total-answers">
                      1 ответ
                  </div>
                  <div class="asked-question">
                      Проблема не могу уснуть
                  </div>
              </a> -->
          </div>
          <a type="button" class="btn btn-default btn-lg btn-block blue-button" href="{{ route('question.list')}}">Смотреть все вопросы</a>
        </div >
    </div>
    <!-- /Questions -->

    <!-- Category Section -->
    <div class="container-fluid" id="category-section">
      <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-building"></i> Корпоративное право
                    </a>
                    <p><a href="#">регистрация ООО</a></p>
                    <p><a href="#">регистрация акционерного общества</a></p>
                    <p><a href="#">регистрация некоммерческой организации</a></p>
                    <p><a href="#">регистрация общественной организации</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="individual-category.html">
                        <i class="fa fa-users"></i> Гражданское право
                    </a>
                    <p><a href="#">договор об оказании услуг</a></p>
                    <p><a href="#">договор аренды нежилого помещения</a></p>
                    <p><a href="#">расторжение договора аренды</a></p>
                    <p><a href="#">расторжение договора купли продажи</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-drivers-license"></i> Лицензирование
                    </a>
                    <p><a href="#">арбитражный спор</a></p>
                    <p><a href="#">апелляционная жалоба в арбитражный суд</a></p>
                    <p><a href="#">обжалование решения арбитражного суда</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-building-o"></i> Недвижимость
                    </a>
                    <p><a href="#">жилищные споры</a></p>
                    <p><a href="#">доля в квартире</a></p>
                    <p><a href="#">аварийное жилье</a></p>
                    <p><a href="#">выписка из квартиры</a></p>
                    <p><a href="#">выписать ребенка из квартиры</a></p>
                    <p><a href="#">выделение доли в квартире через суд</a></p>
                    <p><a href="#">ухудшение жилищных условий</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-buysellads"></i> Защита прав потребителя
                    </a>
                    <p><a href="#">возврат товара</a></p>
                    <p><a href="#">возврат денег за товар</a></p>
                    <p><a href="#">возврат товара без чека</a></p>
                    <p><a href="#">возврат некачественного товара</a></p>
                    <p><a href="#">возврат технически сложного товара</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-car"></i> Автомобильное право
                    </a>
                    <p><a href="#">наезд на пешехода</a></p>
                    <p><a href="#">ДТП со смертельным исходом</a></p>
                    <p><a href="#">ДТП с участием пешехода</a></p>
                    <p><a href="#">оставление места ДТП</a></p>
                    <p><a href="#">тяжкий вред здоровью при ДТП</a></p>
                    <p><a href="#">возмещение ущерба при ДТП</a></p>
                    <p><a href="#">жалоба на действия сотрудника ГИБДД</a></p>
                    <p><a href="#">обжалование постановления ГИБДД</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-star"></i> Военное право
                    </a>
                    <p><a href="#">помощь военным</a></p>
                    <p><a href="#">военная ипотека</a></p>
                    <p><a href="#">военная травма</a></p>
                    <p><a href="#">служебное жилье для военнослужащих</a></p>
                    <p><a href="#">жилищный сертификат военнослужащим</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-child"></i> Семейное право
                    </a>
                    <p><a href="#">лишение родительских прав</a></p>
                    <p><a href="#">установление отцовства</a></p>
                    <p><a href="#">установление отцовства в судебном порядке</a></p>
                    <p><a href="#">оспаривание отцовства</a></p>
                    <p><a href="#">восстановление родительских прав</a></p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 categories">
                    <a href="#">
                        <i class="fa fa-shield"></i> Страхование
                    </a>
                    <p><a href="#">задержка страховой выплаты</a></p>
                    <p><a href="#">претензия в страховую компанию</a></p>
                    <p><a href="#">споры со страховой компанией</a></p>
                    <p><a href="#">расторжение договора страхования</a></p>
                    <p><a href="#">суд со страховой компанией</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center view-all-categories">
          <h3>ПОМОЩЬ ЛЮБОГО ЮРИДИЧЕСКОГО ВОПРОСА</h3>
          <p>Наши юристы дают вам
            представление и рекомендации по тысячам
            юридических вопросов.</p>
          <a type="button" class="btn  btn-dark-blue" href="{{ route('category.list')}}">Просмотреть все категории</a>
        </div>
      </div>
    </div>
    <!-- Category Section -->

    <!-- News Section -->
   <div class="container-fluid" id="news-section">
      <h1 class="text-center">Новости</h1>
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/blog-img-1.jpg')}}" alt="News 1" />
          <div class="middle">
              <a class="btn btn-dark-blue text" href="#">Читать статью</a>
          </div>
          <h4><a href="#">Карты, деньги, две претензии: что делать, если банкомат съел зарплату</a></h4>
          <p>Полезные советы, чтобы остаться дома и вернуть свои деньги.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/blog-img-2.jpg')}}" alt="News 2" />
          <div class="middle">
              <a class="btn btn-dark-blue text" href="#">Читать статью</a>
          </div>
          <h4><a href="#">Задержка рейса: как поесть и выспаться за счет авиакомпании</a></h4>
          <p>Полезные советы, чтобы остаться дома и вернуть свои деньги.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/blog-img-3.jpg')}}" alt="News 3" />
          <div class="middle">
            <a class="btn btn-dark-blue text" href="#">Читать статью</a>
          </div>
          <h4><a href="#">Как вернуть путевку, если перепутали Северную Корею с Южной?</a></h4>
          <p>Полезные советы, чтобы остаться дома и вернуть свои деньги.</p>
        </div>
      </div>
        <div class="row text-center">
            <a type="button" class="btn  btn-dark-blue" href="">
                <i class="fa fa-book" aria-hidden="false"></i> Все статьи
            </a>
        </div>
    </div>
    <!-- /News Section -->

    <!-- Lawyers Section -->
      <div class="container-fluid text-center" id="lawyers-section">
        <h2>Консультации от <span class="total">{{$num_of_lawyers}}</span> юристов и адвокатов</h2>
        <h5>Наши юристы — профессионалы, которые обладают знаниями законодательной базы и богатой судебной практикой. Поэтому, обращаясь за бесплатной юридической консультацией, вы получите грамотный и обоснованный ответ.</h5>
        <div class="row" id="gallery">
            <div id="lawyers-carousel" class="crsl-nav">
                <a href="#" class="previous">Previous</a>
                <a href="#" class="next">Next</a>
            </div>
            <div class="crsl-items" data-navigation="lawyers-carousel">
                <div class="crsl-wrap">
                    <figure class="crsl-item crsl-active">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-1.png')}}" alt="headshot 1" class="img-responsive center-block" />
                                <h4>Керс Олег</h4>
                                <h5>г. Санкт-Петербург</h5>
                                <hr class="green-divider">
                                <p><span class="total">1760</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-2.jpg')}}" alt="headshot 2" class="img-responsive center-block"/>
                                <h4>Гудкова Галина</h4>
                                <h5>г. Москва</h5>
                                <hr class="green-divider">
                                <p><span class="total">800</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-3.jpg')}}" alt="headshot 3" class="img-responsive center-block"/>
                                <h4>Рябинин Олег</h4>
                                <h5>г. Сыктывкар</h5>
                                <hr class="green-divider">
                                <p><span class="total">1141</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-4.jpg')}}" alt="headshot 4" class="img-responsive center-block"/>
                                <h4>Унароков Тимур</h4>
                                <h5>г. Воронеж</h5>
                                <hr class="green-divider">
                                <p><span class="total">1430</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-5.jpg')}}" alt="headshot 5" class="img-responsive center-block"/>
                                <h4>Петров Михаил</h4>
                                <h5>г. Саратов</h5>
                                <hr class="green-divider">
                                <p><span class="total">3122</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item crsl-active">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-1.png')}}" alt="headshot 1" class="img-responsive center-block" />
                                <h4>Керс Олег</h4>
                                <h5>г. Санкт-Петербург</h5>
                                <hr class="green-divider">
                                <p><span class="total">1760</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-2.jpg')}}" alt="headshot 2" class="img-responsive center-block"/>
                                <h4>Гудкова Галина</h4>
                                <h5>г. Москва</h5>
                                <hr class="green-divider">
                                <p><span class="total">800</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-3.jpg')}}" alt="headshot 3" class="img-responsive center-block"/>
                                <h4>Рябинин Олег</h4>
                                <h5>г. Сыктывкар</h5>
                                <hr class="green-divider">
                                <p><span class="total">1141</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-4.jpg')}}" alt="headshot 4" class="img-responsive center-block"/>
                                <h4>Унароков Тимур</h4>
                                <h5>г. Воронеж</h5>
                                <hr class="green-divider">
                                <p><span class="total">1430</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                    <figure class="crsl-item">
                        <div class="lawyer text-center">
                            <a href="#">
                                <img src="{{ asset('dist/images/headshot-5.jpg')}}" alt="headshot 5" class="img-responsive center-block"/>
                                <h4>Петров Михаил</h4>
                                <h5>г. Саратов</h5>
                                <hr class="green-divider">
                                <p><span class="total">3122</span> благодарностей</p>
                            </a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
        <a type="button" class="btn  btn-dark-blue" href="{{ route('lawyers.list')}}">Все юристы проекта</a>
      </div>
    <!-- Lawyers Section -->

    <!-- About Us Section -->
      <div class="container-fluid" id="about-us-section">
        <h1 class="text-center">О нас</h1>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="video-wrapper">
              <iframe class="youtube-player" type="text/html" width="600" height="385" src="https://www.youtube.com/embed/lUIx9i63y8M" frameborder="0"> </iframe>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <h4>Профессиональная юридическая помощь в любой точке мира</h4>
            <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность ошибок и вам нужна помощь?</p>
            <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность ошибок и вам нужна помощь?</p>
            <p>У вас возникла необходимость в квалифицированной правовой поддержке? Не знаете, где получить консультацию юриста, и нет времени для посещения адвокатских контор? Вы пытались самостоятельно изучать законодательство, искать ответы на юридические вопросы, но понимаете, что велика вероятность ошибок и вам нужна помощь?</p>
          </div>
        </div>
      </div>
    <!-- /About Us Section -->
@endsection
@section('scripts')
<!-- responsiveCarousel.js -->
  <script src="{{ asset('dist/js/responsiveCarousel.min.js')}}"></script>
@endsection
@endsection