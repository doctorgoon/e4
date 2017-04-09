<?php $__env->startSection('title'); ?> Gestion des utilisateurs <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if(count($users) > 0): ?>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Adresse e-mail</th>
                                    <th>Dernière IP</th>
                                    <th>Dernière connexion</th>
                                    <th>Créé le</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo e($user->firstname); ?></td>
                                    <td><?php echo e($user->lastname); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->ip); ?></td>
                                    <td><?php echo e($user->last_access); ?></td>
                                    <td><?php echo e($user->created_at); ?></td>
                                    <td><a href="<?php echo e(action('AdminUsersController@editUser', [$user->id])); ?>"> <center> <span style="color:#848484; font-size: 25px"><i class="glyphicon glyphicon-edit"></i></span></center></a></td>
                                    <td><a href="<?php echo e(action('AdminUsersController@deleteUser', [$user->id])); ?>"><center> <span style="color:#848484; font-size: 25px"><i class="glyphicon glyphicon-trash"></i></span></center></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div><!--end .table-responsive -->
                </div><!--end .card-body -->
            </div><!--end .card -->
            <a href="<?php echo e(action('AdminUsersController@addUser')); ?>" class="btn btn-primary pull-right">Ajouter un utilisateur</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>