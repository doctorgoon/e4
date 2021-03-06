<?php $__env->startSection('title'); ?> Supprimer <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-info">
                    <h3>Supprimer : <?php echo e($product->name); ?> #<?php echo e($product->ref); ?> </h3>
                </div>
                <div class="card-body">
                    <h3>ATTENTION : La suppression est définitive. Êtes vous sûr(e) ?</h3><br>
                    <?php echo Form::open(); ?>

                    <?php echo Form::submit('Supprimer', ['class' => 'btn btn-info btn']); ?>

                    <?php echo Form::button('Annuler', ['class' => 'btn btn-info btn-flat', 'onclick' => 'document.location.href=\'' . action('ProductsController@products') . '\'']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>