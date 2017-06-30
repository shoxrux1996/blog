@extends('layouts.app-admin')
@section('title', 'Insert')
@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
    
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-20 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Insert</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('lawyer.blog.submit') }}">
                        {{ csrf_field() }}

                        @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
          						 {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top'])}}
          						<input type='text' name='title' value='' />
                      <label type='text'>Tags</label>
                      <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                          <option value='{{$tag->id}}'>{{$tag->name}}</option>
                        @endforeach
                      </select>
                        @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                        @endif
                      <label>Text *</label>
          						<textarea type='text' name='text'></textarea>
          						<input type='submit' value="Add Blog" />
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
    $(".js-example-basic-multiple").select2();
  </script>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

  <script>tinymce.init({
   selector:'textarea',
   plugins: 'link code',
   toolbar: 'undo redo | cut copy paste'
    });</script>
@endsection

