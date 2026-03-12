<?php if($activities->isEmpty()): ?>
    <p class="text-muted text-center"><?php echo e(__('dashboard.no_activities_found')); ?></p>
<?php else: ?>
    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="timeline-item">
            <div
                class="timeline-point bg-<?php echo e($loop->iteration % 3 == 1 ? 'primary' : ($loop->iteration % 3 == 2 ? 'success' : 'warning')); ?>">
            </div>
            <h6 class="fw-bold mb-1">
                
                
                
                <?php echo e(__('dashboard.new_activity')); ?>

                <?php $route = '#'; ?>
                
            </h6>
            <p class="text-muted small mb-1"><?php echo e($activity->created_at->diffForHumans()); ?></p>
            <p class="mb-0 small">
                
                
                
            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\partials\activity_items.blade.php ENDPATH**/ ?>