<?php $__env->startSection('title', __('dashboard.notifications')); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .notification-item.unread {
            /* background-color: #f8f9fa; */
            /* Original light background */
            background-color: #eef2f7;
            /* Slightly more noticeable background */
            border-left: 4px solid #0d6efd;
            /* Blue left border for unread */
        }

        .notification-item.read {
            opacity: 0.8;
        }

        /* Add hover effect to the link within the item */
        .notification-item>a:hover {
            background-color: rgba(0, 0, 0, 0.03);
            /* Subtle hover background */
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            /* background-color: #e9ecef; */
            /* Original icon background */
            background-color: #f1f3f5;
            /* Lighter icon background */
            color: #495057;
        }

        .notification-card .card-body {
            padding: 1rem;
            /* Adjust padding as needed */
        }

        .notification-card .card-footer {
            padding: 0.75rem 1rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.all_notifications')); ?></h1>
            
            <?php if(Auth::user()->unreadNotifications->count() > 0): ?>
                <form action="<?php echo e(route('notifications.markAllRead')); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-check-double fa-sm text-white-50"></i> <?php echo e(__('dashboard.mark_all_read')); ?>

                    </button>
                </form>
            <?php endif; ?>
        </div>

        <div class="card shadow mb-4 notification-card">
            <div class="card-body p-0">
                <?php if($notifications->count() > 0): ?>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li
                                class="list-group-item notification-item <?php echo e($notification->read_at ? 'read' : 'unread'); ?> d-flex justify-content-between align-items-center">
                                
                                <a href="<?php echo e(route('notifications.markAsRead', ['notification' => $notification->id, 'redirect_url' => $notification->data['url'] ?? url()->current()])); ?>"
                                    class="text-decoration-none text-dark d-flex align-items-start flex-grow-1 <?php echo e($isRTL ?? false ? 'me-3' : 'ms-3'); ?>">
                                    <div class="notification-icon <?php echo e($isRTL ?? false ? 'ms-3' : 'me-3'); ?>">
                                        <i class="<?php echo e($notification->data['icon'] ?? 'fas fa-info-circle'); ?> fs-5"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-1"><?php echo $notification->data['message'] ?? 'Notification content missing.'; ?></p>
                                        <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                        <?php if(!$notification->read_at): ?>
                                            <span
                                                class="badge bg-primary rounded-pill <?php echo e($isRTL ?? false ? 'me-2' : 'ms-2'); ?>"><?php echo e(__('dashboard.new')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>

                                
                                <div class="notification-actions <?php echo e($isRTL ?? false ? 'me-2' : 'ms-2'); ?>">
                                    
                                    <?php if($notification->read_at): ?>
                                        <form action="<?php echo e(route('notifications.markAsUnread', $notification->id)); ?>"
                                            method="POST" class="d-inline me-1">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?> 
                                            <button type="submit" class="btn btn-sm btn-outline-secondary p-1"
                                                title="<?php echo e(__('dashboard.mark_as_unread')); ?>">
                                                <i class="fas fa-eye-slash fa-fw"></i> 
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                    
                                    <form action="<?php echo e(route('notifications.destroy', $notification->id)); ?>" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('<?php echo e(__('dashboard.are_you_sure_delete_notification')); ?>');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger p-1"
                                            title="<?php echo e(__('dashboard.delete')); ?>">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center text-muted p-5"><?php echo e(__('dashboard.no_notifications_found')); ?></p>
                <?php endif; ?>
            </div>

            <?php if($notifications->hasPages()): ?>
                <div class="card-footer bg-light border-top">
                    <?php echo e($notifications->links()); ?> 
                </div>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\notifications\index.blade.php ENDPATH**/ ?>