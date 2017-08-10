@extends('layouts.app-admin')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="section1" class="section" style="display: block;">
                <div class="page-header">
                    <h2>Коменты</h2>
                </div>
                @foreach ($comments as $comment)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{ $comment->commentable->user->firstName }}</strong>
                            <label class="-align-right" style="float:right;">{{$comment->created_at}}</label>
                        </div>
                        <div class="panel-body">
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="media-heading">{{$comment->commentable->email}} </h3>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <form action="{{ route('admin.comment.delete', [$comment->id]) }}"
                                              method="post">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger pull-right btn-xs"
                                                    style="height: 25px; margin-left: 20px;">Удалить
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
                <div class="col-md-8">

                    <div class="pager">
                        {!! $comments->links('pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection