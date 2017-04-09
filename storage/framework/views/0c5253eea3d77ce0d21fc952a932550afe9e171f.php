<?php $__env->startSection('title'); ?> Administration  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h2> Tableau de bord</h2>


    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="<?php echo e(action('CallsController@calls')); ?>" style="text-decoration: none">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-<?php echo e($callsColor); ?> no-margin">
                        <strong class="pull-right text-<?php echo e($callsColor); ?> text-lg"><?php echo e($callsPercent); ?>%</strong>
                        <strong class="text-xl"> <?php echo e($calls); ?> / <?php echo e($totalCalls); ?></strong><br>
                        <span class="opacity-50">Appels non traités</span>
                        <div class="stick-bottom-left-right">
                            <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"><canvas style="display: inline-block; width: 272px; height: 80px; vertical-align: top;" width="272" height="80"></canvas></div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </a>
        </div><!--end .card -->
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="<?php echo e(action('ClientsController@clients')); ?>" style="text-decoration: none">
            <div class="card-body no-padding">
                <div class="alert alert-callout alert-info no-margin">
                    <strong class="text-xl"><?php echo e($clients); ?></strong><br>
                    <span class="opacity-50">Clients</span>
                    <div class="stick-bottom-right">
                        <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"><canvas width="265" height="40" style="display: inline-block; width: 265px; height: 40px; vertical-align: top;"></canvas></div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <a href="<?php echo e(action('ProductsController@products')); ?>" style="text-decoration: none">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-warning no-margin">
                        <strong class="text-xl"><?php echo e($productsAvailable); ?> / <?php echo e($productsExpedited); ?></strong><br>
                        <span class="opacity-50">En stock / Expédiés</span>
                        <div class="stick-bottom-right">
                            <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"><canvas width="265" height="40" style="display: inline-block; width: 265px; height: 40px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card ">
            <div class="card-head">
                <header>A faire</header>
                <div class="tools">
                    <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                </div>
            </div><!--end .card-head -->
            <div class="nano" style="height: 360px;"><div class="nano-content" tabindex="0"><div class="card-body no-padding height-9 scroll" style="height: auto;">
                        <ul class="list" data-sortable="true">
                            <?php foreach($myNotes as $note): ?>
                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <a href="<?php echo e(action('AdminController@finishNoteDash', [$note->id])); ?>" style="margin-right: -20px; text-decoration: none">
                                            <input type="checkbox" <?php if($note->progress == 100): ?>checked=""<?php endif; ?>>
                                        </a>
                                        <a href="<?php echo e(action('AdminController@readANote', [$note->id])); ?>" style="margin-right: -20px; text-decoration: none">
                                        <span>
                                            <?php echo e($note->title); ?>

                                            <small><?php echo e($note->task); ?></small>
                                        </span>
                                        </a>
                                    </label>
                                </div>
                                <a class="btn btn-flat ink-reaction btn-default" href="<?php echo e(action('AdminController@deleteANote', [$note->id])); ?>">
                                    <i class="md md-delete"></i>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div></div><div class="nano-pane"><div class="nano-slider" style="height: 240px; transform: translate(0px, 0px);"></div></div></div><!--end .card-body -->
        </div><!--end .card -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>