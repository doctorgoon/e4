@extends('templates.layout-admin')

@section('title') Supprimer l'appel de {{ $call->client_name }} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>Supprimer l'appel de {{ $call->client_name }} du {{ $call->created_at }}</h3>
                </div>
                <div class="card-body">
                    <h3>ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?</h3><br>
                    {!! Form::open() !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-supprimer btn']) !!}
                    {!! Form::button('Annuler', ['class' => 'btn btn-primary btn-flat', 'onclick' => 'document.location.href=\'' . action('CallsController@calls') . '\'']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
