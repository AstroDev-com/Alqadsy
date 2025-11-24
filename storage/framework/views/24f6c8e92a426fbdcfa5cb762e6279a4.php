<?php $__env->startSection('content'); ?>
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center"><?php echo e($category->name); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="lightgallery">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo e(asset($product->image ? $product->image : 'admin/assets/img/product_default.png')); ?>" data-sub-html="<h4><?php echo e($product->name); ?></h4>">
                        <a href="<?php echo e(route('frontend.product.show', $product->id)); ?>">
                            <img src="<?php echo e(asset($product->image ? $product->image : 'admin/assets/img/product_default.png')); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center">
                        <p>لا توجد منتجات في هذا التصنيف حالياً.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/frontend/category.blade.php ENDPATH**/ ?>