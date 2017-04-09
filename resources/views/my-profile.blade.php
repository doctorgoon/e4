@extends('templates.layout-admin')

@section('title') Mon profil @endsection
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head style-primary">
                            <h3>Mes informations</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list divider-full-bleed">
                                @include('partials.lists-text', ['key' => 'Prénom', 'value' => $user->firstname])
                                @include('partials.lists-text', ['key' => 'Nom', 'value' => $user->lastname])
                                @include('partials.lists-text', ['key' => 'Email', 'value' => $user->email])
                                @include('partials.lists-text', ['key' => 'Dernière connexion', 'value' => $user->last_access])
                                @include('partials.lists-text', ['key' => 'Dernière IP connue', 'value' => $user->ip])

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head style-primary">
                            <h3>Mon mot de passe</h3>
                        </div>
                        <div class="card-body">
                            <p>Remplissez ce champ que si vous souhaitez changer votre mot de passe</p>
                            {!! Form::open() !!}

                            @include('partials.form-error')

                            <div class="form-group">
                                {!! Form::label('old_password', 'Mot de passe actuel') !!}
                                {!! Form::password('old_password', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Nouveau mot de passe') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmer') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop