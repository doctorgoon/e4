@extends('templates.layout-admin')

@section('title') Appels téléphoniques @endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <a class="btn ink-reaction btn-floating-action btn-lg btn-primary btn-fixed-right"  href="{{ action('AdminCallsController@addCall') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="@if(!Session::has('calls_tab')) active @endif"><a href="#all-calls">Tous les Appels </a></li>
                    <li class="@if(Session::has('calls_tab')) active @endif"><a href="#my-calls">Mes Appels</a></li>
                </ul>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane @if(!Session::has('calls_tab')) active @endif" id="all-calls">

                    <div style="font-family:Helvetica; font-size: 15px">
                    &nbsp;
                        <a href="{{ action('AdminCallsController@calls')}}" style="text-decoration: none" class="tile-content ink-reaction">
                        Non Traités &nbsp <sup class="badge style-danger">{{ $countNonTreated }}</sup></a> &emsp; &emsp;
                        A recontacter &nbsp <sup class="badge style-warning">{{ $countToCall }}</sup> &emsp; &emsp;
                        En attente de rappel &nbsp <sup class="badge style-info">{{ $countInWaiting }}</sup> &emsp; &emsp;
                        Traités &nbsp <sup class="badge style-success">{{ $countTreated }}</sup>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <ul class="list">
                                        @if($totalCalls > 0)
                                            @foreach($allCalls as $calls)
                                                @foreach($calls as $indice => $call)
                                                    <li class="tile">
                                                        <a href="{{ action('AdminCallsController@showCall', [$call->id]) }}" style="text-decoration: none" class="tile-content ink-reaction">
                                                            <div class="tile-icon">
                                                                <i class="md md-notifications @if($call->status == 0) text-danger @else text-{{ Config::get('status_color.' . $call->status) }} @endif" style="font-size: 30px; margin-top: 0px; line-height: 0px; vertical-align: top;"></i>
                                                            </div>
                                                            <div class="tile-text" style="width: 10%">{{ findUsersById($call->user_id, false) }}</div>

                                                            <div class="tile-text" style="width: 89%;">
                                                                <!--<div class="style-danger" style="height: 5px; width: 50px;"></div>-->
                                                                <b>{{ $call->client_name }}</b> - <span style="color:#848484"><i>{{ get_french_date($call->updated_at) }}</i></span>
                                                                <small>
                                                                    {{ substr($call->object,0,70) }}
                                                                </small>

                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <li class="tile">
                                                <div class="tile-content">
                                                    Aucun appel téléphonique pour le moment
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane @if(Session::has('calls_tab')) active @endif" id="my-calls">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-head">
                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#bloc-0">Non traités &nbsp <sup class="badge style-danger">{{ $myCountNonTreated }}</sup></a></li>
                                        <li class=""><a href="#bloc-1">Traité &nbsp <sup class="badge style-success">{{ $myCountTreated }}</sup></a></li>
                                        <li class=""><a href="#bloc-2">A rappeler &nbsp <sup class="badge style-warning">{{ $myCountToCall }}</sup></a></li>
                                        <li class=""><a href="#bloc-3">En attente de rappel &nbsp <sup class="badge style-info">{{ $myCountInWaiting }}</sup></a></li>
                                    </ul>
                                </div>

                                <div class="card-body tab-content">
                                    @foreach($myCalls as $indice => $calls)
                                        <div class="tab-pane @if($indice == 0) active @endif" id="bloc-{{ $indice }}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card-body no-padding">
                                                        <ul class="list">
                                                            @foreach($calls as $call)
                                                                <li class="tile">
                                                                    <a href="{{ action('AdminCallsController@showCall', [$call->id]) }}" style="text-decoration: none" class="tile-content ink-reaction">
                                                                        <div class="tile-icon">
                                                                                <i class="md md-notifications @if($call->status == 0) text-danger @else text-{{ Config::get('status_color.' . $call->status) }} @endif" style="font-size: 30px; margin-top: 0px; line-height: 0px; vertical-align: top;"></i>
                                                                        </div>

                                                                        <div class="tile-text" style="width: 89%;">
                                                                            <!--<div class="style-danger" style="height: 5px; width: 50px;"></div>-->
                                                                            <b>{{ $call->client_name }}</b> - ({{ get_french_date($call->updated_at) }})
                                                                            <small>
                                                                                {{ substr($call->object,0,70) }}
                                                                            </small>

                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


