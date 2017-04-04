<?php $__env->startSection('title'); ?> Fiche client de <?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
            <!-- BEGIN ADD CONTACTS FORM -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head style-info">
                        <header style="font-size: 22px; padding-top: 17px">Fiche Client</header>

                        <a href="<?php echo e(action('AdminClientsController@destroyClient', [$client->id])); ?>" style="padding-top: 25px; padding-right: 30px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-trash" style="display: inline; font-size: 25px; line-height: 0px;"></i></a>

                        <a href="<?php echo e(action('AdminClientsController@editClient', [$client->id])); ?>" style="padding-top: 25px; padding-right: 30px" class="btn btn-icon pull-right">
                        <i class="glyphicon glyphicon-pencil" style="display: inline; font-size: 25px; line-height: 0px;"></i></a>

                    </div>
                    <form class="form" role="form">
                        <!-- BEGIN DEFAULT FORM ITEMS -->
                        <div class="card-body style-info form-inverse">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input class="form-control input-lg dirty" id="firstname" name="firstname" value="<?php echo e($client->firstname); ?>" type="text" disabled>
                                                <label for="firstname">Prénom</label>
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input class="form-control input-lg dirty" id="lastname" name="lastname" value="<?php echo e($client->lastname); ?>" type="text" disabled>
                                                <label for="lastname">Nom</label>
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input class="form-control input-lg dirty" id="company" name="company" value="<?php echo e($client->company); ?>" type="text" disabled>
                                                <label for="company">Entreprise</label>
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input class="form-control input-lg dirty" id="type" name="type" value="<?php echo e($client->type); ?>" type="text" disabled>
                                                <label for="type">Fonction</label>
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .card-body -->
                        <!-- END DEFAULT FORM ITEMS -->

                        <!-- BEGIN FORM TABS -->
                        <div class="card-head style-default">
                            <ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
                                <li class="active"><a href="#contact">INFOS</a></li>
                                <li class=""><a href="#calls">APPELS</a></li>
                            </ul>
                        </div><!--end .card-head -->
                        <!-- END FORM TABS -->

                        <!-- BEGIN FORM TAB PANES -->
                        <div class="card-body tab-content">
                            <div class="tab-pane active" id="contact">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="mobile" name="mobile" value="<?php echo e($client->mobile); ?>" type="text" disabled>
                                                    <label for="mobile">Mobile</label>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="phone" name="phone" value="<?php echo e($client->phone); ?>" type="text" disabled>
                                                    <label for="phone">Téléphone</label>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="email" name="email" value="<?php echo e($client->email); ?>" type="text" disabled>
                                                    <label for="email">Email</label>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="fax" name="fax" value="<?php echo e($client->fax); ?>" type="text" disabled>
                                                    <label for="fax">Fax</label>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="form-group">
                                            <input class="form-control" id="address" name="address" value="<?php echo e($client->address); ?>" type="text" disabled>
                                            <label for="address">Adresse</label>
                                        </div><!--end .col -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input class="form-control" id="city" name="city" value="<?php echo e($client->city); ?>" type="text" disabled>
                                                    <label for="city">Ville</label>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" id="zipcode" name="zipcode" value="<?php echo e($client->zipcode); ?>" type="text" disabled>
                                                    <label for="zipcode">Code Postal</label>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                    </div><!--end .col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        </div>
                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </div><!--end .tab-pane -->

                            <div class="tab-pane" id="calls">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach($calls as $call): ?>
                                            <div class="card">
                                                <div class="card-body no-padding">
                                                    <ul class="list">
                                                        <li class="tile">
                                                            <a href="<?php echo e(action('AdminCallsController@showCall', [$call->id])); ?>" style="text-decoration: none" class="tile-content ink-reaction">
                                                                <div class="tile-icon">
                                                                    <i class="md md-notifications <?php if($call->status == 0): ?> text-danger <?php else: ?> text-<?php echo e(Config::get("status_color." .$call->status)); ?> <?php endif; ?>" style="font-size: 30px; margin-top: 0px; line-height: 0px; vertical-align: top;"></i>
                                                                </div>
                                                                <div class="tile-text" style="width: 10%"><?php echo e(findUsersById($call->user_id, false)); ?></div>
                                                                <div class="tile-text" style="width: 89%;">
                                                                    <!--<div class="style-danger" style="height: 5px; width: 50px;"></div>-->
                                                                    <b><?php echo e($call->client_name); ?></b> - (<?php echo e(get_french_date($call->updated_at)); ?>)
                                                                    <small>
                                                                        <?php echo e($call->object); ?>

                                                                    </small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                            <a href="<?php echo e(action('AdminCallsController@addClientCall', [$client->id])); ?>" class="btn ink-reaction btn-info">Ajouter un appel</a>
                                    </div>
                                </div>
                            </div><!--end .tab-pane-->
                        </div>
                        <!-- END FORM TAB PANES -->




                        <!-- BEGIN FORM FOOTER -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <a class="btn btn-flat" href="<?php echo e(action('AdminClientsController@clients')); ?>">Retour</a>
                            </div><!--end .card-actionbar-row
                            <div class="card-actionbar-row">
                                <a class="btn btn-flat btn-danger" href="<?php echo e(action('AdminClientsController@destroyClient', [$client->id])); ?>">Supprimer Client</a>
                            </div>--><!--end .card-actionbar-row -->
                        </div><!--end .card-actionbar -->
                        <!-- END FORM FOOTER -->

                    </form>
                </div><!--end .card -->
            </div><!--end .col -->
            <!-- END ADD CONTACTS FORM -->

        </div><!--end .row -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>