<?php $__env->startSection('title', 'عرض الرسالة'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">عرض الرسالة</h3>
                        <div>
                            <?php if($message->status === 'unread'): ?>
                                <form action="<?php echo e(route('messages.markAsRead', $message)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check"></i> تحديد كمقروءة
                                    </button>
                                </form>
                            <?php endif; ?>
                            <form action="<?php echo e(route('messages.archive', $message)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-archive"></i> أرشفة
                                </button>
                            </form>
                            <a href="<?php echo e(route('messages.index')); ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i> العودة للقائمة
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="message-details">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>المرسل:</h5>
                                    <p><?php echo e($message->sender->name); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>المستلم:</h5>
                                    <p><?php echo e($message->receiver->name); ?></p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>الموضوع:</h5>
                                    <p><?php echo e($message->subject); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>الأولوية:</h5>
                                    <p>
                                        <span
                                            class="badge bg-<?php echo e($message->priority === 'high' ? 'danger' : ($message->priority === 'medium' ? 'warning' : 'info')); ?>">
                                            <?php echo e($message->priority); ?>

                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>الحالة:</h5>
                                    <p>
                                        <span
                                            class="badge bg-<?php echo e($message->status === 'unread' ? 'warning' : ($message->status === 'read' ? 'success' : 'secondary')); ?>">
                                            <?php echo e($message->status); ?>

                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>تاريخ الإرسال:</h5>
                                    <p><?php echo e($message->created_at->format('Y-m-d H:i')); ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>المحتوى:</h5>
                                    <div class="message-content p-3 bg-light rounded">
                                        <?php echo nl2br(e($message->content)); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .message-content {
            white-space: pre-wrap;
            line-height: 1.6;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\messages\show.blade.php ENDPATH**/ ?>