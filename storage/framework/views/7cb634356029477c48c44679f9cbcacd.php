<?php $__env->startSection('title', $title ?? 'تفاصيل المستخدم'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <?php if(isset($breadcrumb)): ?>
        <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="breadcrumb-item <?php echo e($loop->last ? 'active' : ''); ?>">
                <?php if(!$loop->last && isset($item['url'])): ?>
                    <a href="<?php echo e($item['url']); ?>"><?php echo e($item['name']); ?></a>
                <?php else: ?>
                    <?php echo e($item['name'] ?? ''); ?>

                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <li class="breadcrumb-item active">تفاصيل المستخدم</li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --light-bg: #f8f9fc;
            --card-bg: #ffffff;
            --text-color: #495057;
            --text-muted: #6c757d;
            --primary-gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            --light-gradient: linear-gradient(135deg, #eef2ff 0%, #f8f9fc 100%);
            --card-radius: 1rem;
            --card-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .user-detail-card {
            border: none;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            background: var(--card-bg);
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
            margin-top: 1rem;
        }

        .user-detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--primary-gradient);
            background-size: 200% 100%;
            animation: gradient 4s ease infinite;
            z-index: 2;
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card-header {
            background: var(--light-bg);
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header .header-info {
            flex-grow: 1;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .card-header .header-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .card-header .back-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .card-header .back-btn:hover {
            background: #e9ecef;
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .card-header .btn-edit-header {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            background: var(--primary-gradient);
            color: white;
            border: none;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(106, 17, 203, 0.1);
        }

        .card-header .btn-edit-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(106, 17, 203, 0.2);
        }

        .card-header .icon-wrapper {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(106, 17, 203, 0.15);
            color: white;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .card-header .card-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 0.1rem;
        }

        .card-header .text-muted {
            font-size: 0.9rem;
        }

        .card-body {
            padding: 2rem 1.8rem;
        }

        .user-image-section {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .image-container {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border: 3px solid var(--card-bg);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 50%;
        }

        .image-overlay i {
            color: white;
            font-size: 1.5rem;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }

        .image-container:hover img {
            transform: scale(1.05);
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .image-container:hover .image-overlay i {
            transform: scale(1);
        }

        .no-image {
            width: 150px;
            height: 150px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            color: #adb5bd;
            border: 3px solid var(--card-bg);
        }

        .no-image i {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .no-image p {
            font-size: 0.9rem;
            margin: 0;
        }

        .user-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .info-item {
            background: var(--light-gradient);
            border-radius: 12px;
            padding: 1.2rem 1.1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.03);
        }

        .info-item:hover {
            transform: translateY(-4px);
            background: var(--card-bg);
            border-color: #d8e2fc;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
            z-index: 1;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            background: var(--card-bg);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .info-item:hover .info-icon {
            background: var(--primary-gradient);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 5px 10px rgba(106, 17, 203, 0.2);
        }

        .info-content {
            flex: 1;
            text-align: right;
        }

        .info-content h6 {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 0.2rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .info-content p,
        .info-content .status-badge {
            margin: 0;
            font-size: 0.95rem;
            color: var(--text-color);
            font-weight: 600;
            line-height: 1.4;
            word-break: break-word;
        }

        .roles-section {
            background: var(--light-gradient);
            border-radius: 12px;
            padding: 1.5rem 1.3rem;
            margin-top: 2rem;
            border: 1px solid #e9ecef;
        }

        .roles-title {
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 1.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 0.8rem;
        }

        .roles-title i {
            font-size: 1.1rem;
            color: var(--secondary-color);
        }

        .roles-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1rem;
            border-radius: 10px;
            background: var(--primary-gradient);
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 3px 7px rgba(106, 17, 203, 0.15);
            cursor: default;
        }

        .role-badge i {
            font-size: 0.9rem;
        }

        .role-badge:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 5px 12px rgba(106, 17, 203, 0.25);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            gap: 0.4rem;
        }

        .status-badge.active {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }

        .status-badge.inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .status-badge i {
            font-size: 0.9rem;
        }

        .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-body {
            padding: 0;
        }

        @media (max-width: 768px) {
            .card-header {
                padding: 1rem 1.2rem;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .card-header .header-info {
                flex-grow: 1;
                min-width: 0;
            }

            .card-header .card-title {
                font-size: 1.1rem;
            }

            .card-header .header-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 0.5rem;
            }

            .card-body {
                padding: 1.5rem 1.3rem;
            }

            .user-info-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .role-badge {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }

            .image-container,
            .no-image {
                width: 120px;
                height: 120px;
            }

            .no-image i {
                font-size: 2.5rem;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <div class="user-detail-card">
                    <div class="card-header">
                        <div class="header-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0"><?php echo e($user->name); ?></h3>
                                <p class="text-muted mb-0">تفاصيل المستخدم</p>
                            </div>
                        </div>
                        <div class="header-actions">
                            <a href="<?php echo e(route('users.index')); ?>" class="back-btn" title="العودة للقائمة">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.edit')): ?>
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn-edit-header">
                                    <i class="fas fa-edit me-1"></i>
                                    <span>تعديل</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="user-image-section">
                            <?php if($user->profile_image): ?>
                                <div class="image-container" data-bs-toggle="modal" data-bs-target="#imageModal">
                                    <img src="<?php echo e(asset('storage/' . $user->profile_image)); ?>" alt="<?php echo e($user->name); ?>"
                                        class="img-fluid">
                                    <div class="image-overlay">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="no-image">
                                    <i class="fas fa-user-circle"></i>
                                    <p class="mt-1">لا توجد صورة</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="user-info-grid">
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-user"></i></div>
                                <div class="info-content">
                                    <h6>الاسم</h6>
                                    <p><?php echo e($user->name); ?></p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                <div class="info-content">
                                    <h6>البريد الإلكتروني</h6>
                                    <p><?php echo e($user->email); ?></p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-phone"></i></div>
                                <div class="info-content">
                                    <h6>رقم الهاتف</h6>
                                    <p><?php echo e($user->phone ?? '-'); ?></p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-toggle-on"></i></div>
                                <div class="info-content">
                                    <h6>الحالة</h6>
                                    <div class="status-badge <?php echo e($user->status ? 'active' : 'inactive'); ?>">
                                        <i class="fas <?php echo e($user->status ? 'fa-check-circle' : 'fa-times-circle'); ?>"></i>
                                        <?php echo e($user->status ? 'نشط' : 'غير نشط'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-calendar-alt"></i></div>
                                <div class="info-content">
                                    <h6>تاريخ الإنشاء</h6>
                                    <p><?php echo e($user->created_at ? $user->created_at->format('Y-m-d H:i') : '-'); ?></p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-history"></i></div>
                                <div class="info-content">
                                    <h6>آخر تحديث</h6>
                                    <p><?php echo e($user->updated_at ? $user->updated_at->format('Y-m-d H:i') : '-'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="roles-section">
                            <h5 class="roles-title">
                                <i class="fas fa-user-shield"></i>
                                الأدوار الممنوحة
                            </h5>
                            <?php if($user->roles->isNotEmpty()): ?>
                                <div class="roles-grid">
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="role-badge" title="<?php echo e($role->name); ?>">
                                            <i class="fas fa-user-shield"></i>
                                            <?php echo e($role->name); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted mb-0">لا توجد أدوار ممنوحة لهذا المستخدم.</p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($user->profile_image): ?>
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="imageModalLabel">صورة الملف الشخصي: <?php echo e($user->name); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img src="<?php echo e(asset('storage/' . $user->profile_image)); ?>" alt="<?php echo e($user->name); ?>"
                            class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\role-permission\user\show.blade.php ENDPATH**/ ?>