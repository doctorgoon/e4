@extends('templates.layout-admin')

@section('title') Mes appels téléphoniques <a class="btn ink-reaction btn-floating-action btn-primary btn-fixed-right" href="{{ action('CallsController@addCall') }}"><i class="glyphicon glyphicon-plus"></i></a><br>@endsection

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#bloc-0">Non traités</a></li>
                    <li class=""><a href="#bloc-1">Traité</a></li>
                    <li class=""><a href="#bloc-2">A rappeler</a></li>
                    <li class=""><a href="#bloc-3">En attente de rappel</a></li>
                </ul>
            </div>

            <div class="card-body tab-content">
                @foreach($myCalls as $indice => $calls)
                    <div class="tab-pane @if($indice == 0) active @endif" id="bloc-{{ $indice }}">
                        <div class="panel-group" id="accordion">
                            @foreach($calls as $call)
                                <div class="card panel">
                                    <div class="card-head collapsed style-{{ Config::get('status_color.' . $call->status) }}" data-toggle="collapse" data-parent="#accordion" data-target="#accordion-{{ $call->id }}" aria-expanded="false">
                                        <header>
                                            {{ \Carbon\Carbon::parse($call->updated_at)->format('d/m/Y H:i') }} -

                                            {{ $call->client_name }} @if($call->company != "") - <b>{{ $call->company }}</b>  @endif
                                        </header>
                                        <div class="tools">
                                            <div class="btn-group">

                                                @if(!empty($call->client_id))
                                                    <a href="{{ action('ClientsController@showClient', [$call->client_id]) }}" class="btn btn-icon-toggle">
                                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                                    </a>
                                                @endif

                                                <a href="#" class="btn btn-icon-toggle dropdown-toggle" data-toggle="dropdown">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>

                                                <ul class="dropdown-menu animation-dock pull-right menu-card-styling" role="menu" style="text-align: left;">
                                                    <li><a href="{{ action('CallsController@editCall', [$call->id]) }}">Modifier les informations</a></li>
                                                    <li><a href="{{ action('CallsController@setStatus', [$call->id]) }}">Modifier le statut de l'appel</a></li>
                                                    @if(empty($call->client_id))
                                                        <li><a href="{{ action('CallsController@pairCall', [$call->id]) }}">Associer à un client</a></li>
                                                    @else
                                                        <li><a href="{{ action('CallsController@pairCall', [$call->id]) }}">Modifier le client associé</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                    <div id="accordion-{{ $call->id }}" class="collapse">
                                        <div class="card-body">

                                            <ul class="list divider-full-bleed">

                                                @if (! empty($call->phone)) @include('partials.lists-text', ['key' => 'Numéro de téléphone', 'value' => $call->phone]) @endif
                                                @if (! empty($call->mobile)) @include('partials.lists-text', ['key' => 'Numéro de mobile', 'value' => $call->mobile]) @endif
                                                @if (! empty($call->email)) @include('partials.lists-text', ['key' => 'Adresse e-mail', 'value' => $call->email]) @endif
                                                @include('partials.lists-text', ['key' => 'Objet', 'value' => $call->object])

                                            </ul>

                                            <br /><div><a href="{{ action('CallsController@addTicket', [$call->id])  }}" class="btn ink-reaction btn-flat btn-lg btn-{{ $colors_status[$call->status] }}">Ajouter un ticket</a></div><br>

                                            @foreach($call->tickets as $ticket)

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-head style-{{ Config::get('status_color.' . $call->status)] }}" style="padding-left: 10px;">
                                                                {{ \Carbon\Carbon::parse($call->updated_at)->format('d/m/Y H:i') }} - {{ Session::get('users')[$ticket->user_id]->firstname }} {{ Session::get('users')[$ticket->user_id]->lastname }}
                                                                <div><h4><a href="{{ action('CallsController@editTicket', [$ticket->id])  }}" style="padding-left: 810px; text-decoration: none">Modifier</a></h4></div>
                                                            </div>
                                                            <div class="card-body">
                                                                {!! nl2br($ticket->description) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop