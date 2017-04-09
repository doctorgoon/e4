@extends('templates.layout-admin')

@section('title') Modifier {{ $user->firstname }} {{ $user->lastname }} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3 style="padding-left: 24px">
                        Modifier l'utilisateur
                    </h3>
                </div>
                <div class="card-body">
                    @include('users.form-user', ['user' => $user])
                </div>
            </div>
        </div>
    </div>

@stop