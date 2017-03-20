<?php echo $__env->make('partials.form-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row">
    <div class="col-lg-12">
        <?php if(isset($edit)): ?>
            <?php echo Form::model($edit); ?>

        <?php else: ?>
            <?php echo Form::open(); ?>

        <?php endif; ?>

        <div class="card">
                <div class="card-head style-primary">
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <?php echo Form::label('firstname', 'Prénom de l\'utilisateur'); ?>

                        <?php echo Form::text('firstname', null, ['class' => 'form-control']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('lastname', 'Nom de l\'utilisateur'); ?>

                        <?php echo Form::text('lastname', null, ['class' => 'form-control']); ?>

                    </div>

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


                <?php if(!isset($edit)): ?>
                        <div class="form-group">
                            <?php echo Form::label('email', 'Adresse e-mail de l\'utilisateur'); ?>

                            <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

                        </div>
                <?php endif; ?>

                </div><!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <?php echo Form::submit('Valider', ['class' => 'btn btn-primary ink-reaction']); ?>

                    </div>
                </div>
            </div><!--end .card -->
            <?php echo Form::close(); ?>

</div>
    </div>