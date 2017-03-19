@include('partials.clients-search-bar')


<div class="section-body contain-lg">
    <div class="row">

        <!-- BEGIN ADD CONTACTS FORM -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-info">
                    <header style="font-size: 22px; padding-top: 17px">
                            Ajouter un Client
                    </header>
                </div>

                {!! Form::open() !!}

                {{ Form::hidden('invisible', $call->id) }}

                <form class="form" role="form">
                    <!-- BEGIN DEFAULT FORM ITEMS -->
                    <div class="card-body style-info form-inverse">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                {!! Form::label('firstname', 'Prénom') !!}
                                                {!! Form::text('firstname', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                {!! Form::label('lastname', 'Nom') !!}
                                                {!! Form::text('lastname', $call->client_name, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                {!! Form::label('company', 'Entreprise') !!}
                                                {!! Form::text('company', $call->company, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-3">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                {!! Form::label('type', 'Fonction') !!}
                                                {!! Form::text('type', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-3">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                {!! Form::label('num', 'Référence du client') !!}
                                                {!! Form::text('num', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .card-body -->
                    <!-- END DEFAULT FORM ITEMS -->

                    <div class="card-head style-default">
                        <ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
                            <li class="active"><a href="#contact">CONTACT</a></li>
                        </ul>
                    </div><!--end .card-head -->


                    <!-- BEGIN FORM TAB PANES -->
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="contact">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('mobile', 'Mobile ') !!}
                                                {!! Form::text('mobile', $call->mobile, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('phone', 'Téléphone ') !!}
                                                {!! Form::text('phone', $call->phone, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('email', 'Email ') !!}
                                                {!! Form::text('email', $call->email, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('fax', 'Fax ') !!}
                                                {!! Form::text('fax', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="form-group">
                                        {!! Form::label('address', 'Adresse ') !!}
                                        {!! Form::text('address', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    </div><!--end .col -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {!! Form::label('city', 'Ville ') !!}
                                                {!! Form::text('city', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('zipcode', 'Code Postal ') !!}
                                                {!! Form::text('zipcode', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .tab-pane -->
                    </div>

                    <!-- BEGIN FORM FOOTER -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <a class="btn btn-flat" href="{{ action('AdminCallsController@showCall', [$call->id])}}">Retour</a>
                            {!! Form::submit($submitButtonText, ['class' => 'btn btn-flat btn-info ink-reaction']) !!}
                        </div><!--end .card-actionbar-row -->
                    </div><!--end .card-actionbar -->
                    <!-- END FORM FOOTER -->
                </form>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div><!--end .card --