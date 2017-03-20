<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach($errors->all() as $error): ?>
               <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
</div>
<?php endif; ?>
