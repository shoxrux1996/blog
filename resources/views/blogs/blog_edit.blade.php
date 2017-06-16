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
                <div class="panel-heading">ADMIN Insert</div>
                <div class="panel-body">
                    
                    {{Form::open(['route' => ['admin.blog.edit.submit', $blog->id], 'method' => 'POST'])}}
                        {{ csrf_field() }}

                        @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                       {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top'])}}
                      <input type='text' name='title' value='{{$blog->title}}' />
                      <label type='text'>Tags</label>
                       {{Form::select('tags[]', $tags, $blog->tags, ['class' => 'form-control js-example-basic-multiple', 'multiple'=> 'multiple'])}} 
                      <!--  <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                   
                        @endforeach
                      </select>
                      -->
                        @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                        @endif
                      <label>Text *</label>
                      <textarea type='text' name='text'></textarea>
                     {{Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' =>'margin-top:20px;']) }}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
    $(".js-example-basic-multiple").select2({
       tags: true
    });
  </script>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

  <script>tinymce.init({
   selector:'textarea',
   plugins: 'link code',
   toolbar: 'undo redo | cut copy paste'
    });</script>
@endsection

