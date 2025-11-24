<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">التصنيفات</h1>
            <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i> إضافة تصنيف
            </a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" id="categorySearch" class="form-control search-bar"
                placeholder="🔍 ابحث عن تصنيف بالاسم أو الوصف...">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="categoriesTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الصورة</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(($categories->currentPage() - 1) * $categories->perPage() + $index + 1); ?></td>
                            <td class="fw-semibold"><?php echo highlight($category->name, request('search')); ?></td>
                            <td>
                                <span title="<?php echo e($category->description); ?>">
                                    <?php echo highlight(Str::limit($category->description, 40), request('search')); ?>

                                </span>
                            </td>
                            <td>
                                <img src="<?php echo e($category->image ? asset($category->image) : asset('admin/assets/img/product_default.png')); ?>"
                                    alt="<?php echo e($category->name); ?>" width="60" height="60" class="rounded-circle border">
                            </td>
                            <td>
                                <?php if($category->status == 1): ?>
                                    <span class="badge bg-success">نشط</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">غير نشط</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>"
                                    class="btn btn-info btn-sm me-1" title="عرض"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>"
                                    class="btn btn-primary btn-sm me-1" title="تعديل"><i class="fa fa-edit"></i></a>
                                <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">لا توجد تصنيفات حالياً.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="noCategoryResults" class="no-results" style="display:none;">لا توجد نتائج مطابقة.</div>
        </div>
        <?php if(request('search')): ?>
            <div class="alert alert-info mt-3">
                نتائج البحث عن: <strong><?php echo e(request('search')); ?></strong>
                <?php if($categories->isEmpty()): ?>
                    <br>لا توجد نتائج مطابقة.
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($categories->withQueryString()->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .search-bar {
            max-width: 300px;
            border-radius: 25px;
            padding-right: 35px;
            background: #f8f9fa;
        }

        .no-results {
            text-align: center;
            color: #888;
            font-size: 1.1em;
            padding: 30px 0;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('categorySearch');
            const table = document.getElementById('categoriesTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const noResults = document.getElementById('noCategoryResults');

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
        });
    </script>
<?php $__env->stopPush(); ?>

<?php
    function highlight(string $text, ?string $word)
    {
        if (!$word) {
            return $text;
        }
        return str_ireplace($word, '<mark>' . $word . '</mark>', $text);
    }
?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>