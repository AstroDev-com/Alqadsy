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
                    
                    <input type="hidden" name="name" value="auto">
                    <input type="hidden" name="description" value="auto">
                    <div class="form-group mb-3">
                        <label for="images"><?php echo e(__('dashboard.product_images')); ?></label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <div class="form-group mb-4">
                        <label for="category_id"><?php echo e(__('dashboard.category')); ?></label>
                        <select name="category_id" class="form-control" required>
                            <option value="" disabled selected>-- اختر القسم --</option>
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u746187910/domains/alqadsy.com/public_html/resources/views/admin/products/create.blade.php ENDPATH**/ ?>