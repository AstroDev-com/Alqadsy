<?php $__env->startSection('title', 'المستخدمين المحذوفين'); ?>
<?php $__env->startSection('page_title'); ?>
    <div class="d-flex align-items-center gap-3">
        <div class="page-title-icon bg-danger bg-opacity-10 p-3 rounded-2">
            <i class="fas fa-trash-alt fs-2 text-danger"></i>
        </div>
        <div>
            <h1 class="mb-1 fw-bold">المستخدمين المحذوفين مؤقتاً</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المستخدمين المحذوفين</li>
                </ol>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary bg-opacity-10 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-trash-alt me-2"></i>
                        قائمة المستخدمين المحذوفين
                    </h5>
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left me-2"></i>العودة
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <?php if($users->isEmpty()): ?>
                    <div class="empty-state bg-light rounded-3 m-4 p-5 text-center">
                        <div class="empty-state-icon mb-4">
                            <i class="fas fa-trash-alt fa-4x text-muted opacity-25"></i>
                        </div>
                        <h3 class="h4 mb-3 fw-bold">لا يوجد مستخدمين محذوفين</h3>
                        <p class="text-muted mb-4">سيظهر هنا أي مستخدمين يتم حذفهم مؤقتاً من النظام</p>
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary px-4">
                            <i class="fas fa-users me-2"></i>إدارة المستخدمين
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 fw-bold text-primary">المستخدم</th>
                                    <th class="fw-bold text-primary">البريد الإلكتروني</th>
                                    <th class="fw-bold text-primary">تاريخ الحذف</th>
                                    <th class="text-end pe-4 fw-bold text-primary">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="symbol symbol-40px">
                                                    <div class="symbol-label bg-danger bg-opacity-10 fs-3">
                                                        <i class="fas fa-user-circle text-danger"></i>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold"><?php echo e($user->name); ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-envelope me-2"></i>
                                            <span class="text-muted"><?php echo e($user->email); ?></span>
                                        </td>
                                        <td>
                                            <div class="badge bg-light text-dark">
                                                <i class="fas fa-clock me-2"></i>
                                                <?php echo e($user->deleted_at->translatedFormat('d M Y - H:i')); ?>

                                            </div>
                                        </td>
                                        <td class="pe-4">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <form action="<?php echo e(route('users.restore', $user->id)); ?>" method="POST"
                                                    class="d-inline" data-confirm="هل تريد استعادة <?php echo e($user->name); ?>؟">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-icon btn-success btn-sm">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                </form>

                                                <form action="<?php echo e(route('users.forceDelete', $user->id)); ?>" method="POST"
                                                    class="d-inline"
                                                    data-confirm="هل تريد حذف <?php echo e($user->name); ?> نهائياً؟">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-icon btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .card {
            border-radius: 0.75rem;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .table-hover tbody tr {
            transition: all 0.2s;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .btn-icon:hover {
            transform: scale(1.05);
        }

        .symbol {
            width: 40px;
            height: 40px;
        }

        .symbol-label {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.querySelectorAll('form[data-confirm]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const message = this.getAttribute('data-confirm');

                Swal.fire({
                    title: 'تأكيد الإجراء',
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم، متأكد',
                    cancelButtonText: 'إلغاء',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\role-permission\user\trashed.blade.php ENDPATH**/ ?>