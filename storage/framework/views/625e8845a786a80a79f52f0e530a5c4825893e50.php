<?php $__env->startSection('title'); ?> Supprimer l'appel de <?php echo e($call->client_name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>Supprimer l'appel de <?php echo e($call->client_name); ?> du <?php echo e($call->created_at); ?></h3>
                </div>
                <div class="card-body">
                    <h3>ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?</h3><br>
                    <?php echo Form::open(); ?>

                    <?php echo Form::submit('Supprimer', ['class' => 'btn btn-supprimer btn']); ?>

                    <?php echo Form::button('Annuler', ['class' => 'btn btn-primary btn-flat', 'onclick' => 'document.location.href=\'' . action('CallsController@calls') . '\'']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>