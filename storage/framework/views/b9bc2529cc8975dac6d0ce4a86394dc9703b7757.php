<?php $__env->startSection('title'); ?> Modifier Appel de <?php echo e($call->client_name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::model($call); ?>


        <?php echo $__env->make('mirfrance.admin.calls.form-call', ['submitButtonText' => 'Modifier l\'appel', 'edit' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>