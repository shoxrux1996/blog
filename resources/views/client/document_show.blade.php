@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">My Documents</div>
            <div class="panel-body">
                <div class="" >
                    @if($document->status == 1 && Auth::guard('client')->id() == $document->client_id)
                        <form action="{{route('client.document.close', $document->id)}}" method="post">
                            {{csrf_field()}}
                            <p>
                                <button type="submit" class="btn btn-warning pull-right">Саволни ёпиш</button>
                            </p>
                        </form>
                    @endif
                    <label class="panel-title" >Title: </label>
                    <label>{{ $document->title }}</label>
                    <br>
                    <label class="panel-title">files: </label>
                    <div>
                        @foreach($document->files as $file)
                            <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                        @endforeach
                       <hr>
                    </div>
                </div>
                <label class="panel-title">Description:</label>
                <div>
                    <p>{{substr(strip_tags($document->description),0,250)}} {{strlen(strip_tags($document->description))>250 ? '...' : ""}}</p>
                </div>
                <label class="panel-title">Intended Price:</label>
                <label>
                    @if($document->payment_type == "about")
                        <p>
                            <strong>{{$document->cost}}</strong>  sum
                        </p>
                    @endif
                </label>
            </div>
        </div>
        @if($document->status!=0)
            <div class="form-group">
                @if($document->requests()->where('status',1)->first()->responses->count() == 0)
                    <label class="alert-danger">You accepted request</label>
                @else
                    @foreach($document->requests->where('status',1)->first()->responses as $answer)
                        <div class="answer-header">
                            <img class="img-thumbnail" src="{{$answer->lawyerable->user->file != null ? asset($answer->lawyerable->user->file->path.$answer->lawyerable->user->file->file) : asset("dist/images/headshot-1.png")}}" alt="Lawyer 1"/>
                            <h4 class="lawyer-name">{{$answer->lawyerable->user->firstName}} {{$answer->lawyerable->user->lastName}}</h4>
                            @if($answer->lawyerable_type=='yuridik\Lawyer')
                                <h6 class="lawyer-type">@lang("lawyer-settings.".$answer->lawyerable->job_status)</h6>
                            @endif
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
                                <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                          @endforeach
                        </div>
                    @endforeach
                @endif
                @if($document->status==1)
                    {{Form::open(['route' => ['client.response.store', $document->requests->where('status',1)->first()->id],'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                        @if ($errors->has('text'))
                            <div class="panel panel-danger col-md-10" style="padding-top: 10px;">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                            </div>
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
                    {{Form::close() }}
                @endif
            </div>
        @elseif($document->status==0 && $document->requests()->count() == 0)
        <div class="form-group">
            <label class="alert-danger">You don't have any requests yet</label>
        </div>
        @elseif($document->status==0)
            <div class="panel panel-primary col-md-6">
                <div class="panel-heading">Requests</div>
                @foreach($document->requests->where('status',0) as $request)
                    <div class="panel-body">
                        <h3>{{$request->lawyer->user->firstName}}</h3>
                        @if($request->price != $document->cost)
                            <p>Intended Price: <strong>{{$request->price}}</strong>  sum</p>
                        @else
                            <p>Price: <strong> Agree with the price</strong></p>
                        @endif
                            <p>Description: {{$request->description}}</p>
                            <p>Created_at: {{$request->created_at}}</p>
                            <p>Deadline: {{$request->updated_at}}</p>
                        {{Form::open(['route' => ['client.document.accept', $request->id], 'method' => 'POST', 'class'=>'form-horizontal']) }}
                            <div>
                                <div class ="form-group">
                                    {{Form::submit('Accept', ['class'=> 'col-md-4 btn btn-success ', 'style'=>'margin:5px 0 5px 0;'])}}
                                </div>
                            </div>
                        {{Form::close() }}
                        {{Form::open(['route' => ['client.document.reject', $request->id], 'method' => 'POST', 'class'=>'form-horizontal ']) }}
                            <div>
                                <div class ="form-group">
                                    {{Form::submit('Reject', ['class'=> 'col-md-4 btn btn-danger ', 'style'=>'margin:5px 0 5px 0;'])}}
                                </div>
                            </div>
                        {{Form::close() }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection


