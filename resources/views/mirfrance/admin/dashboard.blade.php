@extends('templates.layout-admin')

@section('title') Administration  @endsection
@section('content')

    <h2> Tableau de bord</h2>


    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="{{ action('AdminCallsController@calls') }}" style="text-decoration: none">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-{{$callsColor}} no-margin">
                        <strong class="pull-right text-{{$callsColor}} text-lg">{{$callsPercent}}%</strong>
                        <strong class="text-xl"> {{ $calls }} / {{ $totalCalls }}</strong><br>
                        <span class="opacity-50">Appels non traités</span>
                        <div class="stick-bottom-left-right">
                            <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"><canvas style="display: inline-block; width: 272px; height: 80px; vertical-align: top;" width="272" height="80"></canvas></div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </a>
        </div><!--end .card -->
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="{{ action('AdminClientsController@clients') }}" style="text-decoration: none">
            <div class="card-body no-padding">
                <div class="alert alert-callout alert-info no-margin">
                    <strong class="text-xl">{{$clients}}</strong><br>
                    <span class="opacity-50">Clients</span>
                    <div class="stick-bottom-right">
                        <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"><canvas width="265" height="40" style="display: inline-block; width: 265px; height: 40px; vertical-align: top;"></canvas></div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="{{ action('AdminProductsController@products') }}" style="text-decoration: none">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-warning no-margin">
                        <strong class="text-xl">{{$productsAvailable}} / {{$productsExpedited}}</strong><br>
                        <span class="opacity-50">En stock / Expédiés</span>
                        <div class="stick-bottom-right">
                            <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"><canvas width="265" height="40" style="display: inline-block; width: 265px; height: 40px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card ">
            <div class="card-head">
                <header>A faire</header>
                <div class="tools">
                    <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                </div>
            </div><!--end .card-head -->
            <div class="nano" style="height: 360px;"><div class="nano-content" tabindex="0"><div class="card-body no-padding height-9 scroll" style="height: auto;">
                        <ul class="list" data-sortable="true">
                            @foreach($myNotes as $note)
                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <a href="{{ action('AdminController@finishNoteDash', [$note->id]) }}" style="margin-right: -20px; text-decoration: none">
                                            <input type="checkbox" @if($note->progress == 100)checked=""@endif>
                                        </a>
                                        <a href="{{ action('AdminController@readANote', [$note->id]) }}" style="margin-right: -20px; text-decoration: none">
                                        <span>
                                            {{$note->title}}
                                            <small>{{$note->task}}</small>
                                        </span>
                                        </a>
                                    </label>
                                </div>
                                <a class="btn btn-flat ink-reaction btn-default" href="{{action('AdminController@deleteANote', [$note->id])}}">
                                    <i class="md md-delete"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div></div><div class="nano-pane"><div class="nano-slider" style="height: 240px; transform: translate(0px, 0px);"></div></div></div><!--end .card-body -->
        </div><!--end .card -->
    </div>

@stop