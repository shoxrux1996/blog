@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/faq.css')}}" rel="stylesheet">
@endsection
@section('menu')
    <li class="active-link"><a href="{{ route('home')}}">@lang('index.home')</a></li>
    <li><a href="{{ route('lawyers.list')}}">@lang('index.lawyers')</a></li>
    <li><a href="{{ route('question.list')}}">@lang('index.questions')</a></li>
    <li><a href="{{ route('web.blogs')}}">@lang('index.blog')</a></li>
    <li><a href="{{ route('how-works')}}">@lang('index.howworks')</a></li>
    <li><a href="{{ route('about')}}">@lang('index.aboutus')</a></li>
@endsection
@section('content')

    <!-- Content -->
    <div id="wrapper">
        <div class="container" id="faq">
            <div class="row padding-30 background-white">
                <h3>КАК ЭТО РАБОТАЕТ</h3>
                <h6>
                    <b>Здесь вы можете ознакомиться с частыми вопросами, связанными с работой сайта.</b>
                </h6>

                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    <!-- Client tab -->
                    <li class="active"><a data-toggle="tab" href="#client">Я клиент</a></li>
                    <!-- /Client tab -->

                    <!-- Lawyer tab -->
                    <li><a data-toggle="tab" href="#lawyer">Я юрист</a></li>
                    <!-- /Lawyer tab -->
                </ul>
                <!-- /Tabs -->

                <!-- Tab content -->
                <div class="tab-content">
                    <!-- Client tab content -->
                    <div id="client" class="tab-pane fade in active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-container">
                                    <!-- Tab menu -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                        <div class="list-group">
                                            <a href="#accordion-client-1" class="list-group-item active text-center">
                                                Регистрация и Вход
                                            </a>
                                            <a href="#accordion-client-2" class="list-group-item text-center">
                                                Работа с вопросом
                                            </a>
                                            <a href="#accordion-client-3" class="list-group-item text-center">
                                                Онлайн консультации
                                            </a>
                                            <a href="#accordion-client-4" class="list-group-item text-center">
                                                Редактирование профиля
                                            </a>
                                            <a href="#accordion-client-5" class="list-group-item text-center">
                                                Пополнение баланса
                                            </a>
                                            <a href="#accordion-client-6" class="list-group-item text-center">
                                                Прием платежей за услуги
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /Tab menu -->

                                    <!-- Tab items -->
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                                        <!-- Menu 1 -->
                                        <div class="bhoechie-tab-content active" id="accordion-client-1">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-1" href="#accordion-client-1-1">
                                                                Как зарегистрироваться на сайте? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-1-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Для того, чтобы <a href="../../../../../Users/Erkin/Desktop/Yuridik/register.html">зарегистрироваться</a> на сайте, Вам необходимо пройти процедуру регистрации либо
                                                            <a href="../../../../../Users/Erkin/Desktop/Yuridik/ask-question.html">задать вопрос</a> через форму подачи вопроса. После этого Вам на почту будут высланы Ваш логин и пароль для
                                                            <a href="../../../../../Users/Erkin/Desktop/Yuridik/login.html">входа</a> на сайт.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-1" href="#accordion-client-1-2">
                                                                Как войти на сайт с помощью социальных сетей? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-1-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Для того, чтобы <a href="../../../../../Users/Erkin/Desktop/Yuridik/login.html">войти</a> на сайт с помощью аккаунта в социальных сетях, Вам необходимо нажать кнопку «Вход» на главной странице и выбрать ту социальную сеть, в которой у Вас есть аккаунт. Далее Вы вводите необходимые логин и пароль, после чего будете авторизованы на сайте.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 1 -->

                                        <!-- Menu 2 -->
                                        <div class="bhoechie-tab-content"  id="accordion-client-2">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-1">
                                                                Как задать вопрос? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Задать вопрос Вы можете выбрав пункт «Задать вопрос» в главном меню, либо вписав текст вопроса в форму на главной странице сайта. После этого Вы будете перенаправлены на страницу подачи вопроса.
                                                            Пройдите несколько простых шагов, заполнив необходимые поля, отмеченные красной звездочкой.
                                                            После этого Ваш вопрос будет опубликован на сайте.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-2">
                                                                При подаче вопроса я ввожу свой электронный адрес, а меня просят ввести пароль. Что это? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Это значит, что когда-то Вы уже задавали вопрос или регистрировались, используя этот адрес электронной почты. Вам надо ввести пароль, чтобы задать вопрос под этим же адресом. Если Вы не помните пароль, воспользуйтесь ссылкой для восстановления пароля.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-3">
                                                                Что такое «Приватный вопрос»? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Приватным можно сделать только платный вопрос. Если при подаче вопроса Вы выбрали «Платный вопрос» и поставили галочку в пункте «Приватный вопрос», то этот вопрос будет виден только зарегистрированным юристам. Клиенты и гости сайта не смогут увидеть текст Вашего вопроса и ответы на него.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-4">
                                                                Как найти вопрос, который я задал несколько дней (недель, месяцев) назад? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-4" class="panel-collapse collapse">
                                                        <div class="panel-body">Найти вопрос, который Вы задали какое-то время назад можно двумя способами.
                                                            Способ первый. Когда Вы задаете вопрос, на указанный адрес электронной почты высылается письмо. В нем есть ссылка на ваш вопрос вида http://pravoved.ru/question/312/. Перейдя по этой ссылке, Вы сможете просматривать Ваш вопрос.
                                                            Способ второй. Авторизируйтесь на сайте, нажав на кнопку «Вход» в правой верхней части экрана. Введите ваш email и пароль (если Вы не помните свой пароль, воспользуйтесь ссылкой для восстановления пароля). После того, как Вы авторизовались, перейдите в Личный кабинет и в левом меню выберите «Ваши консультации». В этом разделе находятся все вопросы, которые Вы когда-либо задавали.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-5">
                                                                Зачем делать вопрос платным? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-5" class="panel-collapse collapse">
                                                        <div class="panel-body">Когда Вы выбираете платный вопрос, он закрепляется на главной странице. Публикация платного вопроса значительно увеличивает качество и скорость предоставления консультации от юристов.
                                                            Кроме того, платный вопрос можно сделать «Приватным» (см. «Что такое приватный вопрос?»).</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-6">
                                                                Зачем оплачивать чужой бесплатный вопрос? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-6" class="panel-collapse collapse">
                                                        <div class="panel-body">Если Вы нашли на сайте бесплатный вопрос, аналогичный тому, который хотели бы задать сами, при этом ответ юриста отсутствует, Вы можете оплатить вопрос и получить более качественную консультацию от специалистов.?</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-7">
                                                                Как пожаловаться на ответ специалиста? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-7" class="panel-collapse collapse">
                                                        <div class="panel-body">Наши специалисты всегда дают максимально точные и развернутые ответы. Но иногда возникают ситуации, когда Вам необходимо пожаловаться на сообщение (например, на спам от только что зарегистрированного специалиста или на некорректное поведение). Для этих целей мы разместили кнопки оценки ответа юриста, тем самым дали возможность автору вопроса и другим зарегистрированным юристам поставить оценку ответу специалиста.
                                                            Возможность пожаловаться в арбитраж есть только в случае оказания персональной консультации.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-8">
                                                                Как правильно определить стоимость вопроса? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-8" class="panel-collapse collapse">
                                                        <div class="panel-body">Для того, чтобы юрист быстро и максимально качественно мог ответить на Ваш вопрос, мы рекомендуем Вам обратить внимание на оценку стоимости вопроса.
                                                            Конечно, каждая юридическая ситуация по-своему уникальна и имеет свои нюансы и тонкости. На проекте мы условно разделяем все вопросы юристам на три категории:
                                                            Легкий вопрос
                                                            Обычно это стандартная, типовая ситуация, решением которой может стать короткий ответ юриста, исходя из его базы юридических знаний (законы, кодексы и т.д.). Подобные ситуации не имеют особых нюансов и не требуют уточнений.
                                                            Обычный вопрос
                                                            Большинство юридических случаев, несмотря на внешнюю стандартность, имеют свои особенности, что автоматически требует более глубокого изучения юристом всех деталей вопроса. Эта ситуация подразумевает уточнения и наводящие вопросы.
                                                            Сложный вопрос
                                                            Сложные вопросы подразумевают неоднозначные толкования с точки зрения закона. Такие случаи требуют коллегиального решения и детального изучения документов.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-9">
                                                                Зачем мне выбирать несколько юристов для ответа на свой вопрос? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-9" class="panel-collapse collapse">
                                                        <div class="panel-body">Чем больше количество юристов, отвечающих на ваш вопрос, тем меньше вероятность юридической ошибки. Существуют такие вопросы, к решению которых можно подойти с разных сторон, и мнения юристов по ним могут существенно различаться. Если при решении таких вопросов Вы выбираете для ответа нескольких юристов, то Вы даете возможность принять коллегиальное решение, которое с большей вероятностью окажется верным, и при вынесении которого будут изучены все стороны Вашего вопроса.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-10">
                                                                Что такое срочный вопрос? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-10" class="panel-collapse collapse">
                                                        <div class="panel-body">Если Вы выбираете данную опцию при подаче вопроса, Вы гарантированно получаете ответ от юристов в течение нескольких минут (в будние дни с 10:00 до 19:00 МСК).</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-11">
                                                                Что дает мнение члена Экспертного совета? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-11" class="panel-collapse collapse">
                                                        <div class="panel-body">Экспертный совет — это 20 лучших юристов нашего проекта. Это самые опытные, надежные и грамотные юристы, которые заслужили наше доверие своими качественными ответами. Поэтому при выборе мнения члена Экспертного совета, Вы гарантированно получаете качественный и развернутый ответ на Ваш вопрос, который позволяет свести риск юридической ошибки к минимуму.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-12">
                                                                Зачем мне распределять гонорар? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-12" class="panel-collapse collapse">
                                                        <div class="panel-body">Если Вы получили необходимые ответы юристов и считаете, что Ваш вопрос решен, нажмите на кнопку "Распределить гонорар" и разделите вознаграждение между теми юристами, ответы которых, как Вы считаете, Вам помогли.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-2" href="#accordion-client-2-13">
                                                                Мой вопрос не прошел модерацию. В чем причина? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-2-13" class="panel-collapse collapse">
                                                        <div class="panel-body">Модератор может удалить вопрос если:
                                                            <ul>
                                                                <li>один и тот же вопрос задан повторно;</li>
                                                                <li>текст вопроса набран заглавными буквами (обычно это происходит если нажата кнопка Caps Lock);</li>
                                                                <li>текст набран прописными и строчными буквами вперемешку («вОТ тАкИм оБрАзОм») или буквами разных алфавитов («slеdующiм оbраzом»);</li>
                                                                <li>текст вопроса содержит большое количество грамматических и/или синтаксических ошибок;</li>
                                                                <li>в тексте есть явная или скрытая грубость, хамство, оскорбления, нецензурная лексика, в том числе и скрытая за спецсимволами;</li>
                                                                <li>заголовок не отражает суть вопроса (неинформативен), например: «Помогите!», «У меня проблема!», «Крик души!» и т. п;</li>
                                                                <li>заголовок вопроса перегружен знаками препинания (более трех подряд), например: «Как оформить алименты?????».</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 2 -->

                                        <!-- Menu 3 -->
                                        <div class="bhoechie-tab-content"  id="accordion-client-3">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-3" href="#accordion-client-3-1">
                                                                Зачем нужен чат? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-3-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Чат позволяет любому зарегистрированному пользователю запросить платную консультацию у конкретного юриста, а также обсудить ее стоимость и сроки оказания. Если клиент остался не удовлетворен ответом юриста, он может подать жалобу на данного юриста в арбитраж.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-3" href="#accordion-client-3-2">
                                                                Как получить консультацию юриста? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-3-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Вы выбираете понравившегося Вам юриста в разделе «Каталог юристов» или на любой странице проекта и нажимаете на кнопку «Общаться в чате».
                                                            Далее Вы сообщаете юристу о своей проблеме в краткой форме и уточняете стоимость и длительность консультации. Далее Вы нажимаете кнопку «Запросить консультацию», после чего заполняете необходимые поля и нажимаете кнопку «Запросить». После того, как юрист согласился оказать Вам консультацию, Вы нажимаете кнопку «Оплатить» (чтобы оплатить консультацию, у Вас должна быть необходимая сумма на счету Правовед.RU). После нажатия кнопки «Оплатить», необходимая сумма на Вашем счету замораживается. Далее Вы общаетесь с юристом в рамках Вашей проблемы, и по окончании диалога юрист завершает консультацию. После этого момента замороженная сумма с Вашего счета переводится на счет юриста.
                                                            Если консультация не была оказана должным образом (юрист тянул время, вел себя неадекватно и пр.), Вы можете пожаловаться в службу поддержки пользователей support@pravoved.ru.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 3 -->

                                        <!-- Menu 4 -->
                                        <div class="bhoechie-tab-content" id="accordion-client-4">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="accordion-client-4" href="#accordion-client-4-1">
                                                                Как изменить имя или фамилию? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-4-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Если у Вас появилась необходимость изменить имя или фамилию, Вам необходимо написать письмо в службу поддержки пользователей с адреса электронной почты, указанного при регистрации. В письме укажите необходимые изменения.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 4 -->

                                        <!-- Menu 5 -->
                                        <div class="bhoechie-tab-content" id="accordion-client-5">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-5" href="#accordion-client-5-1">
                                                                Как пополнить счет? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-5-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Вам необходимо перейти в раздел Личный кабинет>Финансы. Далее Вы выбираете вкладку «Пополение счета» в правом верхнем углу. Затем указываете сумму, которую хотите внести на счет, и способ пополнения (Банковская карта, SMS, электронные деньги и пр.). Если у Вас есть промо-код, Вы вводите его в необходимое поле и нажимаете «Продолжить». Далее Вы будете перенаправлены на сайт платежной системы, где после внесения необходимых данных будет произведена оплата.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-5" href="#accordion-client-5-2">
                                                                Что делать, если произошла ошибка при использовании сервиса оплаты? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-5-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Если при оплате вопроса или пополнении счета у Вас произошла ошибка, напишите письмо на адрес support@pravoved.ru с описанием ошибки. В письме укажите электронный адрес, который Вы указали при регистрации, способ оплаты, который Вы выбрали, и сумму, которую Вы бы хотели положить на счет.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-5" href="#accordion-client-5-3">
                                                                Безопасность платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-5-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Безопасность платежей с помощью банковских карт обеспечивается технологиями защищенного соединения HTTPS и двухфакторной аутентификации пользователя 3D Secure.
                                                            В соответствии с ФЗ «О защите прав потребителей» в случае, если вам была оказана услуга или реализован товар ненадлежащего качества, платеж может быть возвращен на банковскую карту, с которой производилась оплата.
                                                            Подробнее о порядке возврата средств https://pravoved.ru/guarantees/</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 5 -->

                                        <!-- Menu 6 -->
                                        <div class="bhoechie-tab-content" id="accordion-client-6">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-6" href="#accordion-client-6-1">
                                                                Платежи. Оплата банковской картой онлайн <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-6-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Наш сайт подключен к интернет-эквайрингу, и вы можете оплатить услугу банковской картой Visa или Mastercard. При оплате услуги откроется защищенное окно с платежной страницей процессингового центра CloudPayments, где вам необходимо ввести данные вашей банковской карты. Для дополнительной аутентификации держателя карты используется протокол 3D Secure. Если ваш банк поддерживает данную технологию, вы будете перенаправлены на его сервер для дополнительной идентификации. Информацию о правилах и методах дополнительной идентификации уточняйте в банке, выдавшем вам банковскую карту.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-6" href="#accordion-client-6-2">
                                                                Гарантии безопасности <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-6-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Процессинговый центр CloudPayments защищает и обрабатывает данные вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.
                                                            В случае, если у вас есть вопросы по совершенному платежу, вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-6" href="#accordion-client-6-3">
                                                                Безопасность онлайн платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-6-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению. Данные вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.
                                                            Безопасность обработки Интернет-платежей гарантирует ООО «КлаудПэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-client-6" href="#accordion-client-6-4">
                                                                Возврат средств за услуги <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-client-6-4" class="panel-collapse collapse">
                                                        <div class="panel-body">В соответствии с ФЗ «О защите прав потребителей» в случае, если вам была оказана услуга или реализован товар ненадлежащего качества, платеж может быть возвращен на банковскую карту, с которой производилась оплата.
                                                            Подробнее о порядке возврата средств https://pravoved.ru/guarantees/</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 6 -->

                                    </div>
                                    <!-- /Tab items -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Client tab content -->

                    <!-- Lawyer tab -->
                    <div id="lawyer" class="tab-pane fade">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-container">
                                    <!-- Tab menu -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                        <div class="list-group">
                                            <a href="#accordion-lawyer-1" class="list-group-item active text-center">
                                                Регистрация и Вход
                                            </a>
                                            <a href="#accordion-lawyer-2" class="list-group-item text-center">
                                                Работа с вопросом
                                            </a>
                                            <a href="#accordion-lawyer-3" class="list-group-item text-center">
                                                Онлайн консультации
                                            </a>
                                            <a href="#accordion-lawyer-4" class="list-group-item text-center">
                                                Редактирование профиля и Личный кабинет
                                            </a>
                                            <a href="#accordion-lawyer-5" class="list-group-item text-center">
                                                Рейтинг и репутация
                                            </a>
                                            <a href="#accordion-lawyer-6" class="list-group-item text-center">
                                                Управление балансом
                                            </a>
                                            <a href="#accordion-lawyer-7" class="list-group-item text-center">
                                                Совет экспертов
                                            </a>
                                            <a href="#accordion-lawyer-8" class="list-group-item text-center">
                                                Возможности юридической компании
                                            </a>
                                            <a href="#accordion-lawyer-9" class="list-group-item text-center">
                                                Виртуальная валюта
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /Tab menu -->

                                    <!-- Tab items -->
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                                        <!-- Menu 1 -->
                                        <div class="bhoechie-tab-content active"  id="accordion-lawyer-1">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-1" href="#accordion-lawyer-1-1">
                                                                Как зарегистрироваться на сайте? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-1-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Для того, чтобы <a href="../../../../../Users/Erkin/Desktop/Yuridik/register.html">зарегистрироваться</a> на сайте, Вам необходимо пройти процедуру регистрации либо
                                                            <a href="../../../../../Users/Erkin/Desktop/Yuridik/ask-question.html">задать вопрос</a> через форму подачи вопроса. После этого Вам на почту будут высланы Ваш логин и пароль для
                                                            <a href="../../../../../Users/Erkin/Desktop/Yuridik/login.html">входа</a> на сайт.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-1" href="#accordion-lawyer-1-2">
                                                                Как войти на сайт с помощью социальных сетей? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-1-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Для того, чтобы <a href="../../../../../Users/Erkin/Desktop/Yuridik/login.html">войти</a> на сайт с помощью аккаунта в социальных сетях, Вам необходимо нажать кнопку «Вход» на главной странице и выбрать ту социальную сеть, в которой у Вас есть аккаунт. Далее Вы вводите необходимые логин и пароль, после чего будете авторизованы на сайте.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 1 -->

                                        <!-- Menu 2 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-2">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-1">
                                                                Платежи. Оплата банковской картой онлайн <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Наш сайт подключен к интернет-эквайрингу, и вы можете оплатить услугу банковской картой Visa или Mastercard. При оплате услуги откроется защищенное окно с платежной страницей процессингового центра CloudPayments, где вам необходимо ввести данные вашей банковской карты. Для дополнительной аутентификации держателя карты используется протокол 3D Secure. Если ваш банк поддерживает данную технологию, вы будете перенаправлены на его сервер для дополнительной идентификации. Информацию о правилах и методах дополнительной идентификации уточняйте в банке, выдавшем вам банковскую карту.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-2">
                                                                Как найти вопросы, которые мне интересны? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Вы можете выбрать интересующие вас вопросы на главной странице нашего сайта либо через раздел «Лента консультаций» (здесь можно использовать различные параметры поиска).</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-3">
                                                                Могу ли я зарабатывать деньги, отвечая на вопросы? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Конечно! Это одна из основных функций проекта Правовед.RU — предоставить юристам возможность работать и зарабатывать удаленно, вне зависимости от их местоположения.
                                                            Вы можете зарабатывать деньги, отвечая на платные вопросы, которые публикуют клиенты, или предоставляя персональные консультации в онлайн-чате.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-4">
                                                                Что необходимо для ответа на платный вопрос? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-4" class="panel-collapse collapse">
                                                        <div class="panel-body">Для ответа на платный вопрос юристу необходимо выполнить следующие условия: подтвердить свое образование через соответствующую вкладку в Личном кабинете; набрать рейтинг в 250 пунктов или больше; заработать репутацию 3 звезды и более.
                                                            Про то, что такое репутация и рейтинг, Вы можете прочесть в соответствующем разделе.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-5">
                                                                Какая комиссия сайта Правовед.RU? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-5" class="panel-collapse collapse">
                                                        <div class="panel-body">Правовед.RU взимает комиссию в размере 30% от базовой стоимости вопроса и 30% от суммы персональной консультации в онлайн-чате.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-2" href="#accordion-lawyer-2-6">
                                                                Если на платный вопрос ответили несколько юристов, кому достанутся деньги? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-2-6" class="panel-collapse collapse">
                                                        <div class="panel-body">Если клиент сам решит закрыть вопрос после получения нескольких консультаций, ему будет предложено выбрать одного или нескольких специалистов, которые ему помогли, и чьи ответы он (клиент) посчитал полезными.
                                                            Если клиент выбрал нескольких специалистов, у него есть возможность распределить вознаграждение между ними в любом процентном соотношении.
                                                            Если клиент выбрал одного специалиста, этот специалист получит всю сумму вознаграждения.
                                                            По истечении 3 дней, если клиент не закрыл вопрос, но при этом на него были даны ответы, к закрытию вопроса подключается Совет экспертов (см. Совет экспертов). Члены Совета экспертов голосуют за ответы, которые они считают правильными. После того, как наберется 5 голосов членов Совета экспертов, вопрос считается закрытым. Гонорар распределяется в процентном соотношении между ответившими на вопрос в зависимости от голосов СЭ. Если член СЭ отвечал на вопрос, он в распределении гонорара участия не принимает. Все это время пользователь имеет приоритет при закрытии вопроса. Остальные специалисты, участвовавшие в консультации, увеличивают свой рейтинг.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 2 -->

                                        <!-- Menu 3 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-3">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-3" href="#accordion-lawyer-3-1">
                                                                Зачем нужен чат? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-3-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Чат позволяет любому зарегистрированному пользователю запросить платную консультацию у конкретного юриста, а также обсудить ее стоимость и сроки оказания. Если клиент остался не удовлетворен ответом юриста, он может подать жалобу на данного юриста в арбитраж.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-3" href="#accordion-lawyer-3-2">
                                                                Гарантии безопасности <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-3-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Процессинговый центр CloudPayments защищает и обрабатывает данные вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.
                                                            В случае, если у вас есть вопросы по совершенному платежу, вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-3" href="#accordion-lawyer-3-3">
                                                                Как оказать консультацию пользователю?<b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-3-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Существует два варианта действий, чтобы начать онлайн консультацию: клиент выбирает Вас, или Вы предлагаете клиенту платную консультацию, нажав на кнопку "Сообщение".
                                                            Далее клиент сообщает Вам о своей проблеме в краткой форме и уточняет стоимость и длительность консультации. Далее клиент либо сам запрашивает у Вас консультацию, и Вы соглашаетесь с условиями, либо Вы нажимаете кнопку «Начать консультацию», заполняете необходимые поля и нажимаете кнопку «Предложить». После того как пользователь подтвердил условия и оплатил консультацию, Вы увидите соответствующее сообщение. Деньги на счету клиента замораживаются. Далее Вы общаетесь с клиентом в рамках его вопроса и, по окончании диалога, завершаете консультацию. После этого момента замороженная сумма со счета клиента переводится на Ваш счет.
                                                            Если консультация не была оказана должным образом, клиент может пожаловаться в арбитраж.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 3 -->

                                        <!-- Menu 4 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-4">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="accordion-lawyer-4" href="#accordion-lawyer-4-1">
                                                                Как изменить имя или фамилию? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-4-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Если у Вас появилась необходимость изменить имя или фамилию, Вам необходимо написать письмо в службу поддержки пользователей с адреса электронной почты, указанного при регистрации. В письме укажите необходимые изменения.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="accordion-lawyer-4" href="#accordion-lawyer-4-2">
                                                                Безопасность онлайн платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-4-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению. Данные вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.
                                                            Безопасность обработки Интернет-платежей гарантирует ООО «КлаудПэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="accordion-lawyer-4" href="#accordion-lawyer-4-3">
                                                                Зачем мне заполнять свой профиль? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-4-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Заполненный профиль - это доверие клиента к юристу. Клиенты с большей вероятностью заказывают персональную платную консультацию у юриста с заполненным профилем и загруженной фотографией. Рекомендуем обязательно заполнить пункты о образовании, специализации и загрузить фотографию.
                                                            В разделе «Дополнительно» можно кратко описать основные услуги, которые Вы предоставляете и их среднюю стоимость. В графе «О себе» вписать то, что поможет клиенту выбрать именно Вас при поиске специалиста для обращения за персональной консультацией.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="accordion-lawyer-4" href="#accordion-lawyer-4-4">
                                                                Зачем и как подтверждать юридическое образование? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-4-4" class="panel-collapse collapse">
                                                        <div class="panel-body">На Правовед.RU мы стремимся поддерживать высокое качество и должный профессиональный уровень консультаций, поэтому давать платные консультации могут только те юристы, которые прошли процедуру верификации, т.е. подтвердили наличие высшего юридического образования. Также подтверждение образования необходимо для возможности отвечать на платные вопросы.
                                                            В индивидуальных случаях мы можем разрешить оказывать платные услуги на сайте юристам со средним специальным юридическим образованием или высшим узкопрофильным образованием (налоговый консультант, аудитор и т.п.).
                                                            Для подтверждения своего образования Вам необходимо через личный кабинет (Личный кабинет > Редактировать профиль > Образование) загрузить фотокопию диплома об образовании. Загруженный документ нигде не публикуется и будет доступен только администрации.
                                                            После проверки, которая занимает 2-3 рабочих дня, администрация присваивает Вам статус верифицированного юриста.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 4 -->

                                        <!-- Menu 5 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-5">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-5" href="#accordion-lawyer-5-1">
                                                                Возврат средств за услуги <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-5-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">В соответствии с ФЗ «О защите прав потребителей» в случае, если вам была оказана услуга или реализован товар ненадлежащего качества, платеж может быть возвращен на банковскую карту, с которой производилась оплата.
                                                            Подробнее о порядке возврата средств https://pravoved.ru/guarantees.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-5" href="#accordion-lawyer-5-2">
                                                                Для чего нужен рейтинг? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-5-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Рейтинг нужен для ранжирования специалистов в зависимости от их действий на проекте Правовед.RU.
                                                            На рейтинг влияют оценки, которые дают клиенты и другие специалисты Вашим ответам, количество консультаций и ответов, количество заработанных средств.
                                                            Клиенты подбирают специалистов для персональных консультаций в том числе и по рейтингу.
                                                            Специалисты, заработавшие высокий рейтинг, выводятся на главной странице в разделе «ТОП юристов».
                                                            Определенное значение рейтинга (сейчас это 250 пунктов) необходимо также для возможности отвечать на платные вопросы.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-5" href="#accordion-lawyer-5-3">
                                                                Как рассчитывается рейтинг? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-5-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Считаются только ответы на вопросы, заданные не более 2-х недель назад.
                                                            Рейтинг вычисляется как сумма всех факторов, помноженных на их коэффициенты. На данный момент работают следующие факторы (в скобках указан их коэффициент):
                                                            <ul>
                                                                <li>
                                                                    Количество бесплатных ответов (2)
                                                                </li>
                                                                <li>
                                                                    Заработанные деньги (0.025)
                                                                </li>
                                                                <li>
                                                                    Количество положительных оценок от клиентов (3)
                                                                </li>
                                                                <li>
                                                                    Количество отрицательных оценок от клиентов (-3.5)
                                                                </li>
                                                                <li>
                                                                    Количество положительных оценок от юристов (2)
                                                                </li>
                                                                <li>
                                                                    Количество отрицательных оценок от юристов (-3)
                                                                </li>
                                                                <li>
                                                                    Количество персональных консультаций (2)
                                                                </li>
                                                            </ul>
                                                            Например:
                                                            Допустим, Ваш рейтинг составляет 100 пунктов. Вы ответили на бесплатный вопрос. К Вашему рейтингу прибавляется 2 пункта. Количество Ваших пунктов равняется 102. Считаются только ответы на вопросы, заданные не более 2-х недель назад.
                                                            Затем Вы ответили на платный вопрос, рейтинг не увеличился. Но при распределении средств, клиент выбрал Вас, и Вы заработали, например, 100 рублей. Так как полученные деньги влияют на рейтинг, то он изменится на 100 * 0.025, то есть станет 102 + ОКРУГЛЯЕМ (2.5) = 105.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-5" href="#accordion-lawyer-5-4">
                                                                Для чего нужна репутация (звезды)? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-5-4" class="panel-collapse collapse">
                                                        <div class="panel-body">Репутация необходима для того, чтобы клиент мог определить, какого качества консультации и ответы дает юрист на Правовед.RU.
                                                            На репутацию влияют положительные и отрицательные оценки, которые дают клиенты и другие специалисты Вашим ответам.
                                                            Клиенты подбирают специалистов для персональных консультаций в том числе и по репутации.
                                                            Определенное значение репутации (сейчас это 3 звезды) необходимо также для возможности отвечать на платные вопросы.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-5" href="#accordion-lawyer-5-5">
                                                                Как рассчитывается репутация юриста (звезды)? <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-5-5" class="panel-collapse collapse">
                                                        <div class="panel-body">Репутация юриста подсчитывается следующим образом.
                                                            Репутация (звезды) начинают начисляться юристу после того, как он ответит на 300 вопросов.
                                                            Начисление звезд происходит в два этапа:</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 5 -->

                                        <!-- Menu 6 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-6">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-6" href="#accordion-lawyer-6-1">
                                                                Платежи. Оплата банковской картой онлайн <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-6-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Наш сайт подключен к интернет-эквайрингу, и вы можете оплатить услугу банковской картой Visa или Mastercard. При оплате услуги откроется защищенное окно с платежной страницей процессингового центра CloudPayments, где вам необходимо ввести данные вашей банковской карты. Для дополнительной аутентификации держателя карты используется протокол 3D Secure. Если ваш банк поддерживает данную технологию, вы будете перенаправлены на его сервер для дополнительной идентификации. Информацию о правилах и методах дополнительной идентификации уточняйте в банке, выдавшем вам банковскую карту.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-6" href="#accordion-lawyer-6-2">
                                                                Гарантии безопасности <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-6-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Процессинговый центр CloudPayments защищает и обрабатывает данные вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.
                                                            В случае, если у вас есть вопросы по совершенному платежу, вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-6" href="#accordion-lawyer-6-3">
                                                                Безопасность онлайн платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-6-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению. Данные вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.
                                                            Безопасность обработки Интернет-платежей гарантирует ООО «КлаудПэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 6 -->

                                        <!-- Menu 7 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-7">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-7" href="#accordion-lawyer-7-1">
                                                                Платежи. Оплата банковской картой онлайн <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-7-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Наш сайт подключен к интернет-эквайрингу, и вы можете оплатить услугу банковской картой Visa или Mastercard. При оплате услуги откроется защищенное окно с платежной страницей процессингового центра CloudPayments, где вам необходимо ввести данные вашей банковской карты. Для дополнительной аутентификации держателя карты используется протокол 3D Secure. Если ваш банк поддерживает данную технологию, вы будете перенаправлены на его сервер для дополнительной идентификации. Информацию о правилах и методах дополнительной идентификации уточняйте в банке, выдавшем вам банковскую карту.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-7" href="#accordion-lawyer-6-7">
                                                                Гарантии безопасности <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-7-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Процессинговый центр CloudPayments защищает и обрабатывает данные вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.
                                                            В случае, если у вас есть вопросы по совершенному платежу, вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-7" href="#accordion-lawyer-7-3">
                                                                Безопасность онлайн платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-7-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению. Данные вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.
                                                            Безопасность обработки Интернет-платежей гарантирует ООО «КлаудПэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-7" href="#accordion-lawyer-7-4">
                                                                Возврат средств за услуги <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-7-4" class="panel-collapse collapse">
                                                        <div class="panel-body">В соответствии с ФЗ «О защите прав потребителей» в случае, если вам была оказана услуга или реализован товар ненадлежащего качества, платеж может быть возвращен на банковскую карту, с которой производилась оплата.
                                                            Подробнее о порядке возврата средств https://pravoved.ru/guarantees/</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 7 -->

                                        <!-- Menu 8 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-8">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-8" href="#accordion-lawyer-8-1">
                                                                Платежи. Оплата банковской картой онлайн <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-8-1" class="panel-collapse collapse in">
                                                        <div class="panel-body">Наш сайт подключен к интернет-эквайрингу, и вы можете оплатить услугу банковской картой Visa или Mastercard. При оплате услуги откроется защищенное окно с платежной страницей процессингового центра CloudPayments, где вам необходимо ввести данные вашей банковской карты. Для дополнительной аутентификации держателя карты используется протокол 3D Secure. Если ваш банк поддерживает данную технологию, вы будете перенаправлены на его сервер для дополнительной идентификации. Информацию о правилах и методах дополнительной идентификации уточняйте в банке, выдавшем вам банковскую карту.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-8" href="#accordion-lawyer-8-2">
                                                                Гарантии безопасности <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-8-2" class="panel-collapse collapse">
                                                        <div class="panel-body">Процессинговый центр CloudPayments защищает и обрабатывает данные вашей банковской карты по стандарту безопасности PCI DSS 3.0. Передача информации в платежный шлюз происходит с применением технологии шифрования SSL. Дальнейшая передача информации происходит по закрытым банковским сетям, имеющим наивысший уровень надежности. CloudPayments не передает данные вашей карты нам и иным третьим лицам. Для дополнительной аутентификации держателя карты используется протокол 3D Secure.
                                                            В случае, если у вас есть вопросы по совершенному платежу, вы можете обратиться в службу поддержки клиентов по электронной почте support@cloudpayments.ru.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-8" href="#accordion-lawyer-8-3">
                                                                Безопасность онлайн платежей <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-8-3" class="panel-collapse collapse">
                                                        <div class="panel-body">Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер кредитной карты) является конфиденциальной и не подлежит разглашению. Данные вашей кредитной карты передаются только в зашифрованном виде и не сохраняются на нашем Web-сервере.
                                                            Безопасность обработки Интернет-платежей гарантирует ООО «КлаудПэйментс». Все операции с платежными картами происходят в соответствии с требованиями VISA International, MasterCard и других платежных систем. При передаче информации используется специальные технологии безопасности карточных онлайн-платежей, обработка данных ведется на безопасном высокотехнологичном сервере процессинговой компании.</div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-lawyer-8" href="#accordion-lawyer-8-4">
                                                                Возврат средств за услуги <b class="caret"></b></a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion-lawyer-8-4" class="panel-collapse collapse">
                                                        <div class="panel-body">В соответствии с ФЗ «О защите прав потребителей» в случае, если вам была оказана услуга или реализован товар ненадлежащего качества, платеж может быть возвращен на банковскую карту, с которой производилась оплата.
                                                            Подробнее о порядке возврата средств https://pravoved.ru/guarantees/</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menu 8 -->

                                        <!-- Menu 9 -->
                                        <div class="bhoechie-tab-content" id="accordion-lawyer-9">
                                        </div>
                                        <!-- /Menu 9 -->

                                    </div>
                                    <!-- /Tab items -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Lawyer tab -->
                </div>
                <!-- /Tab content -->
            </div>
        </div>
    </div>
    <!-- /Content -->

@endsection