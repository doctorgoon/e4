@extends('templates.layout-admin')

@section('title') Modifier Appel de {{ $call->client_name }} @endsection

@section('content')

    {!! Form::model($call) !!}

        @include('mirfrance.admin.calls.form-call', ['submitButtonText' => 'Modifier l\'appel', 'edit' => true])

    {!! Form::close() !!}

@stop