

<div class="section-body contain-lg">
    <div class="row">

        <!-- BEGIN ADD CONTACTS FORM -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-info">
                    <header style="font-size: 22px; padding-top: 17px">
                        <?php if(isset($client)): ?>
                            Modifier le Client
                        <?php else: ?>
                            Ajouter un Client
                        <?php endif; ?>
                    </header>
                </div>

                <?php if(isset($client)): ?>
                    <?php echo Form::model($client); ?>

                <?php else: ?>
                    <?php echo Form::open(); ?>

                <?php endif; ?>

                <form class="form" role="form">
                    <!-- BEGIN DEFAULT FORM ITEMS -->
                    <div class="card-body style-info form-inverse">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                <?php echo Form::label('firstname', 'Prénom'); ?>

                                                <?php echo Form::text('firstname', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                <?php echo Form::label('lastname', 'Nom'); ?>

                                                <?php echo Form::text('lastname', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                <?php echo Form::label('company', 'Entreprise'); ?>

                                                <?php echo Form::text('company', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-3">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                <?php echo Form::label('type', 'Fonction'); ?>

                                                <?php echo Form::text('type', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div>
                                    </div><!--end .col -->
                                    <div class="col-md-3">
                                        <div class="form-group floating-label">
                                            <div class="form-group">
                                                <?php echo Form::label('num', 'Référence du client'); ?>

                                                <?php echo Form::text('num', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

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
                                                <?php echo Form::label('mobile', 'Mobile '); ?>

                                                <?php echo Form::text('mobile', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('phone', 'Téléphone '); ?>

                                                <?php echo Form::text('phone', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('email', 'Email '); ?>

                                                <?php echo Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('fax', 'Fax '); ?>

                                                <?php echo Form::text('fax', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="form-group">
                                        <?php echo Form::label('address', 'Adresse '); ?>

                                        <?php echo Form::text('address', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    </div><!--end .col -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <?php echo Form::label('city', 'Ville '); ?>

                                                <?php echo Form::text('city', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo Form::label('zipcode', 'Code Postal '); ?>

                                                <?php echo Form::text('zipcode', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

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
                            <?php if(isset($client)): ?>
                                <a class="btn btn-flat" href="<?php echo e(action('ClientsController@showClient', [$client->id])); ?>">Retour</a>
                            <?php else: ?>
                                <a class="btn btn-flat" href="<?php echo e(action('ClientsController@clients')); ?>">Retour</a>
                            <?php endif; ?>

                            <?php echo Form::submit($submitButtonText, ['class' => 'btn btn-info ink-reaction']); ?>

                        </div><!--end .card-actionbar-row -->
                    </div><!--end .card-actionbar -->
                    <!-- END FORM FOOTER -->
                </form>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div><!--end .card --