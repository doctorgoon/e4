<?php $__env->startSection('title'); ?> Modifier <?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('mirfrance.admin.tools.form-user', ['edit' => $user, 'oldUserAccess' => $oldUserAccess], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>