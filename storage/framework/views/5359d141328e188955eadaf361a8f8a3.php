<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header bg-success text-white d-flex align-items-center">
                        <i class="fa fa-plus-circle me-2"></i>
                        <h4 class="mb-0">إنشاء فئة جديدة</h4>
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
                        <form action="<?php echo e(route('admin.categories.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3 row align-items-center">
                                <label for="name" class="col-sm-2 col-form-label">الاسم <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="<?php echo e(old('name')); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="description" class="col-sm-2 col-form-label">الوصف <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" id="description" class="form-control" required
                                        value="<?php echo e(old('description')); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="status" class="col-sm-2 col-form-label">الحالة <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>نشط</option>
                                        <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>غير نشط</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-secondary me-2"> <i
                                        class="fa fa-arrow-right me-1"></i> عودة</a>
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fa fa-check-circle me-1"></i> إنشاء
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy_lastupdate\Alqadsy\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>