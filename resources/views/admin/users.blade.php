@extends('layouts.app-admin')

@section('content')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Client
        </li>
    </ol>


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
                                        <img src="{!!asset($client->user->file->path . $client->user->file->file)!!}" alt="..." style="width: 200px; height: 200px;">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('dist/images/avatar_large_male_client_default.jpg')}}" />
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
                                        <form action="{{ route('admin.client.block', $client->id) }}"
                                              method="get">

                                                <input type="date" class="date" value="{{\Carbon\Carbon::now('Asia/Tashkent')->format('Y-m-d')}}">

                                            <button type="submit" class="btn btn-danger pull-right btn-xs" style="height: 25px; margin-left: 20px;">Блокировать
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


@endsection