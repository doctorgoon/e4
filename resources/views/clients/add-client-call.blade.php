@extends('templates.layout-admin')

@section('title') Ajouter Un Nouveau Client @endsection

@section('content')

    @include('clients.form-clients-call', ['submitButtonText' => 'Ajouter le client', 'call' => $call])

@stop