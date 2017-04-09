@extends('templates.layout-admin')

@section('title') Ajouter un utilisateur @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3 style="padding-left: 24px">
                        Ajouter un nouvel utilisateur
                    </h3>
                </div>
                <div class="card-body">
                    @include('users.form-user')
                </div>
            </div>
        </div>
    </div>

@stop