<?php $__env->startSection('title'); ?> Mon profil <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Prénom', 'value' => $user->firstname], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Nom', 'value' => $user->lastname], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Email', 'value' => $user->email], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Dernière connexion', 'value' => $user->last_access], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Dernière IP connue', 'value' => $user->ip], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                            <?php echo Form::open(); ?>


                            <?php echo $__env->make('partials.form-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div class="form-group">
                                <?php echo Form::label('old_password', 'Mot de passe actuel'); ?>

                                <?php echo Form::password('old_password', ['class' => 'form-control']); ?>

                            </div>

                            <div class="form-group">
                                <?php echo Form::label('password', 'Nouveau mot de passe'); ?>

                                <?php echo Form::password('password', ['class' => 'form-control']); ?>

                            </div>

                            <div class="form-group">
                                <?php echo Form::label('password_confirmation', 'Confirmer'); ?>

                                <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

                            </div>

                            <div class="form-group">
                                <?php echo Form::submit('Valider', ['class' => 'btn btn-primary btn-block']); ?>

                            </div>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>