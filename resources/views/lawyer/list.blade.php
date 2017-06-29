@extends('layouts.app-admin')
@section('title', "| Lawyers")
@section('content')

<div class="container">
<div class="panel-heading">Category</div>
                <div>
	                @if (count($categories) > 0)
	                        <ul>
	                        @foreach ($categories as $category)
	                            @include('partials.category', $category)
	                        @endforeach
	                        </ul>
	                @endif
                </div>
@foreach($lawyers as $lawyer)
	<div class="bg-info col-md-8" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12" >
				<label class="col-sm-6" >{{ $lawyer->user->firstName }}</label>
		</div>
	</div>
	@if($lawyer->user->file_id != null)
	<div class="row">
		<img src="{!!asset($lawyer->user->file->path . $lawyer->user->file->file)!!}" alt="..." class="img-thumbnail" style="width: 100px;">
	</div>
	@endif
</div>
@endforeach
	<div class="col-md-8">
		<div class="pager">
		{!! $lawyers->links('pagination') !!}
	</div>
	</div>
</div>
@endsection

