@extends('layouts.app-admin')
@section('styles')

    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/individual-category.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Категория</h2>
            </div>
            <div class="panel-body">
                {{Form::open(['route' =>['admin.category.insert.submit'], 'method' => 'POST'])}}
                {{ csrf_field() }}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <label>Name: </label>

                    {{Form::text('name',null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <label>Class name (fonts): </label>

                    {{Form::text('class',null, ['class'=>'form-control', 'placeholder'=>'fa-users'])}}
                    <a href="{{url('http://fontawesome.io/cheatsheet/')}}">list of icons</a>
                </div>

                <div class="form-group">
                    <label>Parent: </label>
                    {{Form::select('parent', $categories, null,['class' => 'form-control'])}}
                </div>
                @if ($errors->has('text'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                @endif
                <label>Text: </label>
                {{Form::textarea('text','Кредитование — это предоставление денежных средств и прочих активов, финансовыми учреждениями физическим и юридическим лицам на определённых условиях, фиксируемых договором. Главным требованием кредиторов при этом является своевременное погашение обязательств, а неплатёжеспособность лиц в данном случае — это ключевая проблема.',['class'=>'form-control'])}}

                <div class="form-group">
                    <div>
                        <input type='submit' value="Добавить" class="btn btn-success col-md-12"
                               style="height: 50px; margin-top: 50px; margin-bottom: 50px;">
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ha04cxa9mauwibgqmd91jvlug5qd3gqfb1ihnf8s5imb73na"></script>

    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            height: 500,
            toolbar: 'undo redo | cut copy paste'
        });</script>
@endsection

