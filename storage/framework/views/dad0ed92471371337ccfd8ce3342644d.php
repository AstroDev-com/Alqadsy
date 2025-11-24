<?php $__env->startSection('title', 'الصلاحيات'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">الصلاحيات</li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* --- Copied Styles from user/index.blade.php --- */
        .permissions-list-card {
            /* Adjusted from .categories-list-card */
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #ffffff, #f8f9fc);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
            margin: 1rem;
            /* Ensure margin consistency */
        }

        .permissions-list-card::before {
            /* Adjusted from .categories-list-card */
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 0.5rem;
            background: linear-gradient(90deg, #6a11cb, #2575fc, #6a11cb);
            background-size: 200% 100%;
            animation: gradient 3s ease infinite;
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

        .add-permission-btn {
            /* Adjusted from .add-user-btn */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.3);
        }

        .add-permission-btn:hover {
            /* Adjusted from .add-user-btn */
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(106, 17, 203, 0.4);
        }

        .add-permission-btn i {
            /* Adjusted from .add-user-btn */
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .add-permission-btn:hover i {
            /* Adjusted from .add-user-btn */
            transform: rotate(90deg);
        }

        .permissions-table {
            /* Adjusted from .categories-table */
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 0.3rem;
        }

        .permissions-table thead th {
            /* Adjusted from .categories-table */
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            color: #6a11cb;
            font-weight: 600;
            padding: 0.75rem 0.5rem;
            border: none;
            text-align: center;
            position: relative;
            line-height: 1.1;
        }

        .permissions-table thead th::after {
            /* Adjusted from .categories-table */
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            border-radius: 1px;
        }

        .permissions-table tbody tr {
            /* Adjusted from .categories-table */
            background: white;
            border-radius: 1rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            line-height: 1.1;
        }

        .permissions-table tbody tr:hover {
            /* Adjusted from .categories-table */
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .permissions-table tbody td {
            /* Adjusted from .categories-table */
            padding: 0.5rem;
            border: none;
            vertical-align: middle;
            line-height: 1.1;
            font-size: 0.9rem;
            text-align: center;
        }

        .permissions-table tbody td.align-start {
            /* Adjusted from .categories-table */
            text-align: start;
            padding-left: 1rem;
        }

        .icon-wrapper {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper.bg-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }

        .icon-wrapper i {
            color: white;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            line-height: 1;
        }

        .status-active {
            background: linear-gradient(135deg, #28a745, #34ce57);
            color: white;
            box-shadow: 0 0.25rem 0.5rem rgba(40, 167, 69, 0.2);
        }

        .status-inactive {
            background: linear-gradient(135deg, #dc3545, #ff3547);
            color: white;
            box-shadow: 0 0.25rem 0.5rem rgba(220, 53, 69, 0.2);
        }

        .status-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .actions-group {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn-action {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.8rem;
            line-height: 1;
            cursor: pointer;
        }

        .btn-action::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .btn-action:hover::before {
            transform: translateX(0);
        }

        .btn-view {
            background: linear-gradient(135deg, #20c997, #1abc9c);
        }

        .btn-edit {
            background: linear-gradient(135deg, #4dabf7, #339af0);
        }

        .btn-delete {
            background: linear-gradient(135deg, #f06595, #e64980);
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
        }

        .empty-state {
            padding: 3rem;
            text-align: center;
        }

        .empty-state i {
            color: #6a11cb;
            margin-bottom: 1rem;
        }

        .empty-state h4 {
            color: #6a11cb;
            margin-bottom: 0.5rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem 0 0 0;
            padding: 0;
        }

        .pagination .page-item .page-link {
            border: none;
            border-radius: 1rem;
            padding: 0.5rem 1rem;
            color: #6a11cb;
            background: transparent;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            box-shadow: 0 0.25rem 0.5rem rgba(106, 17, 203, 0.2);
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background: linear-gradient(135deg, #e0cffc, #d0e1fd);
            color: #6a11cb;
            transform: translateY(-2px);
        }

        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
            background: transparent;
            cursor: not-allowed;
        }

        /* Filter form styling from users */
        .filter-row {
            margin-bottom: 1.5rem;
            align-items: center;
            justify-content: space-evenly;
            gap: 1rem;
        }

        .filter-row .form-group.floating-label {
            position: relative;
            margin-bottom: 0;
            width: 100%;
        }

        .filter-row .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            right: 10px;
            background: white;
            padding: 0 10px;
            font-size: 12px;
            color: #6a11cb;
            font-weight: 600;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            box-shadow: 0 1px 3px rgba(106, 17, 203, 0.1);
            pointer-events: none;
            height: 20px;
            line-height: 20px;
        }

        .filter-row .form-group.floating-label .form-label i {
            font-size: 12px;
            color: #6a11cb;
        }

        .filter-row .input-group {
            position: relative;
            border: 2px solid #e3e6f0;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: white;
            height: 45px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .filter-row .input-group:focus-within {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        .filter-row .form-group.floating-label .form-control {
            border: none;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            background: transparent;
            transition: all 0.3s ease;
            color: #2c3e50;
            width: 100%;
            height: 100%;
            border-radius: 13px;
            position: relative;
            z-index: 1;
            box-shadow: none !important;
            outline: none !important;
        }

        .filter-row .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        .filter-row select.form-control {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .filter-row .form-group.floating-label:hover .input-group {
            border-color: #8b4cde;
        }

        .filter-row .form-group.floating-label:hover .form-label {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(106, 17, 203, 0.2);
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            height: 45px;
            align-items: flex-end;
            width: 100%;
        }

        .filter-buttons .btn {
            flex: 1;
            height: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            text-transform: none;
            letter-spacing: normal;
            border: 2px solid #e3e6f0;
            background: #f8f9fc;
            color: #6a11cb;
            box-shadow: none;
        }

        .filter-buttons .btn:hover {
            transform: translateY(-2px);
            background: #e9ecef;
            border-color: #dee2e6;
            color: #5e13bf;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .filter-buttons .btn-reset {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .filter-buttons .btn-apply {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* General badge styling */
        .badge {
            padding: 0.35rem 0.75rem;
            /* Match status badge padding */
            font-size: 0.75rem;
            /* Match status badge font size */
            border-radius: 0.75rem;
            /* Match status badge radius */
            font-weight: 600;
            transition: all 0.3s ease;

            /* Add specific styles for non-status badges if needed */
            &.bg-info {
                background: linear-gradient(135deg, #17a2b8, #20c997);
                color: white;
                box-shadow: 0 2px 4px rgba(23, 162, 184, 0.2);
            }
        }

        @media (max-width: 768px) {
            .card-header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                align-items: stretch !important;
            }

            .add-permission-btn {
                /* Adjusted */
                width: 100%;
            }

            .permissions-table {
                /* Adjusted */
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .permissions-table thead th,
            /* Adjusted */
            .permissions-table tbody td {
                /* Adjusted */
                white-space: normal;
            }

            .permissions-table tbody td {
                /* Adjusted */
                text-align: start;
            }

            .permissions-table tbody td.text-center {
                /* Keep specific alignments */
                text-align: center !important;
            }

            .btn-action {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }

        /* --- End Copied Styles --- */
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.role-permission.nav-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card permissions-list-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-primary">
                                <i class="fas fa-key text-warning"></i>
                            </div>
                            <div class="ms-3">
                                <h3 class="card-title mb-0"><?php echo e(__('dashboard.permissions_list')); ?></h3>
                                <p class="text-muted mb-0"><?php echo e(__('dashboard.manage_permissions')); ?></p>
                            </div>
                        </div>
                        <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-primary add-permission-btn">
                            <i class="fas fa-plus me-2"></i>
                            <span><?php echo e(__('dashboard.add_permission')); ?></span>
                        </a>
                    </div>
                    <div class="card-body">

                        <form id="filterForm" action="<?php echo e(route('permissions.index')); ?>" method="GET"
                            class="row g-3 align-items-center filter-row mb-4">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group floating-label mb-0">
                                    <label for="permissionSearchInput" class="form-label">
                                        <i class="fas fa-search"></i> <?php echo e(__('dashboard.search_permissions')); ?>

                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="permissionSearchInput"
                                            placeholder="<?php echo e(__('dashboard.search_permissions')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group floating-label mb-0">
                                    <label for="sortBy" class="form-label">
                                        <i class="fas fa-sort"></i> <?php echo e(__('dashboard.sort_by')); ?>

                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" id="sortBy">
                                            <option value="name_asc"><?php echo e(__('dashboard.sort_by_name_asc')); ?></option>
                                            <option value="name_desc"><?php echo e(__('dashboard.sort_by_name_desc')); ?></option>
                                            <option value="date_asc"><?php echo e(__('dashboard.sort_by_date_asc')); ?></option>
                                            <option value="date_desc"><?php echo e(__('dashboard.sort_by_date_desc')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group floating-label mb-0">
                                    <label for="statusFilter" class="form-label">
                                        <i class="fas fa-filter"></i> <?php echo e(__('dashboard.status')); ?>

                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" id="statusFilter">
                                            <option value=""><?php echo e(__('dashboard.all_statuses')); ?></option>
                                            <option value="active"><?php echo e(__('dashboard.active')); ?></option>
                                            <option value="inactive"><?php echo e(__('dashboard.inactive')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-3">
                                <div class="filter-buttons">
                                    <button type="submit" class="btn btn-secondary" id="applyFilters">
                                        <i class="fas fa-check me-1"></i>
                                        <?php echo e(__('dashboard.apply_filters')); ?>

                                    </button>
                                    <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-secondary">
                                        <i class="fas fa-redo me-1"></i>
                                        <?php echo e(__('dashboard.reset')); ?>

                                    </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-hover permissions-table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><i class="fas fa-hashtag me-1"></i>#</th>
                                        <th class="text-center"><i class="fas fa-key me-1"></i><?php echo e(__('dashboard.name')); ?>

                                        </th>
                                        <th class="text-center"><i
                                                class="fas fa-users me-1"></i><?php echo e(__('dashboard.roles_count')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-toggle-on me-1"></i><?php echo e(__('dashboard.status')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-calendar me-1"></i><?php echo e(__('dashboard.created_at')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-cogs me-1"></i><?php echo e(__('dashboard.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="permission-row">
                                            <td class="align-middle text-center"><?php echo e($loop->iteration); ?></td>
                                            <td class="align-middle">
                                                <div class="fw-bold"><?php echo e($permission->name); ?></div>
                                                <small class="text-muted">
                                                    <i class="fas fa-clock me-1"></i>
                                                    <?php echo e($permission->created_at->diffForHumans()); ?>

                                                </small>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="badge bg-info">
                                                    <i class="fas fa-users me-1"></i>
                                                    <?php echo e($permission->roles_count ?? 0); ?>

                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="status-badge status-<?php echo e($permission->status ? 'active' : 'inactive'); ?>">
                                                    <i
                                                        class="fas <?php echo e($permission->status ? 'fa-check-circle' : 'fa-times-circle'); ?> me-1"></i>
                                                    <?php echo e($permission->status ? __('dashboard.active') : __('dashboard.inactive')); ?>

                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    <?php echo e($permission->created_at->format('Y-m-d')); ?>

                                                </small>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group actions-group">
                                                    <a href="<?php echo e(route('permissions.show', $permission->id)); ?>"
                                                        class="btn-action btn-view" title="<?php echo e(__('dashboard.view')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('permissions.edit', $permission->id)); ?>"
                                                        class="btn-action btn-edit" title="<?php echo e(__('dashboard.edit')); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('permissions.destroy', $permission->id)); ?>"
                                                        method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn-action btn-delete"
                                                            title="<?php echo e(__('dashboard.delete')); ?>"
                                                            onclick="return confirm('<?php echo e(__('dashboard.confirm_delete')); ?>')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                <div class="empty-state">
                                                    <i class="fas fa-key fa-3x mb-3"></i>
                                                    <h4><?php echo e(__('dashboard.no_permissions_found')); ?></h4>
                                                    <p class="text-muted">
                                                        <?php echo e(__('dashboard.add_new_permission_to_get_started')); ?></p>
                                                    <a href="<?php echo e(route('permissions.create')); ?>"
                                                        class="btn btn-primary mt-3">
                                                        <i class="fas fa-plus me-2"></i>
                                                        <?php echo e(__('dashboard.add_permission')); ?>

                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php if($permissions->count() > 0): ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    <?php echo e(__('dashboard.showing')); ?> <?php echo e($permissions->count()); ?>

                                    <?php echo e(__('dashboard.permissions')); ?>

                                </div>
                                <div class="pagination-info">
                                    <span class="badge bg-primary">
                                        <i class="fas fa-database me-1"></i>
                                        <?php echo e(__('dashboard.total_permissions')); ?>: <?php echo e($permissions->count()); ?>

                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all permission rows
            const permissionRows = Array.from(document.querySelectorAll('.permission-row'));

            // Create empty state row
            const createEmptyStateRow = () => {
                return `
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-shopping-cart fa-3x text-purple mb-3"></i>
                                <h4 class="text-purple">لم يتم العثور على صلاحيات</h4>
                                <p class="text-muted">
                                    <?php echo e(__('dashboard.no_permissions_found')); ?>

                                </p>
                                <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus me-2"></i>
                                    <?php echo e(__('dashboard.add_permission')); ?>

                                </a>
                            </div>
                        </td>
                    </tr>
                `;
            };

            // Filter functionality
            const applyFilters = function() {
                const searchTerm = document.getElementById('permissionSearchInput').value.toLowerCase();
                const statusFilter = document.getElementById('statusFilter').value;
                const sortBy = document.getElementById('sortBy').value;

                // Filter and sort rows
                let filteredRows = permissionRows.filter(row => {
                    const name = row.cells[1].querySelector('.fw-bold').textContent.toLowerCase();
                    const statusElement = row.querySelector('.status-badge');
                    const status = statusElement ? (statusElement.classList.contains('active') ?
                        'active' : 'inactive') : '';

                    // Apply search filter
                    if (searchTerm && !name.includes(searchTerm)) {
                        return false;
                    }

                    // Apply status filter
                    if (statusFilter && status !== statusFilter) {
                        return false;
                    }

                    return true;
                });

                // Sort filtered rows
                filteredRows.sort((a, b) => {
                    const nameA = a.cells[1].querySelector('.fw-bold').textContent.toLowerCase();
                    const nameB = b.cells[1].querySelector('.fw-bold').textContent.toLowerCase();
                    const dateA = new Date(a.querySelector('small')?.textContent.trim() || '');
                    const dateB = new Date(b.querySelector('small')?.textContent.trim() || '');

                    switch (sortBy) {
                        case 'name_asc':
                            return nameA.localeCompare(nameB);
                        case 'name_desc':
                            return nameB.localeCompare(nameA);
                        case 'date_asc':
                            return dateA - dateB;
                        case 'date_desc':
                            return dateB - dateA;
                        default:
                            return 0;
                    }
                });

                // Update table
                const tbody = document.querySelector('.permissions-table tbody');
                tbody.innerHTML = '';

                if (filteredRows.length === 0) {
                    tbody.innerHTML = createEmptyStateRow();
                } else {
                    filteredRows.forEach((row, index) => {
                        // Update row number
                        row.cells[0].textContent = index + 1;
                        tbody.appendChild(row);
                    });
                }

                // Update footer count
                const footerCount = document.querySelector('.card-footer .text-muted');
                if (footerCount) {
                    footerCount.innerHTML =
                        `<i class="fas fa-info-circle me-1"></i> ${filteredRows.length} <?php echo e(__('dashboard.permissions')); ?>`;
                }
            };

            // Add event listeners with debounce for search input
            let searchTimeout;
            document.getElementById('permissionSearchInput').addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(applyFilters, 300);
            });

            document.getElementById('statusFilter').addEventListener('change', applyFilters);
            document.getElementById('sortBy').addEventListener('change', applyFilters);
            document.getElementById('applyFilters').addEventListener('click', function(e) {
                e.preventDefault();
                applyFilters();
            });

            // Initial filter application
            applyFilters();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/admin/role-permission/permission/index.blade.php ENDPATH**/ ?>