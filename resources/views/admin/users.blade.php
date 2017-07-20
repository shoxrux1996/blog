@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Days</th>
                    <th>Submit</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($clients as $client)
                    <tr>
                    
                    </tr>
                   <div id="comment-form" class="col-md-4 col-md-offset-2" style="left:0">
                       <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.client.block', $client->id) }}">
                           <input type="text" name="days">
                           <input type="submit">
                       </form>
                   </div>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection