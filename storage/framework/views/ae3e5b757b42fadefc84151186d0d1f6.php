<?php $__env->startSection('title', 'إدارة صلاحيات الدور: ' . $role->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">الأدوار</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --card-bg: #fff;
            --card-radius: 1rem;
            --card-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            --badge-bg: #f8f9fc;
            --badge-color: #6a11cb;
            --badge-border: #e3e6f0;
        }

        .rtl {
            direction: rtl;
            text-align: right;
        }

        .perm-master-card {
            max-width: 950px;
            margin: 0 auto;
        }

        .perm-master-card .card-header {
            background: #fff;
            color: var(--primary-color);
            border-bottom: 1px solid #e3e6f0;
            border-radius: var(--card-radius) var(--card-radius) 0 0;
            box-shadow: none;
            padding: 2rem 2.5rem 1.5rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .perm-master-card .card-header h2 {
            color: var(--primary-color);
            font-size: 1.7rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin: 0;
            flex-direction: row;
        }

        .perm-master-card .card-header h2 i {
            font-size: 2.1rem;
            color: #f7b731;
            filter: none;
            margin-left: 0.7rem;
            margin-right: 0;
        }

        .perm-master-card .btn-danger {
            background: #f8f9fc;
            color: #d63031;
            border: none;
            font-weight: 700;
            border-radius: 2rem;
            box-shadow: none;
            transition: all 0.3s;
            padding: 0.5rem 1.5rem;
            margin-left: 0;
            margin-right: 1rem;
        }

        .perm-master-card .btn-danger:hover {
            background: #ffeaea;
            color: #b91c1c;
        }

        .perm-master-card .card-body {
            background: var(--card-bg);
            border-radius: 0 0 var(--card-radius) var(--card-radius);
            box-shadow: var(--card-shadow);
            padding: 2.2rem 2rem 1.7rem 2rem;
        }

        .perm-group-card {
            background: #fff;
            border-radius: 0.8rem;
            box-shadow: var(--card-shadow);
            border: none;
            margin-bottom: 1.5rem;
            padding: 1.2rem 1rem;
            transition: box-shadow 0.3s;
        }

        .perm-group-card:hover {
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.10);
        }

        .group-header {
            background: #f8f9fc;
            border-radius: 0.7rem;
            padding: 0.7rem 1rem;
            margin-bottom: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
        }

        .group-title {
            font-size: 1.1rem;
            color: var(--primary-color);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            flex-direction: row;
        }

        .group-icon {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-left: 0.5rem;
            margin-right: 0;
        }

        .permission-count {
            background: var(--badge-bg);
            color: var(--badge-color);
            border: 1.5px solid var(--badge-border);
            border-radius: 1.2rem;
            padding: 0.25rem 0.9rem;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: none;
            margin-left: 0.5rem;
            margin-right: 0;
        }

        .perm-checkbox {
            background: #f8f9fc;
            border-radius: 0.7rem;
            border: 1.5px solid #e3e6f0;
            box-shadow: none;
            padding: 0.7rem 0.7rem 0.7rem 0.7rem;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            transition: box-shadow 0.3s, border-color 0.3s;
            position: relative;
            line-height: 1.1;
        }

        .perm-checkbox:hover {
            border-color: var(--primary-color);
            box-shadow: 0 0.25rem 0.5rem rgba(106, 17, 203, 0.08);
        }

        .checkbox-wrapper {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .perm-checkbox input[type="checkbox"] {
            opacity: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
            padding: 0;
            z-index: 2;
            cursor: pointer;
        }

        .checkmark {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 2px solid #e3e6f0;
            background: #fff;
            transition: border-color 0.3s, background 0.3s;
            display: block;
            position: relative;
            box-shadow: none !important;
            margin: 0;
            padding: 0;
        }

        .perm-checkbox input:checked~.checkmark {
            border-color: var(--primary-color);
            background: var(--primary-color);
            box-shadow: 0 2px 8px rgba(106, 17, 203, 0.08) !important;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 50%;
            top: 50%;
            width: 7px;
            height: 13px;
            border: solid #fff;
            border-width: 0 2.5px 2.5px 0;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .perm-checkbox input:checked~.checkmark:after {
            display: block;
        }

        .permission-content {
            flex: 1;
            text-align: right;
            padding-left: 4px;
            padding-right: 0;
        }

        .permission-name {
            font-weight: 700;
            color: #2d3436;
            font-size: 13px;
            margin-bottom: 0.1rem;
        }

        .permission-description {
            color: #636e72;
            font-size: 13px;
        }

        .search-container {
            position: relative;
            margin-bottom: 1.5rem;
            max-width: 350px;
            margin-left: auto;
            margin-right: 0;
        }

        .perm-search-box {
            padding: 0.6rem 1rem 0.6rem 2.2rem;
            border-radius: 1rem;
            border: 2px solid #e3e6f0;
            font-size: 1rem;
            background: #fff;
            box-shadow: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            text-align: right;
        }

        .perm-search-box:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.1rem rgba(106, 17, 203, 0.08);
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #b2bec3;
            font-size: 1.1rem;
            pointer-events: none;
        }

        .select-all-container {
            background: #f8f9fc;
            border-radius: 0.7rem;
            padding: 0.7rem 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.2rem;
            box-shadow: none;
            flex-direction: row;
        }

        .select-all-label {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1rem;
            margin-left: 0.5rem;
            margin-right: 0;
        }

        .btn-custom {
            background: #f8f9fc;
            color: var(--primary-color);
            border: 2px solid #e3e6f0;
            border-radius: 1.2rem;
            font-size: 1.1rem;
            font-weight: 700;
            padding: 0.7rem 2.2rem;
            box-shadow: none;
            margin-top: 1.5rem;
            transition: background 0.3s, color 0.3s, border 0.3s, transform 0.2s;
            text-align: center;
        }

        .btn-custom:hover {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
            transform: scale(1.04);
        }

        .no-results {
            background: #fff;
            border-radius: 1.2rem;
            padding: 3rem 1.5rem;
            color: #6a11cb;
            text-align: center;
            margin: 2.5rem auto 0 auto;
            box-shadow: 0 0.5rem 1.5rem rgba(106, 17, 203, 0.07);
            border: 1.5px solid #e3e6f0;
            max-width: 400px;
            position: relative;
            z-index: 10;
            display: none;
        }

        .no-results.active {
            display: block;
        }

        .no-results i {
            font-size: 3.5rem;
            color: #6a11cb;
            margin-bottom: 1.2rem;
            display: block;
        }

        .no-results h5 {
            font-size: 1.3rem;
            margin-bottom: 0.7rem;
            color: #2d3436;
            font-weight: 800;
        }

        .no-results p {
            margin: 0;
            font-size: 1.05rem;
            color: #636e72;
        }

        .perm-checkbox.selected,
        .perm-checkbox input:checked~.checkmark {
            box-shadow: 0 0.5rem 1.2rem rgba(106, 17, 203, 0.10);
            border-color: var(--primary-color);
        }

        .permission-name {
            font-weight: 800;
            color: #2d3436;
            font-size: 15px;
            margin-bottom: 0.1rem;
        }

        .perm-group-card {
            margin-bottom: 2.2rem;
        }

        .perm-group-card+.perm-group-card {
            margin-top: 2.5rem;
        }

        @media (max-width: 991px) {

            .perm-master-card .card-header,
            .perm-master-card .card-body {
                padding: 1rem 0.5rem;
            }

            .perm-group-card {
                padding: 0.7rem 0.2rem;
            }

            .group-header {
                padding: 0.5rem 0.5rem;
            }

            .search-container {
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .perm-master-card .card-header h2 {
                font-size: 1rem;
            }

            .perm-group-card {
                padding: 0.4rem 0.1rem;
            }

            .btn-custom {
                font-size: 0.95rem;
                padding: 0.5rem 1.2rem;
            }
        }
    </style>

    <div class="container-fluid rtl">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="perm-master-card">
                    <!-- Header -->
                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center py-4 px-5">
                        <div>
                            <h2 class="mb-0 fw-bold">
                                <i class="bi bi-shield-lock me-3 text-primary"></i>
                                <span class="text-gradient"><?php echo e($role->name); ?></span>
                                <span class="text-muted fs-4">| إدارة الصلاحيات</span>
                            </h2>
                        </div>
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-danger rounded-pill px-4 py-2 shadow-sm">
                            <i class="bi bi-arrow-left me-2"></i>رجوع
                        </a>
                    </div>

                    <div class="card-body p-4" dir="ltr">
                        <!-- Search Box -->
                        <div class="search-container">
                            <input type="text" id="permSearch" class="form-control perm-search-box"
                                placeholder="ابحث عن صلاحية...">
                            <i class="bi bi-search search-icon"></i>
                        </div>

                        <!-- Select All -->
                        <div class="select-all-container mb-4">
                            <input type="checkbox" id="selectAll" class="select-all-checkbox">
                            <label for="selectAll" class="select-all-label">تحديد جميع الصلاحيات</label>
                        </div>

                        <form action="<?php echo e(url('roles/' . $role->id . '/give-permissions')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <!-- Permissions Grid -->
                            <div class="row g-4" id="permContainer">
                                <?php $__currentLoopData = $permissions->groupBy('group'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="perm-group-card p-4">
                                            <div class="group-header">
                                                <div class="group-title">
                                                    <i class="bi bi-folder2-open group-icon"></i>
                                                    <?php echo e($group); ?>

                                                    <span class="permission-count"><?php echo e(count($permissions)); ?> صلاحيات</span>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-3 col-12 perm-item">
                                                        <label class="perm-checkbox">
                                                            <div class="checkbox-wrapper">
                                                                <input type="checkbox" name="permission[]"
                                                                    value="<?php echo e($permission->name); ?>"
                                                                    <?php echo e(in_array($permission->id, $rolePermissions) ? 'checked' : ''); ?>>
                                                                <span class="checkmark"></span>
                                                            </div>
                                                            <div class="permission-content">
                                                                <div class="permission-name"><?php echo e($permission->name); ?></div>
                                                                <div class="permission-description">
                                                                    <?php echo e($permission->description); ?></div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center mt-1" dir="rtl">
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-save me-2"></i>حفظ التغييرات
                                </button>
                            </div>

                            <!-- No Results Message -->
                            <div class="no-results" id="noResults">
                                <i class="bi bi-search"></i>
                                <h5>لم يتم العثور على نتائج</h5>
                                <p>جرب استخدام كلمات بحث مختلفة</p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Select All Functionality
        const selectAll = document.getElementById('selectAll');
        const groupSelectors = document.querySelectorAll('.group-selector');
        const permissionCheckboxes = document.querySelectorAll('input[name="permission[]"]');

        selectAll.addEventListener('change', (e) => {
            const isChecked = e.target.checked;
            permissionCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
                if (isChecked) {
                    checkbox.closest('.perm-checkbox').classList.add('selected');
                } else {
                    checkbox.closest('.perm-checkbox').classList.remove('selected');
                }
            });
            groupSelectors.forEach(selector => selector.checked = isChecked);
        });

        // Group Selector
        groupSelectors.forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {
                const groupCard = e.target.closest('.perm-group-card');
                const groupCheckboxes = groupCard.querySelectorAll('input[name="permission[]"]');
                const isChecked = e.target.checked;

                groupCheckboxes.forEach(perm => {
                    perm.checked = isChecked;
                    if (isChecked) {
                        perm.closest('.perm-checkbox').classList.add('selected');
                    } else {
                        perm.closest('.perm-checkbox').classList.remove('selected');
                    }
                });

                // Update select all checkbox
                updateSelectAllState();
            });
        });

        // Individual Checkbox
        permissionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const groupCard = checkbox.closest('.perm-group-card');
                const groupSelector = groupCard.querySelector('.group-selector');
                const groupCheckboxes = groupCard.querySelectorAll('input[name="permission[]"]');

                // Update group selector
                const allChecked = Array.from(groupCheckboxes).every(cb => cb.checked);
                groupSelector.checked = allChecked;

                // Update select all checkbox
                updateSelectAllState();
            });
        });

        function updateSelectAllState() {
            const allChecked = Array.from(permissionCheckboxes).every(cb => cb.checked);
            selectAll.checked = allChecked;
        }

        // Search Functionality
        const searchInput = document.getElementById('permSearch');
        const noResults = document.getElementById('noResults');
        const permContainer = document.getElementById('permContainer');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            let hasResults = false;

            document.querySelectorAll('.perm-item').forEach(item => {
                const text = item.textContent.toLowerCase();
                const isVisible = text.includes(searchTerm);
                item.style.display = isVisible ? 'block' : 'none';

                if (isVisible) {
                    hasResults = true;
                }
            });

            // Show/hide no results message
            if (hasResults) {
                noResults.classList.remove('active');
                permContainer.style.display = 'block';
            } else {
                noResults.classList.add('active');
                permContainer.style.display = 'none';
            }
        });

        // Hover Effects
        document.querySelectorAll('.perm-checkbox').forEach(item => {
            item.addEventListener('mouseover', () => {
                item.querySelector('.checkmark').style.transform = 'scale(1.1)';
            });

            item.addEventListener('mouseout', () => {
                item.querySelector('.checkmark').style.transform = 'scale(1)';
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/admin/role-permission/role/add-permissions.blade.php ENDPATH**/ ?>