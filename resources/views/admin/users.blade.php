@extends('layouts.app-admin')
@section('styles')
    <style>
        .section {
            display: none;
        }

        #navbar {
            margin: 0;
        }
    </style>
@endsection
@section('content')

    <nav class="navbar navbar-default" style="border-radius: 0; border-width: 0 0 thin 0;">
        <ul class="nav navbar-nav">
            <li data-toggle="tab" class="active"><a onclick="switchSection('section1')"><i
                            class="fa fa-columns"></i>
                    Клиенты</a>
            </li>
            <li data-toggle="tab"><a onclick="switchSection('section2')"><i class="fa fa-list-alt"></i> Юристы</a>
            </li>

        </ul>
    </nav>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="section1" class="section" style="display: block;">
                <div class="page-header">
                    <h2>Клиенты</h2>
                </div>
                @foreach ($clients as $client)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{ $client->email }}</strong>
                        </div>
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left">
                                    @if($client->user->file != null)
                                        <img src="{!!asset($client->user->file->path . $client->user->file->file)!!}"
                                             alt="..." style="width: 200px; height: 200px;">
                                    @else
                                        <img class="img-thumbnail"
                                             src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}"/>
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">{{ $client->user->firstName }} </h3>
                                    <h3 class="media-heading">{{ $client->user->lastName }} </h3>
                                    <h3 class="media-heading">{{ $client->user->balance() }} sum </h3>
                                    <p>{{ $client->user->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        @if($client->isBlocked == false)
                                            <form action="{{ route('admin.client.block', [$client->id]) }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input type="date" class="date" name="date"
                                                       value="{{\Carbon\Carbon::now('Asia/Tashkent')->format('Y-m-d')}}">

                                                <button type="submit" class="btn btn-danger pull-right btn-xs"
                                                        style="height: 25px; margin-left: 20px;">Блокировать
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.client.unblock', [$client->id]) }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-success pull-right btn-xs"
                                                        style="height: 25px; margin-left: 20px;">Разблокировать
                                                </button>
                                            </form>
                                        @endif

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-8">

                    <div class="pager">
                        {!! $clients->links('pagination') !!}
                    </div>
                </div>
            </div>
            <div id="section2" class="section">
                <div class="page-header">
                    <h2>Юристы</h2>
                </div>
                @foreach ($lawyers as $client)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{ $client->email }}</strong>
                        </div>
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left">
                                    @if($client->user->file != null)
                                        <img src="{!!asset($client->user->file->path . $client->user->file->file)!!}"
                                             alt="..." style="width: 200px; height: 200px;">
                                    @else
                                        <img class="img-thumbnail"
                                             src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}"/>
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">{{ $client->user->firstName }} </h3>
                                    <h3 class="media-heading">{{ $client->user->lastName }} </h3>
                                    <h3 class="media-heading">{{ $client->user->balance() }} sum </h3>
                                    <p>{{ $client->user->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        @if($client->isBlocked == false)
                                            <form action="{{ route('admin.lawyer.block', [$client->id]) }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input type="date" class="date" name="date"
                                                       value="{{\Carbon\Carbon::now('Asia/Tashkent')->format('Y-m-d')}}">

                                                <button type="submit" class="btn btn-danger pull-right btn-xs"
                                                        style="height: 25px; margin-left: 20px;">Блокировать
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.lawyer.unblock', [$client->id]) }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-success pull-right btn-xs"
                                                        style="height: 25px; margin-left: 20px;">Разблокировать
                                                </button>
                                            </form>
                                        @endif

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-8">

                    <div class="pager">
                        {!! $lawyers->links('pagination') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
        @endsection
        @section('scripts')
            <script>
                function switchSection(id) {
                    var section = document.getElementsByClassName('section');
                    for (var i = 0; i < section.length; i++)
                        section[i].style.display = "none";
                    document.getElementById(id).style.display = "block";
                }
            </script>

        @endsection