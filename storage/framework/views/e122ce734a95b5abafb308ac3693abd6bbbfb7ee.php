<?php $__env->startSection('title'); ?> Ajouter un nouvel appel téléphonique <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('calls.form-call', ['submitButtonText' => 'Ajouter l\'appel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>