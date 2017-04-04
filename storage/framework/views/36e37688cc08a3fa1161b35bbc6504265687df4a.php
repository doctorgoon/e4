<?php if(isset($ticket)): ?>
    <?php $__env->startSection('title'); ?>Modifier Ticket <?php $__env->stopSection(); ?>
<?php else: ?>
    <?php $__env->startSection('title'); ?>Ajouter Ticket <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-<?php echo e(Config::get('status_color.' . $call->status)); ?>">
                <h3>
                    <a href="<?php echo e(action('AdminCallsController@showCall', [$call->id])); ?>" class="btn btn-icon">
                        <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                    </a>
                <?php echo e(\Carbon\Carbon::parse($call->updated_at)->format('d/m/Y H:i')); ?> - <?php echo e($call->client_name); ?>

                </h3>
            </div>
            <div class="card-body">

                <?php if(isset($ticket)): ?>
                    <?php echo Form::model($ticket); ?>

                <?php else: ?>
                    <?php echo Form::open(); ?>

                <?php endif; ?>

                <?php echo Form::hidden('call_id', $call->id); ?>


                <div class="form-group">
                    <?php echo Form::label('description', 'Intervention : '); ?>

                    <?php echo Form::textarea('description', null, ['class' => 'form-control autosize', 'rows' => 2]); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('duration', 'Durée de l\'appel (en minutes) : '); ?>

                    <?php echo Form::text('duration', null, ['class' => 'form-control']); ?>

                </div>

                <?php if(isset($ticket)): ?>
                        <div class="form-group">
                            <?php echo Form::submit('Modifier', ['class' => 'btn btn-' . Config::get('status_color.' . $call->status). ' ink-reaction']); ?>

                        </div>
                <?php else: ?>
                        <div class="form-group">
                            <?php echo Form::submit('Ajouter', ['class' => 'btn btn-' . Config::get('status_color.' . $call->status). 'ink-reaction']); ?>

                        </div>
                <?php endif; ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>