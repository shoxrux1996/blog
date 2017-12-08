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
                                @if($document->payment_type=="about")
                                    <b>По договоренности</b>
                                @else
                                    <b>{{$document->price}} сум</b>
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
                        {{--@if($question->solved != true && Auth::guard('client')->id() == $question->client_id)--}}
                            {{--<form action="{{route('client.question.makeSolved', $question->id)}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<p>--}}
                                    {{--<button type="submit" class="btn btn-warning pull-right">Саволни ёпиш</button>--}}
                                {{--</p>--}}
                            {{--</form>--}}
                        {{--@endif--}}
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

            @if($show)
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

            @endif
        </div>
    </div>



@endsection
