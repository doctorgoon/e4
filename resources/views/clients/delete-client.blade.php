@extends('templates.layout-admin')

@section('title') Supprimer le client {{ $client->firstnae }} {{ $client->lastname }} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-info">
                    <h3>Supprimer : {{ $client->firstname }} {{ $client->lastname }}, @if( isset($client->company)) de <b> {{$client->company}} </b>@endif</h3>
                </div>
                <div class="card-body">
                    <h3>ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?</h3><br>
                    {!! Form::open() !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-info btn']) !!}
                    {!! Form::button('Annuler', ['class' => 'btn btn-info btn-flat', 'onclick' => 'document.location.href=\'' . action('ClientsController@clients') . '\'']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
