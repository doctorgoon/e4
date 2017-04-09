@extends('templates.layout-admin')

@section('title') Mes notes @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-default">
                    <a class="btn ink-reaction btn-floating-action btn-lg btn-primary btn-fixed-right"  href="{{ action('AdminController@addANote') }}"><i class="glyphicon glyphicon-plus"></i></a>
                    <h3>&ensp;Mes notes</h3>
                </div>
                <div class="card-body">
                    @if(count($myNotes) > 0)
                        <ul class="list divider-full-bleed">
                            @foreach($myNotes as $note)
                                <li class="tile">
                                    <a href="{{ action('AdminController@readANote', [$note->id]) }}" class="tile-content">
                                        <div class="tile-icon">{{ $note->progress }} %</div>
                                        <div class="tile-text">
                                            {{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}
                                            - {{ $note->title }}
                                            <small>
                                                {{ str_limit($note->task, 100) }}
                                            </small>
                                        </div>

                                        <a href="{{ action('AdminController@finishNote', [$note->id]) }}" class="btn ink-reaction">
                                            <button type="button" class="btn ink-reaction btn-icon-toggle"> @if($note->progress == 100)<i style="color: #787878" class="glyphicon glyphicon-ok"></i> @else <i style="color: #e6e6e6" class="glyphicon glyphicon-ok"></i> @endif </button>
                                        </a>

                                        <div class="stick-bottom-left-right">
                                            <div class="progress progress-hairline no-margin">
                                                @if($note->progress < 33)
                                                    <div class="progress-bar progress-bar-danger" style="width:{{ $note->progress }}%"></div>
                                                @elseif($note->progress > 33 and $note->progress < 66)
                                                    <div class="progress-bar progress-bar-warning" style="width:{{ $note->progress }}%"></div>
                                                @elseif($note->progress > 66)
                                                    <div class="progress-bar progress-bar-success" style="width:{{ $note->progress }}%"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="list divider-full-bleed">
                            <li class="tile">
                                <div class="tile-content">
                                    <div class="tile-text">
                                        Aucune note pour le moment
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop