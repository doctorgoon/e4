@extends('templates.layout-admin')

@section('title') Ajouter Un Nouveau Client @endsection

@section('content')


@include('clients.form-clients', ['submitButtonText' => 'Ajouter le client'])

@stop