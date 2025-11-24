<?php $__env->startSection('content'); ?>
    <style>
        .product-img {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: transform 0.2s;
        }

        .product-img:hover {
            transform: scale(1.08);
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: bold;
            vertical-align: middle;
        }

        .action-btns .btn {
            margin-left: 3px;
            margin-right: 3px;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .search-bar {
            max-width: 300px;
            border-radius: 25px;
            padding-right: 35px;
            background: #f8f9fa;
        }

        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f7ef;
            transition: background 0.2s;
        }

        .badge-status {
            font-size: 1em;
            border-radius: 12px;
            letter-spacing: 1px;
        }

        .badge-active {
            background: linear-gradient(90deg, #28a745 60%, #218838 100%);
            color: #fff;
        }

        .badge-inactive {
            background: linear-gradient(90deg, #dc3545 60%, #b21f2d 100%);
            color: #fff;
        }

        .no-results {
            text-align: center;
            color: #888;
            font-size: 1.1em;
            padding: 30px 0;
        }

        @media (max-width: 768px) {
            .table-responsive {
                padding: 0;
            }

            .card {
                padding: 0.5rem;
            }

            .search-bar {
                width: 100%;
            }
        }
    </style>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h1 class="fw-bold mb-2" style="font-size:2rem;"><?php echo e(__('dashboard.products')); ?></h1>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-success shadow mb-2" data-bs-toggle="tooltip"
                title="<?php echo e(__('dashboard.create_product')); ?>">
                <i class="fa fa-plus"></i> <?php echo e(__('dashboard.create_product')); ?>

            </a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" id="productSearch" class="form-control search-bar"
                placeholder="🔍 ابحث عن منتج بالاسم أو الوصف...">
        </div>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0" id="productsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('dashboard.name')); ?></th>
                            <th><?php echo e(__('dashboard.description')); ?></th>
                            <th><?php echo e(__('dashboard.image')); ?></th>
                            <th><?php echo e(__('dashboard.status')); ?></th>
                            <th><?php echo e(__('dashboard.category')); ?></th>
                            <th><?php echo e(__('dashboard.actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td class="fw-semibold"><?php echo e($product->name); ?></td>
                                <td><?php echo e(Str::limit($product->description, 50)); ?></td>
                                <td>
                                    <img src="<?php echo e(asset($product->image ?? 'admin/assets/img/product_default.png')); ?>"
                                        alt="<?php echo e($product->name); ?>" width="60"
                                        class="rounded-circle border product-img">
                                </td>
                                <td>
                                    <?php if($product->status == 1): ?>
                                        <span
                                            class="badge badge-status badge-active px-3 py-2"><?php echo e(__('dashboard.active')); ?></span>
                                    <?php else: ?>
                                        <span
                                            class="badge badge-status badge-inactive px-3 py-2"><?php echo e(__('dashboard.inactive')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($product->category->name ?? '-'); ?></td>
                                <td class="action-btns">
                                    <a href="<?php echo e(route('admin.products.show', $product->id)); ?>" class="btn btn-info btn-sm"
                                        data-bs-toggle="tooltip" title="<?php echo e(__('dashboard.view')); ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                                        class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        title="<?php echo e(__('dashboard.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                            title="<?php echo e(__('dashboard.delete')); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div id="noResults" class="no-results" style="display:none;">لا توجد نتائج مطابقة.</div>
            </div>
            
        </div>
    </div>
    <script>
        // تفعيل البحث الديناميكي
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('productSearch');
            const table = document.getElementById('productsTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const noResults = document.getElementById('noResults');

            searchInput.addEventListener('keyup', function() {
                let filter = searchInput.value.toLowerCase();
                let visibleCount = 0;
                for (let i = 0; i < rows.length; i++) {
                    let name = rows[i].cells[1].textContent.toLowerCase();
                    let desc = rows[i].cells[2].textContent.toLowerCase();
                    if (name.includes(filter) || desc.includes(filter)) {
                        rows[i].style.display = '';
                        visibleCount++;
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
                noResults.style.display = visibleCount === 0 ? '' : 'none';
            });

            // تفعيل Tooltip للأزرار (Bootstrap 5)
            if (window.bootstrap) {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/admin/products/index.blade.php ENDPATH**/ ?>