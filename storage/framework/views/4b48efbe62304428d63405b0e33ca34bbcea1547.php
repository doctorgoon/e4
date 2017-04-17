<?php $__env->startSection('content'); ?>

    <section class="section-account">
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <br/>
                        <span class="text-lg text-bold text-primary">Portail d'administration</span>
                        <br/><br/>
                        <?php echo Form::open(['class' => 'form']); ?>


                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username">
                                <label for="username">Identifiant</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="password">Mot de passe</label>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-6 text-right">
                                    <button class="btn btn-primary btn-raised" type="submit">Connexion</button>
                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                        <br>
                        <br>
                        <div class="card">
                            <div class="card-body no-padding">
                                <ul class="list divider-full-bleed">
                                    <li class="tile">
                                        <a class="tile-content ink-reaction" href="<?php echo e(asset('/project_1.pdf')); ?>">
                                            <div class="tile-icon">
                                                <i class="fa fa-inbox"></i>
                                            </div>
                                            <div class="tile-text">
                                                PDF Projet 1
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction" href="<?php echo e(asset('/project_2.pdf')); ?>">
                                            <div class="tile-icon">
                                                <i class="fa fa-inbox"></i>
                                            </div>
                                            <div class="tile-text">
                                                PDF Projet 2
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction" href="/app/apk">
                                            <div class="tile-icon">
                                                <i class="fa fa-cloud-download"></i>
                                            </div>
                                            <div class="tile-text">
                                                Fichier .apk
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end .card-body -->
                        </div>
                    </div><!--end .col -->

                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>