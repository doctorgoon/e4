<?php $__env->startSection('title'); ?> Suivi des clients <?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active"><h2>Contacts</h2></li>
            </ol>
        </div>

        <div class="section-body">
            <div class="card">

                <!-- BEGIN SEARCH HEADER -->
                <div class="card-head style-info">
                    <div class="tools pull-left">
                        <?php echo Form::open(['method'=>'GET','url'=>'administration/clients','class'=>'navbar-search','role'=>'search']); ?>

                            <div class="form-group">
                                <input type="text" class="form-control" name="contactSearch" placeholder="Rechercher...">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        <?php echo Form::close(); ?>

                    </div>
                    <div class="tools" style="padding-top: 5px">
                        <a class="btn btn-floating-action btn-default-light" href="<?php echo e(action('AdminClientsController@addClient')); ?>"><i class="fa fa-plus"></i></a>
                    </div>
                </div><!--end .card-head -->
                <!-- END SEARCH HEADER -->

                <!-- BEGIN SEARCH RESULTS -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-8 col-md-9 col-lg-12">

                            <!-- BEGIN SEARCH RESULTS LIST -->
                            <div class="margin-bottom-xxl">
                                <span class="text-light text-lg"><strong>&nbsp;</strong></span>
                                <div class="btn-group btn-group-sm pull-right">
                                    <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="glyphicon glyphicon-arrow-down"></span> Sort
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
                                        <li><a href=<?php echo e(action('AdminClientsController@clients', ['firstname'])); ?>>Prénom</a></li>
                                        <li><a href=<?php echo e(action('AdminClientsController@clients')); ?>>Nom</a></li>
                                        <li><a href=<?php echo e(action('AdminClientsController@clients', ['email'])); ?>>Adresse Email</a></li>
                                    </ul>
                                </div>
                            </div><!--end .margin-bottom-xxl -->
                            <div class="list-results">
                                <?php if(count($clients) < 1): ?>
                                    AUCUN CLIENT TROUVÉ
                                <?php else: ?>
                                <?php foreach($clients as $client): ?>
                                <div class="col-xs-12 col-lg-6 hbox-xs">
                                    <div class="hbox-column width-2">
                                        <img class="img-circle img-responsive pull-left" src="\imgs\user.jpg'}}" alt="" title="" style="">
                                    </div>
                                    <div class="hbox-column v-top">
                                        <div class="clearfix">
                                            <div class="col-lg-12 margin-bottom-lg">
                                                <a class="text-lg text-medium" href=<?php echo e(action('AdminClientsController@showClient', [$client->id])); ?>><?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?> &nbsp; <span style="color: #9c9c9c; font-size: smaller"><i><?php echo e($client->company); ?></i></span> </a>
                                            </div>
                                        </div>
                                        <div class="clearfix opacity-75">
                                            <?php if( $client->mobile != ""): ?>
                                            <div class="col-md-5">
                                                <span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;<?php echo e($client->mobile); ?>

                                            </div>
                                            <?php elseif( $client->phone != ""): ?>
                                                <div class="col-md-5">
                                                    <span class="glyphicon glyphicon-phone-alt text-sm"></span> &nbsp;<?php echo e($client->phone); ?>

                                                </div>
                                            <?php endif; ?>
                                            <?php if( $client->email != ""): ?>
                                            <div class="col-md-<?php if( $client->mobile == "" and $client->mobile == ""): ?>5 <?php else: ?> 7 <?php endif; ?>">
                                                <span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;<?php echo e($client->email); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>

                                    </div><!--end .hbox-column -->
                                </div><!--end .hbox-xs -->
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div><!--end .list-results -->
                            <!-- BEGIN SEARCH RESULTS LIST -->

                        </div><!--end .col -->
                    </div><!--end .row -->
                </div><!--end .card-body -->
                <!-- END SEARCH RESULTS -->

            </div><!--end .card -->
        </div><!--end .section-body -->
    </section>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>