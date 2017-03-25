<ul class="list divider-full-bleed">
    <?php foreach($clients as $client): ?>
        <li class="tile">
            <?php if($origin == 'calls'): ?>
                <a href="javascript: void(0);"  onclick="setClientToTicket('<?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?>', <?php echo e($client->id); ?>);" >
            <?php elseif($origin == 'clients'): ?>
                <a href="<?php echo e(action('AdminClientsController@showClient', [$client->id])); ?>">
            <?php endif; ?>
                <div class="tile-text">
                    <?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?>

                    <small>
                        <?php if(!empty($client->company)): ?> <?php echo e($client->company); ?> - <?php endif; ?>
                        <?php if(!empty($client->phone)): ?> <?php echo e($client->phone); ?> - <?php endif; ?>
                        <?php if(!empty($client->mobile)): ?> <?php echo e($client->mobile); ?> - <?php endif; ?>
                        <?php if(!empty($client->email)): ?> <?php echo e($client->email); ?> <?php endif; ?>
                    </small>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>