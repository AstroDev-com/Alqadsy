<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="<?php echo e($category->image ? asset($category->image) : asset('admin/assets/img/product_default.png')); ?>"
                                class="rounded-circle border shadow-sm" alt="<?php echo e($category->name); ?>"
                                style="width: 120px; height: 120px; object-fit:cover;">
                        </div>
                        <h3 class="card-title mb-2"><?php echo e($category->name); ?></h3>
                        <p class="card-text mb-2"><strong><i class="fa fa-align-left me-1"></i> الوصف:</strong>
                            <?php echo e($category->description); ?></p>
                        <p class="card-text mb-3">
                            <strong><i class="fa fa-toggle-on me-1"></i> الحالة:</strong>
                            <?php if($category->status == 1): ?>
                                <span class="badge bg-success">نشط</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">غير نشط</span>
                            <?php endif; ?>
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-primary">
                                <i class="fa fa-edit me-1"></i> تعديل
                            </a>
                            <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-secondary">
                                <i class="fa fa-arrow-right me-1"></i> عودة
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\categories\show.blade.php ENDPATH**/ ?>