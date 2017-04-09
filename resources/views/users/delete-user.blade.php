@extends('templates.layout-admin')

@section('title') Supprimer {{ $user->firstname }} {{ $user->lastname }} @endsection
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
            </div>
            <div class="card-body">
                <b>ATTENTION : </b> La suppression est définitive et supprimera tous les droits d'accès à l'administration pour cet utilisateur

                <div class="form-inline">
                    {!! Form::open() !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-primary ink-reaction']) !!}
                        <a href="{{ action('AdminUsersController@users') }}" class="btn btn-default">Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop