<?php echo $__env->make('partials.form-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(isset($user)): ?>
    <?php echo Form::model($user, array('class'=>'form-group', 'files' => true)); ?>

<?php else: ?>
    <?php echo Form::open(array('class'=>'form-group', 'files' => true)); ?>

<?php endif; ?>

<div class="form-group">
    <?php echo Form::label('firstname', 'Prénom'); ?>

    <?php echo Form::text('firstname', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('lastname', 'Nom'); ?>

    <?php echo Form::text('lastname', null, ['class' => 'form-control']); ?>

</div>

<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<div class="form-group">
    <?php echo Form::label('email', 'Adresse e-mail'); ?>

    <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <br>
    <?php echo Form::submit('Ajouter',  ['class' => 'btn btn-primary ink-reaction']); ?>

</div>

<?php echo Form::close(); ?>