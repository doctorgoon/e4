<?php $__env->startSection('title'); ?> Ajouter Un Nouveau Client <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('clients.form-clients-call', ['submitButtonText' => 'Ajouter le client', 'call' => $call], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>