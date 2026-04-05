<?php $__env->startSection('title', 'المستخدمين'); ?>
<?php $__env->startSection('page_title'); ?>
    <div class="fs-5 mt-1">
        <i class="fas fa-users fa-lg text-secondary"></i> المستخدمين
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">المستخدمين</a></li>
    <li class="breadcrumb-item active">تعديل</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .edit-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .image-edit-preview {
            border: 2px dashed #dee2e6;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-edit-preview:hover {
            border-color: #6c5ce7;
            transform: translateY(-3px);
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="edit-card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0  fw-bold text-warning">
                            <i class="bi bi-pencil-square me-2"></i>تعديل بيانات المستخدم
                        </h4>
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>رجوع
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="row g-4">
                                <!-- صورة المستخدم -->
                                <div class="col-md-6">
                                    <div class="image-edit-preview text-center p-3 rounded-3">
                                        <img id="previewImage" class="img-fluid rounded-3 shadow"
                                            src="<?php echo e($user->thumbnail ? asset('storage/' . $user->thumbnail) : asset('admin/assets/img/emp_default.png')); ?>"
                                            alt="<?php echo e($user->name); ?>"
                                            style="width: 250px; height: 250px; object-fit: cover;">
                                        <input type="file" name="profile_image" id="profile_image"
                                            class="form-control mt-3 d-none" accept="image/*" onchange="previewFile(event)">
                                        <label for="profile_image" class="btn btn-outline-primary mt-3 w-100">
                                            <i class="bi bi-cloud-upload me-2"></i>تغيير الصورة
                                        </label>
                                        <?php $__errorArgs = ['profile_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger small mt-2"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- تفاصيل المستخدم -->
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <!-- الاسم -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                                                    name="name" value="<?php echo e(old('name', $user->name)); ?>">
                                                <label for="name">
                                                    <i class="bi bi-person me-2 text-muted"></i>اسم المستخدم
                                                </label>
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <!-- الإيميل -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control bg-light" id="email"
                                                    name="email" value="<?php echo e($user->email); ?>" readonly>
                                                <label for="email">
                                                    <i class="bi bi-envelope-at me-2 text-muted"></i>البريد الإلكتروني
                                                </label>
                                            </div>
                                        </div>

                                        <!-- كلمة المرور -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password"
                                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="password" name="password" placeholder=" ">
                                                <label for="password">
                                                    <i class="bi bi-key me-2 text-muted"></i>كلمة مرور جديدة
                                                </label>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <!-- الأدوار -->
                                        <div class="col-12">
                                            <label class="form-label">
                                                <i class="bi bi-shield-lock me-2 text-muted"></i>الأدوار
                                            </label>
                                            <select name="roles[]" multiple
                                                class="form-select <?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                style="height: 120px">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($id); ?>"
                                                        <?php echo e($user->hasRole($name) ? 'selected' : ''); ?>>
                                                        <?php echo e($name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- معلومات إضافية -->
                                <div class="col-12">
                                    <div class="row g-3">
                                        <!-- رقم الجوال -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone"
                                                    name="phone" value="<?php echo e(old('phone', $user->phone)); ?>">
                                                <label for="phone">
                                                    <i class="bi bi-phone me-2 text-muted"></i>رقم الجوال
                                                </label>
                                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <!-- الحالة -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select name="status" id="status"
                                                    class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option value="1" <?php echo e($user->status == 1 ? 'selected' : ''); ?>>مفعل
                                                    </option>
                                                    <option value="0" <?php echo e($user->status == 0 ? 'selected' : ''); ?>>معطل
                                                    </option>
                                                </select>
                                                <label for="status">
                                                    <i class="bi bi-power me-2 text-muted"></i>الحالة
                                                </label>
                                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- زر التحديث -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-warning px-5 py-3 rounded-pill text-white">
                                        <i class="bi bi-arrow-repeat me-2"></i>تحديث البيانات
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile(event) {
            const input = event.target;
            const preview = document.getElementById('previewImage');
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.add('shadow-lg');
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src =
                    "<?php echo e($user->thumbnail ? asset('storage/' . $user->thumbnail) : asset('admin/assets/img/emp_default.png')); ?>";
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Hostinger\Alqadsy Hostinger\resources\views/admin/role-permission/user/edit.blade.php ENDPATH**/ ?>