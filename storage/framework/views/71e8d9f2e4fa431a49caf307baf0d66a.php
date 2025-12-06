<?php $__env->startSection('title', __('dashboard.dashboard')); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --card-bg: #ffffff;
            --card-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05),
                -5px -5px 10px rgba(255, 255, 255, 0.8);
            --card-hover-shadow: 7px 7px 15px rgba(0, 0, 0, 0.08),
                -7px -7px 15px rgba(255, 255, 255, 0.9);
            --welcome-bg: linear-gradient(145deg, #ffffff, #d3cbcb);
            --stat-icon-bg: linear-gradient(145deg, #e2e8f0, #ffffff);
        }

        [data-theme="dark"] {
            --bg-color: #1a1a1a;
            --text-color: #ffffff;
            --card-bg: #2d2d2d;
            --card-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2),
                -5px -5px 10px rgba(45, 45, 45, 0.8);
            --card-hover-shadow: 7px 7px 15px rgba(0, 0, 0, 0.3),
                -7px -7px 15px rgba(45, 45, 45, 0.9);
            --welcome-bg: linear-gradient(145deg, #2d2d2d, #1a1a1a);
            --stat-icon-bg: linear-gradient(145deg, #3d3d3d, #2d2d2d);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        #admin-home-page .stat-card {
            background: var(--card-bg);
            border: none;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        #admin-home-page .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        #admin-home-page .welcome-card {
            background: var(--welcome-bg);
            color: var(--text-color);
            border-radius: 15px;
            padding: .8rem;
            margin-bottom: .5rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        #admin-home-page .welcome-icon {
            font-size: 2.0rem;
            color: #4e73df;
            animation: wave 2s infinite;
            transform-origin: 70% 70%;
            display: inline-block;
            position: relative;
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(14deg);
            }

            20% {
                transform: rotate(-8deg);
            }

            30% {
                transform: rotate(14deg);
            }

            40% {
                transform: rotate(-4deg);
            }

            50% {
                transform: rotate(10deg);
            }

            60% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        @keyframes sparkle {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        #admin-home-page .welcome-text {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        #admin-home-page .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.3rem;
        }

        #admin-home-page .stat-label {
            font-size: 0.95rem;
            opacity: 0.8;
            font-weight: 500;
        }

        #admin-home-page .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            background: var(--stat-icon-bg);
            box-shadow: inset 3px 3px 5px rgba(0, 0, 0, 0.05),
                inset -3px -3px 5px rgba(255, 255, 255, 0.1);
            color: #4e73df;
            /* Default color, can be overridden by text-primary etc. */
        }

        /* Remove Chart Card styles */
        /* Remove Activity Timeline styles */
        /* Remove Table Styling if no other tables use these specific styles */
        /* Remove Modal specific styles (#addTransactionModal) */

        /* Prevent horizontal overflow from causing vertical scrollbar */
        .main-content {
            overflow-x: hidden;
        }

        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            background: var(--card-bg);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            box-shadow: var(--card-shadow);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            box-shadow: var(--card-hover-shadow);
        }

        .theme-toggle i {
            font-size: 1.2rem;
        }

        /* تخصيص حجم التشارت الدائري ليكون متناسقًا */
        #productsByCategoryChart {
            max-width: 400px;
            max-height: 400px;
            margin: 0 auto;
            display: block;
        }

        @media (max-width: 576px) {
            #productsByCategoryChart {
                max-width: 100% !important;
                max-height: 250px !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="admin-home-page">
        <div class="container-fluid">
            <!-- Welcome Card -->
            <div class="welcome-card card-header mb-1">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-1">
                            <i class="fas fa-hand-sparkles welcome-icon me-2"></i>
                            <?php echo e(__('dashboard.welcome')); ?>, <?php echo e(Auth::user()->name); ?>!
                        </h4>
                    </div>
                    <div class="col-md-4 d-flex justify-content-md-end align-items-center">
                        <i class="fas fa-clinic-medical fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-3">
                <!-- Users Stats Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-secondary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.users')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalUsers ?? 0); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Placeholder for future Clinic Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-primary">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">التصنيفات</h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalCategories ?? 0); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-success">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">المنتجات</h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalProducts ?? 0); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-info">
                                    <i class="fas fa-user-injured"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">أخرى</h6>
                                    <h3 class="fw-bold mb-0">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Statistics Chart -->
            <div class="card mb-1">
                <div class="card-header">
                    <h5 class="mb-0">إحصائيات المنتجات حسب التصنيف</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <canvas id="productsByCategoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- جدول أحدث المنتجات -->
            <div class="card ">
                <div class="card-header">
                    <h5 class="mb-0">أحدث المنتجات</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 text-center align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>اسم المنتج</th>
                                    <th>التصنيف</th>
                                    <th>تاريخ الإضافة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e($product->category ? $product->category->name : '-'); ?></td>
                                        <td><?php echo e($product->created_at ? $product->created_at->format('Y-m-d H:i') : '-'); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3">لا توجد منتجات حديثة</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Helper functions for displaying SweetAlert messages
        function displaySuccess(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: '<?php echo e(__('dashboard.success')); ?>',
                    text: message,
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alert('Success: ' + message);
            }
        }

        function displayError(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: '<?php echo e(__('dashboard.error')); ?>',
                    text: message
                });
            } else {
                alert('Error: ' + message);
            }
        }

        // تمرير بيانات التصنيفات والإحصائيات من PHP إلى جافاسكريبت
        window.productStats = <?php echo json_encode($productStats, 15, 512) ?>;
        document.addEventListener('DOMContentLoaded', function() {
            const stats = window.productStats || [];
            const ctx = document.getElementById('productsByCategoryChart').getContext('2d');
            const labels = stats.map(item => item.name);
            const data = stats.map(item => item.products_count);
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'عدد المنتجات',
                        data: data,
                        backgroundColor: [
                            '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796',
                            '#6f42c1', '#fd7e14', '#20c997', '#17a2b8'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        title: {
                            display: false
                        }
                    },
                    layout: {
                        padding: 10
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/admin/home.blade.php ENDPATH**/ ?>