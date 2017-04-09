@extends('templates.layout-admin')

@section('title') Modifier le profil de {{ $client->firstname }} {{ $client->lastname }} @endsection

@section('content')

    @include('clients.form-clients', ['submitButtonText' => 'Valider', 'client' => $client])

@stop