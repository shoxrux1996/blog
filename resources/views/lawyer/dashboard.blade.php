@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lawyer Dashboard</div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <button class="btn btn-info"><a href="{{ route('lawyer.info') }}">Info</a></button>
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
