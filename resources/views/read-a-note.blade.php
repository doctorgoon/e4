@extends('templates.layout-admin')

@section('title') Lire la note {{ $myNote->title }} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-@if($myNote->progress < 33)danger @elseif($myNote->progress > 33 and $myNote->progress < 66)warning @elseif($myNote->progress > 66)success @endif">

                    <ul class="list">
                        <li class="tile">
                            <div class="tile-content">
                                <div class="tile-icon">
                                    <a href="{{ action('AdminController@myNotes') }}" class="btn btn-icon">
                                        <i class="glyphicon glyphicon-arrow-left"></i>
                                    </a>
                                </div>
                                <div class="tile-text">
                                    <h3>{{ $myNote->title }} ( {{ $myNote->progress }} % )</h3>
                                </div>
                            </div>
                            <a href="{{ action('AdminController@editANote', [$myNote->id]) }}" class="btn btn-flat ink-reaction">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="{{ action('AdminController@deleteANote', [$myNote->id]) }}" class="btn btn-flat ink-reaction">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    {!! nl2br($myNote->task) !!}
                </div>
            </div>
        </div>
    </div>
@stop
