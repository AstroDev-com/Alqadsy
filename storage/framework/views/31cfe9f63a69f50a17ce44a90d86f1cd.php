<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center mt-3" dir="rtl">
        <div class="card shadow w-100" style="max-width: 600px;">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0"><?php echo e(__('dashboard.create_product')); ?></h3>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('admin.products.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(__('dashboard.name')); ?></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description"><?php echo e(__('dashboard.description')); ?></label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image"><?php echo e(__('dashboard.product_image')); ?></label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status"><?php echo e(__('dashboard.status')); ?></label>
                        <select name="status" class="form-control" required>
                            <option value="1"><?php echo e(__('dashboard.active')); ?></option>
                            <option value="0"><?php echo e(__('dashboard.inactive')); ?></option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="category_id"><?php echo e(__('dashboard.category')); ?></label>
                        <select name="category_id" class="form-control" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-plus"></i> <?php echo e(__('dashboard.create_product')); ?>

                        </button>
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-right"></i> <?php echo e(__('dashboard.back')); ?>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/admin/products/create.blade.php ENDPATH**/ ?>