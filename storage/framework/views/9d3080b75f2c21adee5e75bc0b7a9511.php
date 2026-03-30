<?php $__env->startSection('title', __('dashboard.conversations')); ?> 

<?php $__env->startPush('styles'); ?>
    <style>
        .conversation-item.unread {
            background-color: var(--gray);
            /* Similar to unread notification */
            border-left: 4px solid var(--success);
            /* Green border for unread chat */
            font-weight: bold;
        }

        .conversation-item>a {
            color: var(--dark);
        }

        .conversation-item>a:hover {
            background-color: var(--gray);
        }

        .participant-avatars img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-left: -8px;
            /* Overlap avatars slightly */
            border: 1px solid var(--light);
        }

        .participant-avatars .avatar-placeholder {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: var(--gray);
            color: var(--dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8em;
            margin-left: -8px;
            border: 1px solid var(--light);
        }

        .text-muted {
            color: var(--gray) !important;
        }

        .card {
            background-color: var(--light);
            border: 1px solid var(--gray);
        }

        .list-group-item {
            background-color: var(--light);
            border-color: var(--gray);
            color: var(--dark);
        }

        .card-footer {
            background-color: var(--light) !important;
            border-top: 1px solid var(--gray);
        }

        .badge.bg-success {
            background-color: var(--success) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .text-gray-800 {
            color: var(--dark) !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        
        <?php echo $__env->make('admin.partials.session-messages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.conversations')); ?></h1>
            
            <a href="<?php echo e(route('conversations.create')); ?>" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> <?php echo e(__('dashboard.new_conversation')); ?>

            </a>
        </div>

        
        <div class="card shadow mb-4">
            <div class="card-body p-0">
                <?php if($conversations->count() > 0): ?>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Get participants other than the current user
                                $otherParticipants = $conversation->participants->where('id', '!=', Auth::id());
                                // Check if the conversation has unread messages for the current user
                                $isUnread = $conversation->unread_count > 0;
                            ?>
                            <li class="list-group-item conversation-item <?php echo e($isUnread ? 'unread' : 'read'); ?>">
                                <a href="<?php echo e(route('conversations.show', $conversation->id)); ?>"
                                    class="text-decoration-none text-dark d-flex align-items-center">
                                    
                                    <div class="participant-avatars <?php echo e($isRTL ?? false ? 'ms-3' : 'me-3'); ?>">
                                        <?php $__empty_1 = true; $__currentLoopData = $otherParticipants->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            
                                            <img src="<?php echo e($participant->profile_image ? asset('storage/' . $participant->profile_image) : asset('admin\assets\img/emp_default.png')); ?>"
                                                alt="<?php echo e($participant->name); ?>" class="avatar-placeholder">
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <span class="avatar-placeholder"><i class="fas fa-user"></i></span>
                                        <?php endif; ?>
                                        <?php if($otherParticipants->count() > 3): ?>
                                            <span class="avatar-placeholder">+<?php echo e($otherParticipants->count() - 3); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold <?php echo e($isUnread ? 'text-primary' : ''); ?>">
                                                <?php echo e($otherParticipants->pluck('name')->implode(', ')); ?>

                                            </span>
                                            <small class="text-muted ms-2">
                                                <?php echo e($conversation->latestMessage?->created_at->diffForHumans() ?? $conversation->updated_at->diffForHumans()); ?>

                                            </small>
                                        </div>
                                        <p class="mb-0 text-muted small text-truncate" style="max-width: 80%;">
                                            
                                            <?php if($conversation->latestMessage && $conversation->latestMessage->user_id !== Auth::id()): ?>
                                                <strong><?php echo e($conversation->latestMessage->user->name); ?>:</strong>
                                            <?php endif; ?>
                                            <?php echo e($conversation->latestMessage?->body ?? __('dashboard.no_messages_yet')); ?>

                                        </p>
                                    </div>

                                    
                                    <?php if($isUnread): ?>
                                        <span
                                            class="badge bg-success rounded-pill ms-3"><?php echo e($conversation->unread_count); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center text-muted p-5"><?php echo e(__('dashboard.no_conversations_found')); ?></p>
                <?php endif; ?>
            </div>

            
            <?php if($conversations->hasPages()): ?>
                <div class="card-footer bg-light border-top">
                    <?php echo e($conversations->links()); ?>

                </div>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u746187910/domains/alqadsy.com/public_html/resources/views/admin/conversations/index.blade.php ENDPATH**/ ?>