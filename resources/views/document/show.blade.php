@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/questions.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div id="wrapper">
        <div class="container">
            <!-- --- ---- ----- ---- --- -->
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
                        <span class="question-price">
                            @if($document->status==0)
                                @if($document->payment_type=="later")
                                    <b>По договоренности</b>
                                @else
                                    <b>{{$document->cost}} сум</b>
                                    <span>
                                        @lang('questions.стоимость')<br/>
                                        @lang('questions.вопроса')
                                    </span>
                                @endif
                            @elseif($document->status==1)
                                <b>Юрист выбран</b>
                            @else
                                <b>Заявка закрыта</b>
                            @endif
                        </span>
                        <h4 class="title">{{$document->title}}</h4>
                        <p class="description">{{$document->description}}</p>
                        <p>
                            <span class="date">{{Carbon\Carbon::parse($document->created_at)->toFormattedDateString()}}</span>
                            <span class="number"> вопрос №{{$document->id}}</span>
                            <span class="author">{{$document->client->user->firstName}}
                                , г.{{$document->client->user->city->name}} </span>
                        </p>
                        <hr>
                        <p>
                            <span class="category">@lang('questions.Категория'): {{$document->category->name}}</span>
                            <i class="answers">
                                {{$document->requests->count()}}
                            </i>
                        </p>
                        <div>
                            @foreach($document->files as $file)
                                <a class="label label-default"
                                   href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- --- ---- ----- ---- --- -->
            @if(!$show)
                @foreach($document->requests->where('status',1)->first()->responses as $answer)
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
                @endforeach
                {{Form::open(['route' => ['lawyer.response.store', $document->requests->where('status',1)->first()->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
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
            @if(Auth::guard('lawyer')->user()->type == 2 && $show==1  && $document->status==0)
                {{Form::open(['route' => ['lawyer.document.request', $document->id], 'method' => 'POST', 'class'=>'form-horizontal col-md-8']) }}
                <div>
                    <div class ="form-group">
                        {{Form::label('description', "Request: ") }}

                        {{Form::textarea('description', null, ['class'=>'col-md-4 col- form-control', 'rows'=>'3', 'cols' =>'6'])}}

                    </div>
                    @if($document->payment_type == "about")
                        <label>Agree for <strong>{{$document->cost}}</strong>sum</label>
                        {{Form::radio('payment_type', 'agree')}}
                        <label>Offer</label>
                        {{Form::radio('payment_type', 'offer', true)}}
                    @endif

                    <div class ="form-group">
                        {{Form::label('price', "My intended Price: ") }}
                        {{Form::number('price', $document->cost, ['min' => 0, 'max' => '999999999'])}}
                    </div>
                    <div class ="form-group">
                        {{Form::label('date', "Finishing time of document:") }}
                        {{Form::date('date', \Carbon\Carbon::now())}}
                    </div>


                    <div class ="form-group">
                        {{Form::submit('Make a Request', ['class'=> 'col-md-6 btn btn-success ', 'style'=>'margin:5px 0 5px 0;'])}}
                    </div>

                </div>
                {{Form::close() }}
            @elseif($show==2)
                <p>Your response has not been responded yet</p>
            @endif
        </div>
    </div>



@endsection
