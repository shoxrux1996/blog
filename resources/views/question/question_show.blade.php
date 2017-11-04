@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-12 question">
                        @if($question->type == 2 || $question->type == 1 )
                            <span class="question-price">
                                <b>{{$question->price}} сум</b>
                                <span>
                                стоимость<br/>
                                вопроса
                                </span>
                            </span>
                        @endif
                        @if($question->solved != true && Auth::guard('client')->id() == $question->client_id)
                            <form action="{{route('client.question.makeSolved', $question->id)}}" method="post">
                                {{csrf_field()}}
                                <p>
                                    <button type="submit" class="btn btn-warning pull-right">Саволни ёпиш</button>
                                </p>
                            </form>
                        @endif
                        <h4 class="title">{{$question->title}}</h4>
                        <p class="description">{{$question->text}}</p>
                        <p>
                            <span class="date">{{Carbon\Carbon::parse($question->created_at)->toFormattedDateString()}}</span>
                            <span class="number"> вопрос №{{$question->id}}</span>
                            <span class="author">{{$question->client->user->firstName}}
                                , г.{{$question->client->user->city->name}} </span>
                        </p>
                        <hr>
                        <p>
                            <span class="category">Категория: <a
                                        href="{{route('web.category.show', $question->category->name)}}">{{$question->category->name}}</a></span>
                            <i class="answers">
                                {{$question->answers->count()}}
                            </i>
                        </p>
                        <div>
                            @foreach($question->files as $file)
                                <a class="label label-default"
                                   href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                            @endforeach
                        </div>

                        @if($question->solved == true && Auth::guard('client')->id() == $question->client_id && $question->notPayed() && $question->type != 0)
                            <form action="{{route('client.question.pay_to_every_lawyer', $question->id)}}" method="post">
                                {{csrf_field()}}
                                <p>
                                    <button type="button" class="btn btn-success" id="share-fee-button">Gonorarni
                                        taqsimlash
                                    </button>
                                    <button type="submit" class="btn btn-primary">Gonorar yuristlar o'rtasida teng
                                        taqsimlansin
                                    </button>
                                </p>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Ответы</h3>
                <!-- Comment news style -->
                <form action="{{route('client.question.pay_lawyer', $question->id)}}" method="post">
                    {{csrf_field()}}
                    @foreach($question->answers as $answer)
                        @if($answer->lawyerable_type == 'yuridik\Lawyer')
                            <div class="col-sm-9 answer">
                                <div class="answer-footer">
                                    @if($answer->lawyerFee() != null)
                                        <span class="shared-fee-value">
                                            <b>{{$answer->lawyerFee()->amount}} so'm</b>
                                            <span>
                                            ajratildi
                                            </span>
                                        </span>
                                    @endif
                                    <span class="pull-right answered-time">
                                {{\Carbon\Carbon::instance($answer->created_at)->toFormattedDateString()}}
                            </span>
                                </div>
                                <div class="answer-header">
                                    <img class="img-thumbnail"
                                         src="{{$answer->lawyerable->user->file != null ? asset($answer->lawyerable->user->file->path.$answer->lawyerable->user->file->file) : asset("dist/images/headshot-1.png")}}"
                                         alt="Lawyer 1"/>
                                    <h4 class="lawyer-name">{{$answer->lawyerable->user->firstName}} {{$answer->lawyerable->user->lastName}}</h4>
                                    <h6 class="lawyer-type">@lang("lawyer-settings.".$answer->lawyerable->job_status)</h6>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <div class="answer-content">
                                    {!! $answer->text !!}
                                </div>
                                <div>
                                    @foreach($answer->files as $file)
                                        <a class="label label-default"
                                           href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                    @endforeach
                                </div>

                                <!-- Fee sharing -->
                                <div class="fee-sharing hidden">
                                    <hr>
                                    <!-- Bir nechta javob bergan yurist uchun 1marta pul taqsimlanishi uchun -->
                                    <input type="hidden" class="lawyerID" value="{{$answer->lawyerable->id}}"/>

                                    <input type="hidden" class="answer_helped" name="answer_helped[{{$answer->id}}]">
                                    <!-- /Bir nechta javob bergan yurist uchun 1marta pul taqsimlanishi uchun -->

                                    <!-- Taqsimlamasdan oldin -->
                                    <p class="fee-sharing-text">
                                        <b>Yuristning bergan javobi sizga foydali bo'ldimi?</b>
                                        <span class="pull-right">
                                        <span class="yes-helpful">
                                            <button type="button" class="btn btn-success">
                                                 Ha +
                                            </button>
                                         </span>
                                        <span class="no-helpful">
                                            <button type="button" class="btn btn-danger">
                                                Yo'q -
                                            </button>
                                        </span>
                                    </span>
                                    </p>
                                    <!-- /Taqsimlamasdan oldin -->

                                    <!-- /Taqsimlagandan keyin -->
                                    <p class="yes-helpful-answer hidden">
                                        <b>Siz yuristga 0 so'm miqdorda gonorar ajratdingiz</b>
                                        <button type="button" class="btn btn-primary" name="change-fee">Gonorar
                                            miqdorini
                                            o'zgartirish
                                        </button>
                                    </p>
                                    <!-- /Taqsimlagandan keyin -->

                                    <!-- Taqsimlash jarayonida -->
                                    <p class="fee-sharing-action hidden">
                                        <b>Iltimos, gonorar taqsimlashga yordam bering, ushbu yuristga qancha gonorar
                                            ajratasiz?</b>
                                        <input type="hidden" class="lawyers"
                                               name="lawyers[{{$answer->lawyerable->id}}]">
                                        <input type="text" class="form-control fee-quantity" placeholder="5000">
                                        so'm
                                        <button type="button" class="btn btn-success">taqsimlash</button>
                                        <button type="button" class="btn btn-danger">ortga</button>
                                    </p>
                                    <!-- /Taqsimlash jarayonida -->
                                </div>
                                <!-- /Fee sharing -->

                            </div>
                        @else
                        <!-- Уточнение-->
                            <div class="col-sm-9 answer">
                                <div class="answer-footer">
                    <span class="pull-right answered-time">
                        {{\Carbon\Carbon::instance($answer->created_at)->toFormattedDateString()}}
                    </span>
                                </div>
                                <div class="answer-header">
                                    <img class="img-thumbnail"
                                         src="{{$answer->lawyerable->user->file != null ? asset($answer->lawyerable->user->file->path.$answer->lawyerable->user->file->file) : asset("dist/images/headshot-1.png")}}"
                                         alt="Lawyer 1"/>
                                    <h4 class="lawyer-name">{{$answer->lawyerable->user->firstName}} {{$answer->lawyerable->user->lastName}}</h4>
                                </div>
                                <div class="clearfix"></div>
                                <div>
                                    <hr>
                                </div>
                                <div class="answer-content">
                                    {!! $answer->text !!}
                                </div>
                                <div>
                                    @foreach($answer->files as $file)
                                        <a class="label label-default"
                                           href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /Уточнение-->
                        @endif
                    @endforeach
                    @if($question->type != 0)
                    <!-- fixed bottom info -->
                        <div class="fee-sharing">
                            <div class="navbar-fixed-bottom fixed-bottom-info">
                                <p>
                                    Sizda <span id="left-money">{{$question->price}}</span> so'm taqsimlanmay
                                    qoldi.
                                    <button type="submit" class="btn btn-success pull-right">Taqsimlashni
                                        tugatish
                                    </button>
                                </p>
                            </div>
                        </div>
                        <!-- /fixed bottom info -->
                    @endif
                </form>
                <!-- /Comment new style -->
            </div>
            <div class="row">
                <div class="col-sm-9">
                    @if (Auth::guard('lawyer')->check() && $question->solved != true && Auth::guard('lawyer')->user()->type == 2)
                        @if(($question->type == 1 || $question->type == 2))
                            {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                            <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                                <div>
                                    {{Form::textarea('text', null,['class'=>'myTextEditor','style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                                </div>
                                <div class="col-md-4" style="margin:10px;">
                                    {{Form::file('files[]', ['multiple' => 'multiple'])}}
                                </div>
                                <div class="col-md-2" style="float:right; margin: 10px;">
                                    {{Form::submit('Ответить', ['class'=> 'btn btn-success'])}}
                                </div>
                            </div>
                            {{Form::close() }}
                        @endif
                        @if($question->type == 0)
                            <div class="row">
                                {{Form::open(['route' => ['lawyer.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                                <div>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                    <div>
                                        {{Form::textarea('text', null,['class'=>'myTextEditor','style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                                    </div>
                                    <div class="col-md-4" style="margin:10px;">
                                        {{Form::file('files[]', ['multiple' => 'multiple'])}}
                                    </div>
                                    <div class="col-md-2" style="float: right; text-align:right; margin: 10px 0;">
                                        {{Form::submit('Ответить', ['class'=> 'btn btn-success'])}}
                                    </div>
                                </div>
                                {{Form::close() }}
                            </div>
                        @endif
                    @endif
                    @if (Auth::guard('client')->check() && $question->solved != true && Auth::guard('client')->id() == $question->client_id)
                        {{Form::open(['route' => ['client.answer.store', $question->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                        <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                            @if ($errors->has('text'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                            @endif
                            <div>
                                {{Form::textarea('text', null,['class'=>'myTextEditor','style' =>'width:100%;', 'placeholder'=>'Ответить'])}}
                            </div>
                            <div class="col-md-4" style="margin:10px;">
                                {{Form::file('files[]', ['multiple' => 'multiple'])}}
                            </div>
                            <div class="col-md-2" style="float:right; margin: 10px;">
                                {{Form::submit('Уточнить', ['class'=> 'btn btn-success'])}}
                            </div>
                        </div>
                        {{Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src={{asset('js/tinymce/tinymce.min.js')}}></script>
    <script>tinymce.init({
            mode: "specific_textareas",
            editor_selector: "myTextEditor",
            plugins: ['link code', "textcolor"],
            height: 300,
            toolbar: ['undo redo | cut copy paste forecolor backcolor fontsizeselect fontselect'],
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
        });
    </script>
    <script>

        var $leftMoney = parseInt($('#left-money').text());

        //Gonorarni taqsimlash bosilganda
        $('#share-fee-button').click(function () {
            $('.answer').each(function () {
                $(this).find('.fee-sharing').removeClass('hidden');
            });
            $(this).parent().prepend('<p class="text-success"><b>Yurist tomonidan berilgan har bir javobni tagida gonorarni taqsimlash uchun tugmalar qo\'yildi.</b></p>');
            $(this).remove();
        });

        //Ha + javob foydali bo'ldi tugmasini bosganda
        $('.yes-helpful .btn-success').click(function () {
            $lawyerID = $(this).closest('.fee-sharing').find('.lawyerID').val();
            $('.fee-sharing input[value="' + $lawyerID + '"]').each(function () {
                $(this).closest('.fee-sharing').find('.fee-sharing-action').removeClass('hidden');
                $(this).closest('.fee-sharing').find('.fee-sharing-text').addClass('hidden');

            });

        });

        //Yo'q - javob foydali bo'lmadi tugmasini bosganda
        $('.no-helpful .btn-danger').click(function () {
            $(this).closest('.fee-sharing').find('.answer_helped').val(0);
            $(this).closest('.fee-sharing').find('.lawyerID').remove();
            $(this).closest('.fee-sharing').find('.fee-sharing-text').html('<b class="no-helpful-answer">Yuristning javobi foydali bo\'lmagani bois, gonorar ajratilmaydi.<b>');
        });

        //Gonorar miqdorini kiritib taqsimlash tugmasini bosganda
        $('.fee-sharing-action .btn-success').click(function () {
            $lawyerID = $(this).closest('.fee-sharing').find('.lawyerID').val();
            var $sharedFee = $(this).closest('.fee-sharing').find('.fee-quantity').val();

            $('.fee-sharing input[value="' + $lawyerID + '"]').each(function () {
                $(this).closest('.fee-sharing').find('.fee-quantity').val($sharedFee);
                $(this).closest('.fee-sharing').find('.fee-sharing-action').addClass('hidden');
                $(this).closest('.fee-sharing').find('.yes-helpful-answer').removeClass('hidden')
                        .find('b').html('Siz yuristga ' + '<span class=\'shared-fee\'>' + $sharedFee + '</span>' + ' so\'m gonorar taqsimladingiz.');
                $(this).closest('.fee-sharing').find('.answer_helped').val(1);
                $(this).closest('.fee-sharing').find('.lawyers').val($sharedFee);
            });

            //Left money update
            $leftMoney -= $sharedFee;
            updateLeftMoney($leftMoney);
        });

        //Gonorar miqorini kiritib ortga tugmasini bosganda
        $('.fee-sharing-action .btn-danger').click(function () {
            $lawyerID = $(this).closest('.fee-sharing').find('.lawyerID').val();
            $('.fee-sharing input[value="' + $lawyerID + '"]').each(function () {
                $(this).closest('.fee-sharing').find('.fee-sharing-text').removeClass('hidden');
                $(this).closest('.fee-sharing').find('.fee-sharing-action').addClass('hidden');
                $(this).closest('.fee-sharing').find('.answer_helped').val();
            });
        });


        //Gonorar miqdorini o'zgartirishni tugmasini bosganda
        $('.fee-sharing').on('click', '[name="change-fee"]', function () {
            $lawyerID = $(this).closest('.fee-sharing').find('.lawyerID').val();
            var $sharedFee = parseInt($(this).closest('.fee-sharing').find('span.shared-fee').text());
            $('.fee-sharing input[value="' + $lawyerID + '"]').each(function () {
                $(this).closest('.fee-sharing').find('.fee-sharing-text, .yes-helpful-answer').addClass('hidden');
                $(this).closest('.fee-sharing').find('.fee-sharing-action').removeClass('hidden');
                $(this).closest('.fee-sharing').find('.answer_helped').val();
            });

            $leftMoney += $sharedFee;
            updateLeftMoney($leftMoney);
        });

        function updateLeftMoney($leftMoney) {
            $('span#left-money').text($leftMoney);
        }

    </script>
@endsection
