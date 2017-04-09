@extends('templates.layout-admin')

@section('title') Associer appel @endsection

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-{{ Config::get('status_color.' . $call->status) }}">
                    <a class="btn ink-reaction btn-floating-action btn-lg btn-default btn-fixed-right"  href="{{ action('ClientsController@addClientCall', [$call->id]) }}"><i class="glyphicon glyphicon-plus"></i></a>
                    <h2 style="padding-left: 10px; padding-bottom: 10px ">
                        <a href="{{ action('CallsController@showCall', [$call->id]) }}" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        @if(isset($exist)) {{$exist}} @else Associer à un client @endif
                    </h2>
                </div>
                <div class="card-body">

                    {!! Form::open() !!}
                    <input type="text" class="form-control" placeholder="Rechercher un client..." onkeyup="searchClientByTicket($(this).val())" />
                    <input type="hidden" name="client_id" id="client_id" />
                    <input type="submit" id="submit" style="display: none;" />
                    {!! Form::close() !!}

                    <div id="results">

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop