@extends('layouts.app-admin')
@section('title', "| Documents")
@section('content')

<div class="container">

	@foreach($documents as $doc)
		<a href="{{route('lawyer.document.show', $doc->id)}}">
			<div class="bg-info col-md-8" style="margin-bottom: 20px;">
				<div class="row">
					<div class="col-md-12">
						<label class="col-sm-6">{{ $doc->title }}</label>
					</div>
				</div>
				<div class="row">
				
				</div>
			</div>
		</a>
	@endforeach
		<div class="col-md-8">

			<div class="pager">
				{!! $documents->links('pagination') !!}
			</div>
		</div>
</div>
@endsection

