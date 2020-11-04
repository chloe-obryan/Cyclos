<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($notification->vu): ?>
                        <a href="<?php echo e($notification->url); ?>" class="list-group-item">
                            <h4 class="list-group-item-heading"><?php echo e($notification->contenu); ?></h4>
                            <p class="list-group-item-text"><?php echo e(Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()); ?></p>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('notificationVu',$notification->id)); ?>" class="list-group-item active">
                            <h4 class="list-group-item-heading"><?php echo e($notification->contenu); ?></h4>
                            <p class="list-group-item-text"><?php echo e(Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()); ?></p>
                        </a>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/notification.blade.php ENDPATH**/ ?>