<?php $__env->startSection('title'); ?> Ajouter un utilisateur <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3 style="padding-left: 24px">
                        Ajouter un nouvel utilisateur
                    </h3>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('users.form-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>