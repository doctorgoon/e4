<?php $__env->startSection('title'); ?> Supprimer la note <?php echo e($myNote->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>Supprimer la note <?php echo e($myNote->title); ?></h3>
                </div>
                <div class="card-body">
                    ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?
                    <?php echo Form::open(); ?>

                        <?php echo Form::submit('Supprimer', ['class' => 'btn btn-primary btn']); ?>

                        <?php echo Form::button('Annuler', ['class' => 'btn btn-primary btn-flat', 'onclick' => 'document.location.href=\'' . action('AdminController@myNotes') . '\'']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>