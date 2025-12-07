<?php $__env->startSection('content'); ?>
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row" id="lightgallery">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade">
                    <a href="<?php echo e(asset($product->image ?? 'admin/assets/img/product_default.png')); ?>" class="image-popup">
                        <img src="<?php echo e(asset($product->image ?? 'admin/assets/img/product_default.png')); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid my-3" style="max-height:300px;">
                    </a>
                    <div class="text-center">
                        <h4 class="site-section-heading"><?php echo e($product->name); ?></h4>
                        <p><?php echo e($product->description); ?></p>
                        <p><strong>التصنيف:</strong> <?php echo e($product->category->name ?? '-'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/frontend/show.blade.php ENDPATH**/ ?>