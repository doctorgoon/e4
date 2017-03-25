<?php $__env->startSection('title'); ?>

    <?php if(isset($note)): ?>
        Modifier la note <?php echo e($note->title); ?>

    <?php else: ?>
        Ajouter une note
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary">
                    <h3>
                        <?php if(isset($note)): ?>
                            <a href="<?php echo e(action('AdminController@readANote', [$note->id])); ?>" class="btn btn-icon">
                                <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                            </a>
                            Modifier la note <?php echo e($note->title); ?>

                        <?php else: ?>
                            <a href="<?php echo e(action('AdminController@myNotes')); ?>" class="btn btn-icon">
                                <i class="glyphicon glyphicon-arrow-left" style="display: inline; font-size: 18px; line-height: 0px;"></i>
                            </a>
                            Ajouter une note
                        <?php endif; ?>
                    </h3>
                </div>
                <div class="card-body">
                    <?php if(isset($note)): ?>
                        <?php echo Form::model($note); ?>

                    <?php else: ?>
                        <?php echo Form::open(); ?>

                    <?php endif; ?>

                    <div class="form-group">
                        <?php echo Form::label('title', 'Titre de la note'); ?>

                        <?php echo Form::text('title', null, ['class' => 'form-control', 'autocomplete' => 'off']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('task', 'Tâche(s) à faire'); ?>

                        <?php echo Form::textarea('task', null, ['class' => 'form-control autosize', 'rows' => 2]); ?>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo Form::label('progress', 'Avancement de la note'); ?>

                                <?php echo Form::select('progress', $progress, null, ['class' => 'form-control']); ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-flat']); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>