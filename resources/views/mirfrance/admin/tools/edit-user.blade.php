@extends('templates.layout-admin')

@section('title') Modifier {{ $user->firstname }} {{ $user->lastname }} @endsection
@section('content')

    @include('mirfrance.admin.tools.form-user', ['edit' => $user, 'oldUserAccess' => $oldUserAccess])

@stop