<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row" id="lightgallery">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo e($info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png')); ?>" data-sub-html="<h4><?php echo e($info->name); ?></h4><?php if(!empty($info->description)): ?><p><?php echo e(Str::limit($info->description, 80)); ?></p><?php endif; ?>">
                    <a href="#"><img src="<?php echo e($info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png')); ?>" alt="Image" class="img-fluid"></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">لا توجد منتجات لعرضها حالياً.</div>
                </div>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/frontend/gallery.blade.php ENDPATH**/ ?>