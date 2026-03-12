<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="breadcrumb-item <?php echo e($loop->last ? 'active' : ''); ?>">
            <?php if(!$loop->last): ?>
                <a href="<?php echo e($item['url']); ?>"><?php echo e($item['name']); ?></a>
            <?php else: ?>
                <?php echo e($item['name']); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        /* Card Styles */
        .role-detail-card {
            border: none;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            background: var(--card-bg);
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
        }

        .role-detail-card::before {
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

        /* Info Items Grid */
        .role-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            /* Responsive grid */
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
        }

        /* Permissions Section */
        .permissions-section {
            /* background: var(--light-gradient); */
            border-radius: 12px;
            padding: 1.5rem 1.3rem;
            margin-top: 2rem;
            border: 1px solid #e9ecef;
        }

        .permissions-title {
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

        .permissions-title i {
            font-size: 1.1rem;
            color: var(--secondary-color);
        }

        .permission-group {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed #d8e2fc;
        }

        .permission-group:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .permission-group-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.8rem;
            text-transform: capitalize;
        }

        .permissions-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .permission-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1rem;
            border-radius: 10px;
            background: var(--light-gradient);
            color: var(--primary-color);
            font-size: 0.85rem;
            font-weight: 500;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            cursor: default;
            border: 1px solid #e0e0e0;
        }

        .permission-badge i {
            font-size: 0.9rem;
            color: var(--secondary-color);
        }

        .permission-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            border-color: var(--primary-color);
        }

        /* Status Badge */
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

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
            justify-content: flex-start;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.75rem 1.4rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-decoration: none !important;
            /* Ensure no underline on links */
        }

        .btn-back {
            background: var(--card-bg);
            color: var(--text-color);
            border: 1px solid #d8e2fc;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(106, 17, 203, 0.15);
        }

        .btn-back:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            color: var(--primary-color);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.08);
        }

        .btn-action i {
            font-size: 1rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 1rem 1.2rem;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .card-header .header-info {
                flex-grow: 1;
            }

            .card-header .header-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 0.5rem;
            }

            .card-body {
                padding: 1.5rem 1.3rem;
            }

            .role-info {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .permission-badge {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.8rem;
                margin-top: 2rem;
            }

            .btn-action {
                width: 100%;
                padding: 0.8rem 1rem;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9"> <!-- Adjusted column width -->
                <div class="role-detail-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center header-info">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0"><?php echo e($role->name); ?></h3>
                                <p class="text-muted mb-0"><?php echo e(__('dashboard.role_details')); ?></p>
                            </div>
                        </div>
                        <div class="header-actions">
                            <a href="<?php echo e(route('roles.index')); ?>" class="back-btn"
                                title="<?php echo e(__('dashboard.back_to_list')); ?>">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="btn-edit-header">
                                <i class="fas fa-edit me-1"></i>
                                <span><?php echo e(__('dashboard.edit')); ?></span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="role-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <div class="info-content">
                                    <h6><?php echo e(__('dashboard.name')); ?></h6>
                                    <p><?php echo e($role->name); ?></p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-toggle-on"></i>
                                </div>
                                <div class="info-content">
                                    <h6><?php echo e(__('dashboard.status')); ?></h6>
                                    <div class="status-badge <?php echo e($role->status ? 'active' : 'inactive'); ?>">
                                        <i class="fas <?php echo e($role->status ? 'fa-check-circle' : 'fa-times-circle'); ?>"></i>
                                        <?php echo e($role->status ? __('dashboard.active') : __('dashboard.inactive')); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h6><?php echo e(__('dashboard.created_at')); ?></h6>
                                    <p><?php echo e($role->created_at->format('Y-m-d H:i')); ?></p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="info-content">
                                    <h6><?php echo e(__('dashboard.last_updated')); ?></h6>
                                    <p><?php echo e($role->updated_at->format('Y-m-d H:i')); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                            use Illuminate\Support\Str;
                            $groupedPermissions = $permissions
                                ->groupBy(function ($permission) {
                                    $parts = explode('.', $permission->name, 2);
                                    if (count($parts) > 1) {
                                        return Str::ucfirst(str_replace('_', ' ', $parts[0]));
                                    }
                                    $parts = explode('-', $permission->name, 2);
                                    if (count($parts) > 1) {
                                        return Str::ucfirst(str_replace('_', ' ', $parts[0]));
                                    }
                                    return __('dashboard.other');
                                })
                                ->sortKeys();
                        ?>

                        <div class="permissions-section">
                            <h5 class="permissions-title">
                                <i class="fas fa-key"></i>
                                <?php echo e(__('dashboard.assigned_permissions')); ?>

                            </h5>
                            <?php if($groupedPermissions->isNotEmpty()): ?>
                                <?php $__currentLoopData = $groupedPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupName => $groupPermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="permission-group">
                                        <h6 class="permission-group-title"><?php echo e($groupName); ?></h6>
                                        <div class="permissions-grid">
                                            <?php $__currentLoopData = $groupPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $actionName = $permission->name;
                                                    $parts = explode('.', $permission->name, 2);
                                                    if (count($parts) > 1) {
                                                        $actionName = str_replace('_', ' ', $parts[1]);
                                                    } else {
                                                        $parts = explode('-', $permission->name, 2);
                                                        if (count($parts) > 1) {
                                                            $actionName = str_replace('_', ' ', $parts[1]);
                                                        }
                                                    }
                                                ?>
                                                <div class="permission-badge" title="<?php echo e($permission->name); ?>">
                                                    <i class="fas fa-check-circle"></i>
                                                    <?php echo e(Str::ucfirst($actionName)); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="text-muted mb-0"><?php echo e(__('dashboard.no_permissions_assigned')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\role-permission\role\show.blade.php ENDPATH**/ ?>