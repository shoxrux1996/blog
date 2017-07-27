@extends('layouts.app-admin')
@section('title', "| Documents")
@section('content')

<div class="container">
<div class="panel panel-primary" style="margin-top: 50px;">
        <div class="panel-heading">My Documents</div>
 </div>

	@foreach($documents as $document)
	
     <div class="panel panel-default">
 		
        <div class="panel-body">
		
		<a href="{{route('client.document.show', [$document->id])}}"><label class="panel-title" >Title: </label>
		<label>{{ $document->title }}</label></a>
		<div >
			<label class="panel-title">files: </label>
		</div>
		
		<div>
		    @foreach($document->files as $file)
		            <a class="label label-default" href={!!asset(rawurlencode($file->path.$file->file))!!}> {{ $file->file}}</a>
		    @endforeach
		   <hr>
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
     
	@endforeach
</div>

@endsection

