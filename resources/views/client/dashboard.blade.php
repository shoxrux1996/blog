@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Client Dashboard</div>
                <button class="btn btn-info"><a href="{{ route('client.info') }}">Info</a></button>
                <button class="btn btn-info"><a href="#">Create Blogs</a></button>
                <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
