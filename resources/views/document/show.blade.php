@extends('layouts.app')
@section('styles')
    <!-- styles here -->
@endsection
@section('menu')
  <li><a href="{{ route('home')}}">Главная</a></li>
  <li><a href="{{ route('lawyers.list')}}">Юристы</a></li>
  <li><a href="{{ route('question.list')}}">Вопросы</a></li>
  <li><a href="{{ route('web.blogs')}}">Блог</a></li>
  <li><a href="{{ route('how-works')}}">Как это работает</a></li>
  <li><a href="{{ route('about')}}">О нас</a></li>
@endsection
@section('content')

    <div class="container">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-8" >
                    <label class="col-sm-6" >{{ $document->title }}</label>
                    <div class="tags col-md-8 ">
                        
                        <div class="tags col-md-8 ">
                            @foreach($document->files as $file)
                                <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><p>{{substr(strip_tags($document->description),0,250)}} {{strlen(strip_tags($document->description))>250 ? '...' : ""}}</p></div>
            </div>
        @if($document->requests != null && $document->requests->count() > 0)
            <h>{{$document->requests->count()}} counts</h>
        @endif
            
        </div>
        
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



@endsection
