<?php $__env->startSection('title'); ?> <?php echo e($product->name); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <h3 style="padding-left: 24px">
                    <?php echo e($product->name); ?>

                    <a href="<?php echo e(action('AdminProductsController@editProduct', [$product->id])); ?>" style="padding-top: 10px; padding-right: 20px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-pencil" style="display: inline; font-size: 20px; line-height: 0px"></i>
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <ul class="list divider-full-bleed">
                    <?php if( !empty($product->image)): ?> <br /><img  src="<?php echo e($product->image); ?>" style="max-height:300px;"><br /><br /><?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(! empty($product->ref)): ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Référence', 'value' => $product->ref], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php else: ?> <?php echo $__env->make('partials.lists-text', ['key' => 'Référence', 'value' => "..."], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-styled">
                                    <label>
                                        <input <?php if($product->available == 1): ?>checked="checked"<?php endif; ?> type="checkbox" class="checkbox checkbox-styled" value="<?php echo e($product->available); ?>" disabled> <span>Disponible</span> &nbsp;
                                    </label>
                                    <label>
                                        <input <?php if($product->expedited == 1): ?>checked="checked"<?php endif; ?> type="checkbox" class="checkbox checkbox-styled" value="<?php echo e($product->expedited); ?>" disabled> <span>Expédié</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>