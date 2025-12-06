<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center mt-4" dir="rtl">
        <div class="card shadow rounded-4 w-100" style="max-width: 420px;">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0"><?php echo e(__('dashboard.products')); ?> <?php echo e(__('dashboard.details')); ?></h4>
            </div>
            <div class="card-body text-center">
                <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" class="mb-3"
                    style="max-width: 160px; max-height: 160px; border-radius: 16px; border:1px solid #eee; box-shadow:0 2px 8px #0001;">
                <h5 class="card-title mb-3"><?php echo e($product->name); ?></h5>
                <ul class="list-group list-group-flush text-end mb-3">
                    <li class="list-group-item"><strong><?php echo e(__('dashboard.description')); ?>:</strong>
                        <?php echo e($product->description); ?></li>
                    <li class="list-group-item">
                        <strong><?php echo e(__('dashboard.status')); ?>:</strong>
                        <?php if($product->status == 1): ?>
                            <span class="badge bg-success"><?php echo e(__('dashboard.active')); ?></span>
                        <?php else: ?>
                            <span class="badge bg-danger"><?php echo e(__('dashboard.inactive')); ?></span>
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item"><strong><?php echo e(__('dashboard.category')); ?>:</strong>
                        <?php echo e($product->category->name); ?></li>
                </ul>
                <div class="d-flex justify-content-between gap-2">
                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-warning px-4">
                        <i class="fas fa-edit"></i> <?php echo e(__('dashboard.edit')); ?>

                    </a>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary px-4">
                        <i class="fas fa-arrow-right"></i> <?php echo e(__('dashboard.back')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/admin/products/show.blade.php ENDPATH**/ ?>