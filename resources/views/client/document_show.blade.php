@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default" style="margin-top: 50px;">
        <div class="panel-heading">My Documents</div>
        <div class="panel-body">
            <div class="" >
                <label class="panel-title" >Title: </label>
                <label>{{ $document->title }}</label>
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
                        <p><strong>{{$document->cost}}</strong>  sum</p>
                    @endif
                </label>
        </div>
       
    </div>  
        @if(!$show)
      <div class="form-group">
            <label class="alert-danger">You excepted request</label>
      </div>
        @elseif($document->soft_requests()->count() == 0 && $show)
        <div class="form-group">
            <label class="alert-danger">You dont have any requests</label>
        </div>
        @else
           <div class="panel panel-primary col-md-6">
            <div class="panel-heading">Requests</div>
            @foreach($document->soft_requests() as $request)

             <div class="panel-body">
                <h3>{{$request->lawyer->user->firstName}}</h3>
                @if($request->price != $document->cost)
                <p>Intended Price: <strong>{{$request->price}}</strong>  sum</p>
                @else
                    <p>Price: <strong> Agree with the service</strong></p>
                @endif
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


