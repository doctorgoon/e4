<?php $__env->startSection('title'); ?> Appels téléphoniques <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <a class="btn ink-reaction btn-floating-action btn-lg btn-primary btn-fixed-right"  href="<?php echo e(action('CallsController@addCall')); ?>"><i class="glyphicon glyphicon-plus"></i></a>
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="<?php if(!Session::has('calls_tab')): ?> active <?php endif; ?>"><a href="#all-calls">Tous les Appels </a></li>
                    <li class="<?php if(Session::has('calls_tab')): ?> active <?php endif; ?>"><a href="#my-calls">Mes Appels</a></li>
                </ul>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane <?php if(!Session::has('calls_tab')): ?> active <?php endif; ?>" id="all-calls">

                    <div style="font-family:Helvetica; font-size: 15px">
                    &nbsp;
                        <a href="<?php echo e(action('CallsController@calls')); ?>" style="text-decoration: none" class="tile-content ink-reaction">
                        Non Traités &nbsp <sup class="badge style-danger"><?php echo e($countNonTreated); ?></sup></a> &emsp; &emsp;
                        A recontacter &nbsp <sup class="badge style-warning"><?php echo e($countToCall); ?></sup> &emsp; &emsp;
                        En attente de rappel &nbsp <sup class="badge style-info"><?php echo e($countInWaiting); ?></sup> &emsp; &emsp;
                        Traités &nbsp <sup class="badge style-success"><?php echo e($countTreated); ?></sup>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <ul class="list">
                                        <?php if($totalCalls > 0): ?>
                                            <?php foreach($allCalls as $calls): ?>
                                                <?php foreach($calls as $indice => $call): ?>
                                                    <li class="tile">
                                                        <a href="<?php echo e(action('CallsController@showCall', [$call->id])); ?>" style="text-decoration: none" class="tile-content ink-reaction">
                                                            <div class="tile-icon">
                                                                <i class="md md-notifications <?php if($call->status == 0): ?> text-danger <?php else: ?> text-<?php echo e(Config::get('status_color.' . $call->status)); ?> <?php endif; ?>" style="font-size: 30px; margin-top: 0px; line-height: 0px; vertical-align: top;"></i>
                                                            </div>
                                                            <div class="tile-text" style="width: 10%"><?php echo e(findUsersById($call->user_id, false)); ?></div>

                                                            <div class="tile-text" style="width: 89%;">
                                                                <!--<div class="style-danger" style="height: 5px; width: 50px;"></div>-->
                                                                <b><?php echo e($call->client_name); ?></b> - <span style="color:#848484"><i><?php echo e(get_french_date($call->updated_at)); ?></i></span>
                                                                <small>
                                                                    <?php echo e(substr($call->object,0,70)); ?>

                                                                </small>

                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="tile">
                                                <div class="tile-content">
                                                    Aucun appel téléphonique pour le moment
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane <?php if(Session::has('calls_tab')): ?> active <?php endif; ?>" id="my-calls">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-head">
                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#bloc-0">Non traités &nbsp <sup class="badge style-danger"><?php echo e($myCountNonTreated); ?></sup></a></li>
                                        <li class=""><a href="#bloc-1">Traité &nbsp <sup class="badge style-success"><?php echo e($myCountTreated); ?></sup></a></li>
                                        <li class=""><a href="#bloc-2">A rappeler &nbsp <sup class="badge style-warning"><?php echo e($myCountToCall); ?></sup></a></li>
                                        <li class=""><a href="#bloc-3">En attente de rappel &nbsp <sup class="badge style-info"><?php echo e($myCountInWaiting); ?></sup></a></li>
                                    </ul>
                                </div>

                                <div class="card-body tab-content">
                                    <?php foreach($myCalls as $indice => $calls): ?>
                                        <div class="tab-pane <?php if($indice == 0): ?> active <?php endif; ?>" id="bloc-<?php echo e($indice); ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card-body no-padding">
                                                        <ul class="list">
                                                            <?php foreach($calls as $call): ?>
                                                                <li class="tile">
                                                                    <a href="<?php echo e(action('CallsController@showCall', [$call->id])); ?>" style="text-decoration: none" class="tile-content ink-reaction">
                                                                        <div class="tile-icon">
                                                                                <i class="md md-notifications <?php if($call->status == 0): ?> text-danger <?php else: ?> text-<?php echo e(Config::get('status_color.' . $call->status)); ?> <?php endif; ?>" style="font-size: 30px; margin-top: 0px; line-height: 0px; vertical-align: top;"></i>
                                                                        </div>

                                                                        <div class="tile-text" style="width: 89%;">
                                                                            <!--<div class="style-danger" style="height: 5px; width: 50px;"></div>-->
                                                                            <b><?php echo e($call->client_name); ?></b> - (<?php echo e(get_french_date($call->updated_at)); ?>)
                                                                            <small>
                                                                                <?php echo e(substr($call->object,0,70)); ?>

                                                                            </small>

                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>