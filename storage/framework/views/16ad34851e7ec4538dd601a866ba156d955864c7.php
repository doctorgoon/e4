<?php $__env->startSection('title'); ?> Modifier le profil de <?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('clients.form-clients', ['submitButtonText' => 'Valider', 'client' => $client], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>