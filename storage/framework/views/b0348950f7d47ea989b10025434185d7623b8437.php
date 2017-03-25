<?php $__env->startSection('title'); ?> Associer appel <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-<?php echo e(Config::get('status_color.' . $call->status)); ?>">
                    <a class="btn ink-reaction btn-floating-action btn-lg btn-default btn-fixed-right"  href="<?php echo e(action('AdminClientsController@addClientCall', [$call->id])); ?>"><i class="glyphicon glyphicon-plus"></i></a>
                    <h2 style="padding-left: 10px; padding-bottom: 10px ">
                        <a href="<?php echo e(action('AdminCallsController@showCall', [$call->id])); ?>" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        <?php if(isset($exist)): ?> <?php echo e($exist); ?> <?php else: ?> Associer à un client <?php endif; ?>
                    </h2>
                </div>
                <div class="card-body">

                    <?php echo Form::open(); ?>

                    <input type="text" class="form-control" placeholder="Rechercher un client..." onkeyup="searchClientByTicket($(this).val())" />
                    <input type="hidden" name="client_id" id="client_id" />
                    <input type="submit" id="submit" style="display: none;" />
                    <?php echo Form::close(); ?>


                    <div id="results">

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>