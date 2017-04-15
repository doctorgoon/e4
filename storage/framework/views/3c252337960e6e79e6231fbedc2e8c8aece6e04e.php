<?php $__env->startSection('title'); ?> Mes notes <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-default">
                    <a class="btn ink-reaction btn-floating-action btn-lg btn-primary btn-fixed-right"  href="<?php echo e(action('AdminController@addANote')); ?>"><i class="glyphicon glyphicon-plus"></i></a>
                    <h3>&ensp;Mes notes</h3>
                </div>
                <div class="card-body">
                    <?php if(count($myNotes) > 0): ?>
                        <ul class="list divider-full-bleed">
                            <?php foreach($myNotes as $note): ?>
                                <li class="tile">
                                    <a href="<?php echo e(action('AdminController@readANote', [$note->id])); ?>" class="tile-content">
                                        <div class="tile-icon"><?php echo e($note->progress); ?> %</div>
                                        <div class="tile-text">
                                            <?php echo e(\Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i')); ?>

                                            - <?php echo e($note->title); ?>

                                            <small>
                                                <?php echo e(str_limit($note->task, 100)); ?>

                                            </small>
                                        </div>

                                        <a href="<?php echo e(action('AdminController@finishNote', [$note->id])); ?>" class="btn ink-reaction">
                                            <button type="button" class="btn ink-reaction btn-icon-toggle"> <?php if($note->progress == 100): ?><i style="color: #787878" class="glyphicon glyphicon-ok"></i> <?php else: ?> <i style="color: #e6e6e6" class="glyphicon glyphicon-ok"></i> <?php endif; ?> </button>
                                        </a>

                                        <div class="stick-bottom-left-right">
                                            <div class="progress progress-hairline no-margin">
                                                <?php if($note->progress < 33): ?>
                                                    <div class="progress-bar progress-bar-danger" style="width:<?php echo e($note->progress); ?>%"></div>
                                                <?php elseif($note->progress > 33 and $note->progress < 66): ?>
                                                    <div class="progress-bar progress-bar-warning" style="width:<?php echo e($note->progress); ?>%"></div>
                                                <?php elseif($note->progress > 66): ?>
                                                    <div class="progress-bar progress-bar-success" style="width:<?php echo e($note->progress); ?>%"></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <ul class="list divider-full-bleed">
                            <li class="tile">
                                <div class="tile-content">
                                    <div class="tile-text">
                                        Aucune note pour le moment
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>