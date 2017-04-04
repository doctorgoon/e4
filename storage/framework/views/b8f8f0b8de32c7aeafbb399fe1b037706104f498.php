<?php $__env->startSection('title'); ?> Lire la note <?php echo e($myNote->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-<?php if($myNote->progress < 33): ?>danger <?php elseif($myNote->progress > 33 and $myNote->progress < 66): ?>warning <?php elseif($myNote->progress > 66): ?>success <?php endif; ?>">

                    <ul class="list">
                        <li class="tile">
                            <div class="tile-content">
                                <div class="tile-icon">
                                    <a href="<?php echo e(action('AdminController@myNotes')); ?>" class="btn btn-icon">
                                        <i class="glyphicon glyphicon-arrow-left"></i>
                                    </a>
                                </div>
                                <div class="tile-text">
                                    <h3><?php echo e($myNote->title); ?> ( <?php echo e($myNote->progress); ?> % )</h3>
                                </div>
                            </div>
                            <a href="<?php echo e(action('AdminController@editANote', [$myNote->id])); ?>" class="btn btn-flat ink-reaction">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="<?php echo e(action('AdminController@deleteANote', [$myNote->id])); ?>" class="btn btn-flat ink-reaction">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <?php echo nl2br($myNote->task); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>