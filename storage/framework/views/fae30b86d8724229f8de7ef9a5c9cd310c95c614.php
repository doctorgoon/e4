
<?php if(isset($product)): ?>
    <?php echo Form::model($product, array('class'=>'form-group', 'files' => true)); ?>

<?php else: ?>
    <?php echo Form::open(array('class'=>'form-group', 'files' => true)); ?>

<?php endif; ?>

<div class="form-group">
    <?php echo Form::label('name', 'Nom'); ?>

    <?php echo Form::text('name', null , ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('ref', 'Référence'); ?>

    <?php echo Form::text('ref', null , ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('image', 'URL de l\'image'); ?>

    <?php echo Form::text('image', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('upload', 'Upload de l\'image'); ?>

    <br><br>
    <?php echo Form::file('upload', null, ['class' => 'form-control']); ?>

</div>
<br>

<div class="form-group">
    <div class="checkbox checkbox-styled">
        <label>
            <?php echo Form::checkbox('available', 0); ?> <span>Disponible</span> &nbsp;
        </label>
        <label>
            <?php echo Form::checkbox('expedited', 0); ?> <span>Expédié</span>
        </label>
    </div>
</div>


<div class="form-group">
    <br>
    <?php echo Form::submit($submitButtonText,  ['class' => 'btn btn-primary ink-reaction']); ?>

</div>



<?php echo Form::close(); ?>