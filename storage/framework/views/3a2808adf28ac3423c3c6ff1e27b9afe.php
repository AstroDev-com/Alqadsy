<?php $__env->startSection('title', 'الرسائل والمذكرات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">الرسائل والمذكرات</h3>
                        <a href="<?php echo e(route('messages.create')); ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> رسالة جديدة
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>المرسل</th>
                                        <th>المستلم</th>
                                        <th>الموضوع</th>
                                        <th>الأولوية</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($messages->isEmpty()): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">لا توجد رسائل</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="<?php echo e($message->status === 'unread' ? 'table-warning' : ''); ?>">
                                                <td><?php echo e($message->sender->name); ?></td>
                                                <td><?php echo e($message->receiver->name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('messages.show', $message)); ?>">
                                                        <?php echo e($message->subject); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-<?php echo e($message->priority === 'high' ? 'danger' : ($message->priority === 'medium' ? 'warning' : 'info')); ?>">
                                                        <?php echo e($message->priority); ?>

                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-<?php echo e($message->status === 'unread' ? 'warning' : ($message->status === 'read' ? 'success' : 'secondary')); ?>">
                                                        <?php echo e($message->status); ?>

                                                    </span>
                                                </td>
                                                <td><?php echo e($message->created_at->format('Y-m-d H:i')); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo e(route('messages.show', $message)); ?>"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <?php if($message->status === 'unread'): ?>
                                                            <form action="<?php echo e(route('messages.markAsRead', $message)); ?>"
                                                                method="POST" class="d-inline">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                        <form action="<?php echo e(route('messages.archive', $message)); ?>" method="POST"
                                                            class="d-inline">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-sm btn-secondary">
                                                                <i class="fas fa-archive"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <?php echo e($messages->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\messages\index.blade.php ENDPATH**/ ?>