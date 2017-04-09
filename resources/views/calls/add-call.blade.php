@extends('templates.layout-admin')

@section('title') Ajouter un nouvel appel téléphonique @endsection

@section('content')

@include('calls.form-call', ['submitButtonText' => 'Ajouter l\'appel'])

@endsection






