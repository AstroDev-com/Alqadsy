<?php $__env->startSection('title', 'الإعدادات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-12">
                <div class="card shadow-sm animate__animated animate__fadeIn">
                    <div class="card-header bg-gradient-primary text-white border-bottom-0 py-2">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-cogs me-2 animate__animated animate__rotateIn"></i>
                            لوحة التحكم - الإعدادات
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        <form id="settingsForm" action="<?php echo e(route('settings.update')); ?>" method="POST"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="row g-3">
                                <!-- الإعدادات العامة -->
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp">
                                        <div class="card-header bg-gradient-info text-white py-2">
                                            <h5 class="mb-0">
                                                <i class="fas fa-tools me-2"></i>
                                                الإعدادات العامة
                                            </h5>
                                        </div>
                                        <div class="card-body p-3">
                                            <?php $__currentLoopData = $settings['general'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div
                                                    class="form-group floating-label mb-3 animate__animated animate__fadeIn">
                                                    <?php if($setting->type == 'text' || $setting->type == 'textarea'): ?>
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-text">
                                                                <?php if($setting->type == 'text'): ?>
                                                                    <i class="fas fa-font"></i>
                                                                <?php elseif($setting->type == 'textarea'): ?>
                                                                    <i class="fas fa-paragraph"></i>
                                                                <?php endif; ?>
                                                            </span>
                                                            <?php if($setting->type == 'text'): ?>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>"
                                                                    value="<?php echo e($setting->value); ?>" required placeholder=" ">
                                                            <?php elseif($setting->type == 'textarea'): ?>
                                                                <textarea class="form-control form-control-sm" id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>" rows="2"
                                                                    required placeholder=" "><?php echo e($setting->value); ?></textarea>
                                                            <?php endif; ?>
                                                            <label for="<?php echo e($setting->key); ?>"
                                                                class="form-label fw-bold text-info"><?php echo e($setting->description); ?></label>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                                            هذا الحقل مطلوب
                                                        </div>
                                                    <?php elseif($setting->type == 'image'): ?>
                                                        <label class="form-label fw-bold text-info d-block mb-2">
                                                            <i class="fas fa-image me-1"></i> <?php echo e($setting->description); ?>

                                                        </label>
                                                        <div class="image-upload-container mx-auto"
                                                            style="max-width: 100%;">
                                                            <div class="image-upload-wrapper setting-image-upload-wrapper"
                                                                data-input-id="<?php echo e($setting->key); ?>">
                                                                <input type="file" name="<?php echo e($setting->key); ?>"
                                                                    id="<?php echo e($setting->key); ?>"
                                                                    class="form-control setting-image-input visually-hidden <?php $__errorArgs = [$setting->key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    accept="image/*">

                                                                <div
                                                                    class="upload-placeholder <?php echo e($setting->value ? 'd-none' : ''); ?>">
                                                                    <div class="upload-icon">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </div>
                                                                    <div class="upload-text">
                                                                        <span
                                                                            class="upload-title"><?php echo e(__('dashboard.choose_image', ['fallback' => 'Choose Image'])); ?></span>
                                                                        <span
                                                                            class="upload-subtitle"><?php echo e(__('dashboard.drag_drop_here', ['fallback' => 'Or drag and drop image here'])); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="image-preview <?php echo e($setting->value ? '' : 'd-none'); ?>"
                                                                    style="width: 100%; height: 100%;">
                                                                    <div class="preview-container"
                                                                        style="width: 100%; height: 100%;">
                                                                        <img id="<?php echo e($setting->key); ?>_preview"
                                                                            src="<?php echo e($setting->value ? Storage::url('settings/' . $setting->value) : '#'); ?>"
                                                                            alt="Preview" class="img-fluid rounded"
                                                                            style="object-fit: contain; width: 100%; height: 100%;">
                                                                        <button type="button"
                                                                            class="remove-image-btn setting-remove-image-btn"
                                                                            title="<?php echo e(__('dashboard.remove_image', ['fallback' => 'Remove Image'])); ?>"
                                                                            data-input-id="<?php echo e($setting->key); ?>">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $__errorArgs = [$setting->key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="invalid-feedback d-block text-center">
                                                                    <?php echo e($message); ?></div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <!-- معلومات التواصل -->
                                        <div class="col-12 mb-3">
                                            <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp">
                                                <div class="card-header bg-gradient-success text-white py-2">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-address-book me-2"></i>
                                                        معلومات التواصل
                                                    </h5>
                                                </div>
                                                <div class="card-body p-3">
                                                    <?php $__currentLoopData = $settings['contact'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div
                                                            class="form-group floating-label mb-3 animate__animated animate__fadeIn">
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-text">
                                                                    <?php if($setting->key == 'email'): ?>
                                                                        <i class="fas fa-envelope"></i>
                                                                    <?php elseif($setting->key == 'phone'): ?>
                                                                        <i class="fas fa-phone-alt"></i>
                                                                    <?php elseif($setting->key == 'address'): ?>
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                    <?php else: ?>
                                                                        <i class="fas fa-info-circle"></i>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <input type="<?php echo e($setting->type); ?>"
                                                                    class="form-control form-control-sm"
                                                                    id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>"
                                                                    value="<?php echo e($setting->value); ?>" required placeholder=" ">
                                                                <label for="<?php echo e($setting->key); ?>"
                                                                    class="form-label fw-bold text-success"><?php echo e($setting->description); ?></label>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                <i class="fas fa-exclamation-triangle me-1"></i>
                                                                هذا الحقل مطلوب
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <!-- معلومات التواصل -->
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <!-- وسائل التواصل الاجتماعي وإعدادات SEO -->
                                        <div class="col-12">
                                            <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp">
                                                <div class="card-header bg-gradient-warning text-white py-2">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-globe me-2"></i>
                                                        الإعدادات الرقمية
                                                    </h5>
                                                </div>
                                                <div class="card-body p-3">
                                                    <!-- وسائل التواصل الاجتماعي -->
                                                    <h6 class="text-warning mb-3">
                                                        <i class="fas fa-share-alt-square me-2"></i>
                                                        وسائل التواصل الاجتماعي
                                                    </h6>
                                                    <?php $__currentLoopData = $settings['social'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $socialIcon = str_replace('social_', '', $setting->key);
                                                            $socialIcon = in_array($socialIcon, [
                                                                'facebook',
                                                                'twitter',
                                                                'instagram',
                                                                'youtube',
                                                                'linkedin',
                                                                'whatsapp',
                                                                'telegram',
                                                            ])
                                                                ? $socialIcon
                                                                : 'share-alt';
                                                        ?>
                                                        <div
                                                            class="form-group floating-label mb-3 animate__animated animate__fadeIn">
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-text">
                                                                    <i class="fab fa-<?php echo e($socialIcon); ?>"></i>
                                                                </span>
                                                                <input type="url" class="form-control form-control-sm"
                                                                    id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>"
                                                                    value="<?php echo e($setting->value); ?>" required
                                                                    placeholder=" ">
                                                                <label for="<?php echo e($setting->key); ?>"
                                                                    class="form-label fw-bold text-warning"><?php echo e($setting->description); ?></label>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                <i class="fas fa-exclamation-triangle me-1"></i>
                                                                هذا الحقل مطلوب
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <!-- إعدادات SEO -->
                                                    <h6 class="text-danger mb-3 mt-4">
                                                        <i class="fas fa-search-plus me-2"></i>
                                                        إعدادات SEO
                                                    </h6>
                                                    <?php $__currentLoopData = $settings['seo'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div
                                                            class="form-group floating-label mb-3 animate__animated animate__fadeIn">
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-text">
                                                                    <?php if($setting->type == 'textarea'): ?>
                                                                        <i class="fas fa-align-justify"></i>
                                                                    <?php else: ?>
                                                                        <i class="fas fa-tags"></i>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <?php if($setting->type == 'textarea'): ?>
                                                                    <textarea class="form-control form-control-sm" id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>" rows="2"
                                                                        required placeholder=" "><?php echo e($setting->value); ?></textarea>
                                                                <?php else: ?>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="<?php echo e($setting->key); ?>"
                                                                        name="<?php echo e($setting->key); ?>"
                                                                        value="<?php echo e($setting->value); ?>" required
                                                                        placeholder=" ">
                                                                <?php endif; ?>
                                                                <label for="<?php echo e($setting->key); ?>"
                                                                    class="form-label fw-bold text-danger"><?php echo e($setting->description); ?></label>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                <i class="fas fa-exclamation-triangle me-1"></i>
                                                                هذا الحقل مطلوب
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- زر الحفظ -->
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save me-2"></i>
                                    حفظ التغييرات
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
        <style>
            .hover-zoom {
                transition: transform 0.3s ease;
            }

            .hover-zoom:hover {
                transform: scale(1.05);
            }

            .card {
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                border-radius: 10px;
                overflow: hidden;
                background: rgba(255, 255, 255, 0.95);
                transform: translateY(0) scale(1);
                opacity: 0;
                animation: cardEntrance 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .card.exit {
                animation: cardExit 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .card:nth-child(1) {
                animation-delay: 0.2s;
            }

            .card:nth-child(2) {
                animation-delay: 0.4s;
            }

            .card:nth-child(3) {
                animation-delay: 0.6s;
            }

            @keyframes cardEntrance {
                0% {
                    opacity: 0;
                    transform: translateY(50px) scale(0.8);
                }

                50% {
                    opacity: 0.5;
                    transform: translateY(25px) scale(0.9);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            @keyframes cardExit {
                0% {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }

                50% {
                    opacity: 0.5;
                    transform: translateY(-25px) scale(0.9);
                }

                100% {
                    opacity: 0;
                    transform: translateY(-50px) scale(0.8);
                }
            }

            .form-control {
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border: 1px solid #e0e0e0;
                transform-origin: left center;
                opacity: 0;
                animation: inputEntrance 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .form-control.exit {
                animation: inputExit 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            @keyframes inputEntrance {
                0% {
                    opacity: 0;
                    transform: translateX(-20px);
                }

                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes inputExit {
                0% {
                    opacity: 1;
                    transform: translateX(0);
                }

                100% {
                    opacity: 0;
                    transform: translateX(20px);
                }
            }

            .btn-primary {
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                transform-origin: center;
                opacity: 0;
                animation: buttonEntrance 1.2s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .btn-primary.exit {
                animation: buttonExit 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            @keyframes buttonEntrance {
                0% {
                    opacity: 0;
                    transform: scale(0.5) rotate(-10deg);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.1) rotate(5deg);
                }

                100% {
                    opacity: 1;
                    transform: scale(1) rotate(0);
                }
            }

            @keyframes buttonExit {
                0% {
                    opacity: 1;
                    transform: scale(1) rotate(0);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.1) rotate(5deg);
                }

                100% {
                    opacity: 0;
                    transform: scale(0.5) rotate(10deg);
                }
            }

            .card-header {
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                opacity: 0;
                animation: headerEntrance 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .card-header.exit {
                animation: headerExit 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            @keyframes headerEntrance {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes headerExit {
                0% {
                    opacity: 1;
                    transform: translateY(0);
                }

                100% {
                    opacity: 0;
                    transform: translateY(20px);
                }
            }

            .form-group {
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                opacity: 0;
                animation: groupEntrance 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .form-group.exit {
                animation: groupExit 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            @keyframes groupEntrance {
                0% {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes groupExit {
                0% {
                    opacity: 1;
                    transform: translateX(0);
                }

                100% {
                    opacity: 0;
                    transform: translateX(30px);
                }
            }

            .img-thumbnail {
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                opacity: 0;
                animation: imageEntrance 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            .img-thumbnail.exit {
                animation: imageExit 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            }

            @keyframes imageEntrance {
                0% {
                    opacity: 0;
                    transform: scale(0.5) rotate(-5deg);
                }

                100% {
                    opacity: 1;
                    transform: scale(1) rotate(0);
                }
            }

            @keyframes imageExit {
                0% {
                    opacity: 1;
                    transform: scale(1) rotate(0);
                }

                100% {
                    opacity: 0;
                    transform: scale(0.5) rotate(5deg);
                }
            }

            .bg-gradient-primary {
                background: linear-gradient(45deg, #4e73df, #224abe);
            }

            .bg-gradient-info {
                background: linear-gradient(45deg, #36b9cc, #258391);
            }

            .bg-gradient-warning {
                background: linear-gradient(45deg, #f6c23e, #dda20a);
            }

            .bg-gradient-danger {
                background: linear-gradient(45deg, #e74a3b, #be2617);
            }

            .form-control-sm {
                font-size: 1rem;
            }

            .form-label {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            h6 {
                font-size: 1.1rem;
                font-weight: 600;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid currentColor;
                margin-bottom: 1.5rem;
            }

            .card-header h5 {
                font-size: 1.2rem;
            }

            .card-header h3 {
                font-size: 1.4rem;
            }

            .card-body {
                background: linear-gradient(145deg, #f8f9fa, #ffffff);
            }

            /* Remove/Comment old Settings Image Preview Styling */
            /*
                                                                                                            .setting-image-preview-container {
                                                                                                                 ...
                                                                                                            }
                                                                                                            .setting-image-preview {
                                                                                                                ...
                                                                                                            }
                                                                                                            .setting-placeholder-content {
                                                                                                               ...
                                                                                                            }
                                                                                                            .setting-image-preview-container .placeholder-icon {
                                                                                                                 ...
                                                                                                            }
                                                                                                            .setting-image-preview-container:hover .placeholder-icon {
                                                                                                                ...
                                                                                                            }
                                                                                                            */

            /* Add New Category-Inspired Image Upload Styling */
            .image-upload-container {
                position: relative;
                width: 100%;
            }

            .image-upload-wrapper {
                position: relative;
                width: 100%;
                /* Adjust width as needed, e.g., 300px */
                height: 180px;
                /* Consistent height */
                border: 2px dashed #e3e6f0;
                border-radius: 15px;
                background: #f8f9fc;
                display: flex;
                /* Use flex */
                flex-direction: column;
                /* Stack elements */
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                cursor: pointer;
                overflow: hidden;
                /* Hide overflowing content */
            }

            .image-upload-wrapper:hover {
                border-color: #6a11cb;
                /* Use color from example */
                background: rgba(106, 17, 203, 0.05);
            }

            .image-upload-wrapper.dragover {
                border-color: #6a11cb;
                background: rgba(106, 17, 203, 0.1);
                transform: scale(1.02);
                /* Slight scale effect */
            }

            /* Input stays visually hidden */
            .image-upload-wrapper .setting-image-input {
                /* Using .visually-hidden class now */
            }

            .upload-placeholder {
                /* Container for icon and text */
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100%;
            }

            .upload-icon {
                font-size: 3rem;
                color: #6a11cb;
                /* Color from example */
                margin-bottom: 1rem;
                animation: float 3s ease-in-out infinite;
                /* Keep float animation */
            }

            @keyframes float {

                /* Ensure float animation is defined */
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-8px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .upload-text {
                text-align: center;
            }

            .upload-title {
                display: block;
                font-size: 1.1rem;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 0.5rem;
            }

            .upload-subtitle {
                display: block;
                font-size: 0.9rem;
                color: #95a5a6;
            }

            /* Preview takes up the whole wrapper when not hidden */
            .image-preview:not(.d-none) {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #e9ecef;
                /* Background while image loads */
                padding: 5px;
                /* Padding around image */
            }

            .preview-container {
                position: relative;
                /* width: 100%; */
                /* Set by inline style */
                /* height: 100%; */
                /* Set by inline style */
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .preview-container img {
                /* width: 100%; */
                /* Set by inline style */
                /* height: auto; */
                /* Set by inline style */
                border-radius: 10px;
                /* Rounded preview */
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            }

            .remove-image-btn {
                position: absolute;
                top: 0px;
                right: 0px;
                width: 28px;
                height: 28px;
                border-radius: 50%;
                background: rgba(220, 53, 69, 0.8);
                color: white;
                border: 2px solid white;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 0.25rem 0.5rem rgba(220, 53, 69, 0.3);
                z-index: 10;
                font-size: 0.8rem;
            }

            .remove-image-btn:hover {
                transform: scale(1.1);
                background: rgba(220, 53, 69, 1);
            }

            /* Visually hide the actual file input */
            .visually-hidden {
                position: absolute !important;
                width: 1px !important;
                height: 1px !important;
                padding: 0 !important;
                margin: -1px !important;
                overflow: hidden !important;
                clip: rect(0, 0, 0, 0) !important;
                white-space: nowrap !important;
                border: 0 !important;
            }

            /* Floating Label & Input Group Styles */
            .form-group.floating-label {
                position: relative;
            }

            .form-group.floating-label .form-label {
                position: absolute;
                top: 0;
                left: 0;
                /* Start aligned with input-group-text */
                right: auto;
                /* Override default */
                height: 100%;
                /* Full height for vertical centering */
                padding: 0.375rem 0.75rem;
                /* Same as input-group-text/input */
                padding-left: 3rem;
                /* Space for icon - adjust if needed */
                pointer-events: none;
                border: 1px solid transparent;
                border-radius: 0.2rem;
                transform-origin: 0 0;
                transition: opacity .15s ease-in-out, transform .15s ease-in-out;
                color: #6c757d;
                /* Default placeholder color */
                display: flex;
                align-items: center;
                z-index: 3;
                /* Above input */
                margin-bottom: 0;
                /* Override Bootstrap */
                font-size: 0.875rem;
                /* Match form-control-sm */
                font-weight: 400;
                /* Normal weight */
                line-height: 1.5;
            }

            /* Adjust label color based on parent card context */
            .card:has(.bg-gradient-info) .form-group.floating-label .form-label {
                color: #36b9cc;
                /* Info color */
            }

            .card:has(.bg-gradient-success) .form-group.floating-label .form-label {
                color: #1cc88a;
                /* Success color */
            }

            .card:has(.bg-gradient-warning) .form-group.floating-label .form-label {
                color: #f6c23e;
                /* Warning color */
            }

            .card:has(.bg-gradient-danger) .form-group.floating-label .form-label {
                color: #e74a3b;
                /* Danger color */
            }

            .form-group.floating-label .form-control::placeholder {
                color: transparent;
                /* Hide placeholder visually */
            }

            .form-group.floating-label .form-control:focus,
            .form-group.floating-label .form-control:not(:placeholder-shown) {
                padding-top: calc(0.375rem + 1px + 0.5rem);
                /* Adjust top padding to make space */
                padding-bottom: calc(0.375rem + 1px - 0.5rem);
            }

            .form-group.floating-label .form-control:focus~.form-label,
            .form-group.floating-label .form-control:not(:placeholder-shown)~.form-label {
                opacity: .85;
                transform: scale(.80) translateY(-0.65rem) translateX(0.15rem);
                font-weight: 600;
                /* Make label bolder when floated */
                /* Keep color based on context */
            }

            .form-group.floating-label .input-group {
                position: relative;
                /* Needed for label positioning */
                border-radius: 0.2rem;
                /* Match label */
            }

            .form-group.floating-label .input-group .form-control {
                border-radius: 0 0.2rem 0.2rem 0 !important;
                /* Adjust border radius */
                padding-left: 0.75rem;
            }

            .form-group.floating-label .input-group textarea.form-control {
                min-height: calc(1.5em + 0.75rem + 2px);
                /* Default height */
            }

            .form-group.floating-label .input-group textarea.form-control:focus,
            .form-group.floating-label .input-group textarea.form-control:not(:placeholder-shown) {
                min-height: calc(1.5em + 0.75rem + 2px + 1rem);
                /* Increase height slightly when floated */
                padding-top: calc(0.375rem + 1px + 0.5rem);
                /* Ensure padding consistent */
            }

            .form-group.floating-label .input-group-text {
                border-radius: 0.2rem 0 0 0.2rem;
                background-color: #f8f9fa;
                border: 1px solid #e0e0e0;
                border-right: none;
                color: #6c757d;
                /* Default icon color */
                transition: border-color .15s ease-in-out;
            }

            /* Adjust icon color based on context */
            .card:has(.bg-gradient-info) .form-group.floating-label .input-group-text {
                color: #36b9cc;
            }

            .card:has(.bg-gradient-success) .form-group.floating-label .input-group-text {
                color: #1cc88a;
            }

            .card:has(.bg-gradient-warning) .form-group.floating-label .input-group-text {
                color: #f6c23e;
            }

            .card:has(.bg-gradient-danger) .form-group.floating-label .input-group-text {
                color: #e74a3b;
            }

            .form-group.floating-label .input-group:focus-within .input-group-text {
                /* border-color based on context */
            }

            .card:has(.bg-gradient-info) .form-group.floating-label .input-group:focus-within .input-group-text {
                border-color: #36b9cc;
            }

            .card:has(.bg-gradient-success) .form-group.floating-label .input-group:focus-within .input-group-text {
                border-color: #1cc88a;
            }

            .card:has(.bg-gradient-warning) .form-group.floating-label .input-group:focus-within .input-group-text {
                border-color: #f6c23e;
            }

            .card:has(.bg-gradient-danger) .form-group.floating-label .input-group:focus-within .input-group-text {
                border-color: #e74a3b;
            }

            .form-group.floating-label .input-group:focus-within .form-control {
                /* border-color matching context */
                border-left: 1px solid #e0e0e0;
                /* Ensure left border remains */
            }

            .card:has(.bg-gradient-info) .form-group.floating-label .input-group:focus-within .form-control {
                border-color: #36b9cc;
                box-shadow: 0 0 0 0.2rem rgba(54, 185, 204, 0.15);
            }

            .card:has(.bg-gradient-success) .form-group.floating-label .input-group:focus-within .form-control {
                border-color: #1cc88a;
                box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.15);
            }

            .card:has(.bg-gradient-warning) .form-group.floating-label .input-group:focus-within .form-control {
                border-color: #f6c23e;
                box-shadow: 0 0 0 0.2rem rgba(246, 194, 62, 0.15);
            }

            .card:has(.bg-gradient-danger) .form-group.floating-label .input-group:focus-within .form-control {
                border-color: #e74a3b;
                box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.15);
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            // Form validation
            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()

            // Add animation classes on scroll
            document.addEventListener('DOMContentLoaded', function() {
                const cards = document.querySelectorAll('.card');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                });

                cards.forEach(card => {
                    observer.observe(card);
                });
            });
        </script>

        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const uploadWrappers = document.querySelectorAll('.setting-image-upload-wrapper');

                uploadWrappers.forEach(wrapper => {
                    const inputId = wrapper.dataset.inputId;
                    const fileInput = document.getElementById(inputId);
                    const previewImage = document.getElementById(`${inputId}_preview`);
                    const previewContainer = previewImage ? previewImage.closest('.image-preview') : null;
                    const placeholder = wrapper.querySelector('.upload-placeholder');
                    const removeBtn = wrapper.querySelector('.setting-remove-image-btn');

                    // Function to handle file display
                    function handleFiles(files) {
                        if (files && files[0] && previewImage && previewContainer && placeholder) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                previewImage.src = e.target.result;
                                placeholder.classList.add('d-none');
                                previewContainer.classList.remove('d-none');
                            }
                            reader.readAsDataURL(files[0]);
                        } else {
                            // Reset if no file or elements missing
                            resetPreview(inputId);
                        }
                    }

                    // Reset function
                    function resetPreview(inputIdToReset) {
                        const inputToReset = document.getElementById(inputIdToReset);
                        const previewImgToReset = document.getElementById(`${inputIdToReset}_preview`);
                        const previewContToReset = previewImgToReset ? previewImgToReset.closest(
                            '.image-preview') : null;
                        const wrapperToReset = inputToReset ? inputToReset.closest(
                            '.setting-image-upload-wrapper') : null;
                        const placeholderToReset = wrapperToReset ? wrapperToReset.querySelector(
                            '.upload-placeholder') : null;

                        if (inputToReset) inputToReset.value = '';
                        if (previewImgToReset) previewImgToReset.src = '#';
                        if (previewContToReset) previewContToReset.classList.add('d-none');
                        if (placeholderToReset) placeholderToReset.classList.remove('d-none');
                    }

                    // Drag and Drop Listeners
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        wrapper.addEventListener(eventName, (e) => {
                            e.preventDefault();
                            e.stopPropagation();
                        }, false);
                    });
                    ['dragenter', 'dragover'].forEach(eventName => {
                        wrapper.addEventListener(eventName, () => wrapper.classList.add('dragover'),
                            false);
                    });
                    ['dragleave', 'drop'].forEach(eventName => {
                        wrapper.addEventListener(eventName, () => wrapper.classList.remove('dragover'),
                            false);
                    });
                    wrapper.addEventListener('drop', (e) => {
                        const dt = e.dataTransfer;
                        const files = dt.files;
                        if (fileInput) {
                            fileInput.files = files; // Assign dropped files to the input
                            handleFiles(files);
                        }
                    }, false);

                    // Input Change Listener
                    if (fileInput) {
                        fileInput.addEventListener('change', function() {
                            handleFiles(this.files);
                        });
                    }

                    // Remove Button Listener
                    if (removeBtn) {
                        removeBtn.addEventListener('click', function(e) {
                            e.preventDefault(); // Prevent form submission if inside form
                            e.stopPropagation(); // Stop event bubbling
                            const inputIdToRemove = this.dataset.inputId;
                            resetPreview(inputIdToRemove);
                        });
                    }

                    // Trigger input click when wrapper is clicked (but not on remove button)
                    wrapper.addEventListener('click', function(e) {
                        if (e.target !== removeBtn && !removeBtn.contains(e.target)) {
                            if (fileInput) fileInput.click();
                        }
                    });

                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\settings\index.blade.php ENDPATH**/ ?>