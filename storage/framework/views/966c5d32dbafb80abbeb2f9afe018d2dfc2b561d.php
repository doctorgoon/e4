
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head <?php if(isset($call)): ?> style-<?php echo e(Config::get("status_color." .$call->status)); ?> <?php else: ?> style-primary <?php endif; ?>">
                <h3>
                    <?php if(isset($call)): ?>
                        <a href="<?php echo e(action('CallsController@showCall', [$call->id])); ?>" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de <?php echo e($call->client_name); ?> &nbsp-&nbsp <?php echo e(get_french_date($call->created_at)); ?>

                    <?php elseif(isset($client)): ?>
                        <a href="<?php echo e(action('ClientsController@showClient', [$client->id])); ?>" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de <?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?>

                    <?php else: ?>
                        <a href="<?php echo e(action('CallsController@calls')); ?>" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Ajouter un appel
                    <?php endif; ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">

                        <?php echo Form::open(); ?>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('user_id', 'Destinataire : '); ?>

                                    <?php echo Form::select('user_id', getUsersById(), null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('client_name', 'Nom du client : '); ?>

                                    <?php if(isset($client)): ?>
                                        <?php echo Form::text('client_name', $client->firstname . " " . $client->lastname, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('client_name', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('company', 'Nom de l\'entreprise : '); ?>

                                    <?php if(isset($client->company)): ?>
                                        <?php echo Form::text('company', $client->company, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('company', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('email', 'E-mail : '); ?>

                                    <?php if(isset($client->email)): ?>
                                        <?php echo Form::text('email', $client->email, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('phone', 'Numéro de téléphone : '); ?>

                                    <?php if(isset($client->phone)): ?>
                                        <?php echo Form::text('phone', $client->phone, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('phone', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('mobile', 'Numéro de mobile : '); ?>

                                    <?php if(isset($client->mobile)): ?>
                                        <?php echo Form::text('mobile', $client->mobile, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('mobile', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('object', 'Objet de l\'appel : '); ?>

                            <?php echo Form::textarea('object', null, ['class' => 'form-control autosize', 'rows' => 2, 'autocomplete' => 'off']); ?>

                        </div>

                        <?php if(!isset($edit)): ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('intervention', 'Intervention : '); ?>

                                    <?php echo Form::textarea('intervention', null, ['class' => 'form-control autosize', 'rows' => 1, 'autocomplete' => 'off']); ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo Form::label('duration', 'Durée de l\'appel (en minutes) : '); ?>

                                    <?php echo Form::text('duration', null, ['class' => 'form-control']); ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="radio radio-styled">

                                <?php for($i = 0; $i < 4; $i++): ?>
                                    <label>
                                        <?php echo Form::radio('status', $i); ?> <span><?php echo e(Config::get('call_status.' . $i)); ?></span>
                                    </label>
                                    <br />
                                <?php endfor; ?>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <?php echo Form::submit($submitButtonText, ['class' => 'btn btn-primary ink-reaction']); ?>

                        </div>

                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>