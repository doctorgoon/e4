@extends('templates.layout-admin')

@section('title') Consulter l'appel de {{ $call->client_name }} @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-{{ Config::get('status_color.' . $call->status) }}">
                    <h3 style="padding-left: 20px;">
                        {{ Config::get('call_status.' . $call->status) }} &nbsp - &nbsp @if($call->status == 1) le @else Derniere modification :@endif {{ get_french_date($call->updated_at) }}

                        @if(get_total_duration($call) > 0) &nbsp - &nbsp Durée totale : {{ substr(get_total_duration($call), 2) }} @endif

                        @if ( ! is_null($call->client_id))
                            <a href="{{ action('AdminClientsController@showClient', [$call->client_id]) }}" style="padding-top: 12px; padding-right: 30px" class="btn btn-icon pull-right">
                            <i class="glyphicon glyphicon-user" style="display: inline; font-size: 30px; line-height: 0px;"></i></a>
                        @endif


                        <a href="{{ action('AdminCallsController@calls') }}" style="padding-top: 12px; padding-right: 30px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-earphone" style="display: inline; font-size: 30px; line-height: 0px;"></i>
                        </a>
                    </h3>
                </div>

                <div class="card-body">

                    <ul class="list divider-full-bleed">

                        <div class="row">
                            <div class="col-lg-6">
                                @include('partials.lists-text', ['key' => 'Destiné à', 'value' => findUsersById($call->user_id, true)])
                            </div>
                            <div class="col-lg-6">
                                @include('partials.lists-text', ['key' => 'Nom du client', 'value' => $call->client_name])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                @if( ! empty($call->company)) @include('partials.lists-text', ['key' => 'Entreprise', 'value' => $call->company]) @else @include('partials.lists-text', ['key' => 'Entreprise', 'value' => '...']) @endif
                            </div>
                            <div class="col-lg-6">
                                @if( ! empty($call->email)) @include('partials.lists-text', ['key' => 'Email', 'value' => $call->email]) @else @include('partials.lists-text', ['key' => 'Email', 'value' => '...']) @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                @if( ! empty($call->phone)) @include('partials.lists-text', ['key' => 'Numéro de téléphone', 'value' => $call->phone]) @else @include('partials.lists-text', ['key' => 'Numéro de téléphone', 'value' => '...']) @endif
                            </div>
                            <div class="col-lg-6">
                                @if( ! empty($call->mobile) ) @include('partials.lists-text', ['key' => 'Numéro de mobile', 'value' => $call->mobile]) @else @include('partials.lists-text', ['key' => 'Numéro de mobile', 'value' => '...']) @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                &nbsp
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                @include('partials.lists-text', ['key' => 'Objet de l\'appel', 'value' => $call->object])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                &nbsp
                            </div>
                        </div>

                        <li class="tile">
                            <div class="tile-text">
                                Interventions

                                <ul class="list divider-full-bleed">
                                    @foreach($call->tickets as $ticket)
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-text">
                                                    <i>{{ get_french_date($ticket->updated_at)  }} &nbsp - &nbsp {{ $ticket->duration }} {{ str_plural('minute', $ticket->duration) }} </i> &nbsp
                                                    <a href="{{ action('AdminCallsController@editTicket', [$ticket->id])  }}" class="btn-icon">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a>
                                                        <small>
                                                            {!! nl2br($ticket->description) !!}
                                                        </small>
                                                </div>
                                                <div class="tile-icon">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <div class="row">

                        <a href="{{ action('AdminCallsController@addTicket', [$call->id])  }}" class="btn ink-reaction btn-{{ Config::get('call_status.' . $call->status) }}">Ajouter un ticket</a>

                        <a href="{{ action('AdminCallsController@editCall', [$call->id]) }}" class="btn ink-reaction btn-{{ Config::get('call_status.' . $call->status) }}">Modifier l'appel</a>

                        <a href="{{ action('AdminCallsController@setStatus', [$call->id]) }}" class="btn ink-reaction btn-{{ Config::get('call_status.' . $call->status) }}">Modifier le statut de l'appel</a>

                        @if(empty($call->client_id))
                            <a href="{{ action('AdminCallsController@pairCall', [$call->id]) }}" class="btn ink-reaction btn-{{ Config::get('call_status.' . $call->status) }}">Associer à un client</a>
                        @else
                            <a href="{{ action('AdminCallsController@pairCall', [$call->id]) }}" class="btn ink-reaction btn-{{ Config::get('call_status.' . $call->status) }}">Modifier le client associé</a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop