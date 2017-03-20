<?php $__env->startSection('title'); ?> Consulter l'appel de <?php echo e($call->client_name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-<?php echo e(Config::get('status_color.' . $call->status)); ?>">
                    <h3 style="padding-left: 20px;">
                        <?php echo e(Config::get('call_status.' . $call->status)); ?> &nbsp - &nbsp <?php if($call->status == 1): ?> le <?php else: ?> Derniere modification :<?php endif; ?> <?php echo e(get_french_date($call->updated_at)); ?>


                        <?php if(get_total_duration($call) > 0): ?> &nbsp - &nbsp Durée totale : <?php echo e(substr(get_total_duration($call), 2)); ?> <?php endif; ?>

                        <?php if( ! is_null($call->client_id)): ?>
                            <a href="<?php echo e(action('AdminClientsController@showClient', [$call->client_id])); ?>" style="padding-top: 12px; padding-right: 30px" class="btn btn-icon pull-right">
                            <i class="glyphicon glyphicon-user" style="display: inline; font-size: 30px; line-height: 0px;"></i></a>
                        <?php endif; ?>


                        <a href="<?php echo e(action('AdminCallsController@calls')); ?>" style="padding-top: 12px; padding-right: 30px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-earphone" style="display: inline; font-size: 30px; line-height: 0px;"></i>
                        </a>
                    </h3>
                </div>

                <div class="card-body">

                    <ul class="list divider-full-bleed">

                        <div class="row">
                            <div class="col-lg-6">
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Destiné à', 'value' => findUsersById($call->user_id, true)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div class="col-lg-6">
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Nom du client', 'value' => $call->client_name], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <?php if( ! empty($call->company)): ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Entreprise', 'value' => $call->company], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php else: ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Entreprise', 'value' => '...'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <?php if( ! empty($call->email)): ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Email', 'value' => $call->email], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php else: ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Email', 'value' => '...'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <?php if( ! empty($call->phone)): ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Numéro de téléphone', 'value' => $call->phone], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php else: ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Numéro de téléphone', 'value' => '...'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <?php if( ! empty($call->mobile) ): ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Numéro de mobile', 'value' => $call->mobile], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php else: ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Numéro de mobile', 'value' => '...'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                &nbsp
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $__env->make('partials.lists-text', ['key' => 'Objet de l\'appel', 'value' => $call->object], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                &nbsp
                            </div>
                        </div>

                        <li class="tile">
                            <div class="tile-text">
                                Interventions

                                <ul class="list divider-full-bleed">
                                    <?php foreach($call->tickets as $ticket): ?>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-text">
                                                    <i><?php echo e(get_french_date($ticket->updated_at)); ?> &nbsp - &nbsp <?php echo e($ticket->duration); ?> <?php echo e(str_plural('minute', $ticket->duration)); ?> </i> &nbsp
                                                    <a href="<?php echo e(action('AdminCallsController@editTicket', [$ticket->id])); ?>" class="btn-icon">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a>
                                                        <small>
                                                            <?php echo nl2br($ticket->description); ?>

                                                        </small>
                                                </div>
                                                <div class="tile-icon">
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <div class="row">

                        <a href="<?php echo e(action('AdminCallsController@addTicket', [$call->id])); ?>" class="btn ink-reaction btn-<?php echo e(Config::get('call_status.' . $call->status)); ?>">Ajouter un ticket</a>

                        <a href="<?php echo e(action('AdminCallsController@editCall', [$call->id])); ?>" class="btn ink-reaction btn-<?php echo e(Config::get('call_status.' . $call->status)); ?>">Modifier l'appel</a>

                        <a href="<?php echo e(action('AdminCallsController@setStatus', [$call->id])); ?>" class="btn ink-reaction btn-<?php echo e(Config::get('call_status.' . $call->status)); ?>">Modifier le statut de l'appel</a>

                        <?php if(empty($call->client_id)): ?>
                            <a href="<?php echo e(action('AdminCallsController@pairCall', [$call->id])); ?>" class="btn ink-reaction btn-<?php echo e(Config::get('call_status.' . $call->status)); ?>">Associer à un client</a>
                        <?php else: ?>
                            <a href="<?php echo e(action('AdminCallsController@pairCall', [$call->id])); ?>" class="btn ink-reaction btn-<?php echo e(Config::get('call_status.' . $call->status)); ?>">Modifier le client associé</a>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>