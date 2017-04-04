<?php $__env->startSection('title'); ?> Modifier le statut de l'appel #<?php echo e($call->id); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-<?php echo e(Config::get('status_color.' . $call->status)); ?>">
                    <h2 style="padding-left: 10px; padding-bottom: 10px ">
                        <a href="<?php echo e(action('AdminCallsController@showCall', [$call->id])); ?>" class="btn btn-icon">
                            <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                        </a>
                        &nbsp Appel de <?php echo e($call->client_name); ?> &nbsp-&nbsp <?php echo e(get_french_date($call->created_at)); ?>

                    </h2>
                </div>
                <div class="card-body">
                    <?php echo Form::model($call); ?>


                    <?php echo Form::hidden('call_id', $call->id); ?>


                    <div class="form-group">
                        <div class="radio radio-styled">
                            <?php for($i = 0; $i < 4; $i++): ?>
                                <label>
                                    <?php echo Form::radio('status', $i); ?> <span><?php echo e(Config::get('call_status.' . $i)); ?></span>
                                </label>
                                <br />
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::submit('Valider', ['class' => 'btn btn-flat btn-default ink-reaction']); ?>

                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>