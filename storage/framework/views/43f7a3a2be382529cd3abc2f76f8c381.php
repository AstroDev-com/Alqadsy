<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('styles'); ?>
    <style>
        /* ضمان عرض الشرائح في الوسط مع التحجيم المناسب */
        .lg-outer.lg-slide .lg-item {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer.lg-slide .lg-item .lg-img-wrap {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
            text-align: center !important;
            padding: 0 !important;
        }
        
        .lg-outer.lg-slide .lg-image,
        .lg-outer.lg-slide .lg-object {
            max-width: 90vw !important;
            max-height: 90vh !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain !important;
            margin: auto !important;
            display: block !important;
            position: relative !important;
            left: auto !important;
            right: auto !important;
        }
        
        /* توسيط جميع الصور في المعرض */
        .lg-outer .lg-item {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer .lg-img-wrap {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer .lg-image,
        .lg-outer .lg-object {
            margin: auto !important;
            display: block !important;
        }
        
        /* توسيط الصور في lg-inner عند فتحها مباشرة عبر hash */
        .lg-outer.lg-slide .lg-inner {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        .lg-outer.lg-slide .lg {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        /* عند السحب على زر المشاركة - خلفية سوداء وخط واضح */
        .lg-outer #lg-share:hover {
            background-color: #000 !important;
            color: #FFF !important;
        }
        
        /* قائمة المشاركة - خلفية سوداء وخط أبيض */
        .lg-outer .lg-dropdown {
            background-color: #000 !important;
        }
        
        .lg-outer .lg-dropdown:after {
            border-bottom-color: #000 !important;
        }
        
        .lg-outer .lg-dropdown a {
            color: #FFF !important;
        }
        
        .lg-outer .lg-dropdown a:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: #FFF !important;
        }
        
        .lg-outer .lg-dropdown .lg-icon {
            color: #FFF !important;
        }
        
        .lg-outer .lg-dropdown > li:hover a,
        .lg-outer .lg-dropdown > li:hover .lg-icon {
            color: #FFF !important;
        }
    </style>
    <?php $__env->stopPush(); ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row" id="lightgallery">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $imageUrl = $info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png');
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo e($imageUrl); ?>" data-sub-html="<h4><?php echo e($info->name); ?></h4><?php if(!empty($info->description)): ?><p><?php echo e(Str::limit($info->description, 80)); ?></p><?php endif; ?>">
                    <a href="<?php echo e($imageUrl); ?>"><img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($info->name); ?>" class="img-fluid"></a>
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