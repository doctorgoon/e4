@extends('templates.layout-login')

@section('content')

    <section class="section-account">
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <br/>
                        <span class="text-lg text-bold text-primary">Portail d'administration</span>
                        <br/><br/>
                        {!! Form::open(['class' => 'form']) !!}

                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username">
                                <label for="username">Identifiant</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="password">Mot de passe</label>
                            </div>
                            <br/>
                            <div class="row">
                                <!--<div class="col-xs-6 text-left">
                                    <div class="checkbox checkbox-inline checkbox-styled">
                                        <label>
                                            <input type="checkbox"> <span>Se souvenir de moi</span>
                                        </label>
                                    </div>
                                </div>-->
                                <div class="col-xs-6 text-right">
                                    <button class="btn btn-primary btn-raised" type="submit">Connexion</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div><!--end .col -->

                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>

@stop