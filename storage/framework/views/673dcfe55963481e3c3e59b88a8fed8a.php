<?php
    $currentUser = Auth::user();
    $otherParticipants = $conversation->participants->where('id', '!=', $currentUser->id);
    $participantsString = $otherParticipants->pluck('name')->implode(', ');
?>

<?php $__env->startSection('title', __('dashboard.conversation_with', ['name' => $participantsString])); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --primary-color: #14b8a6;
            --primary-hover: #0d9488;
            --incoming-bg: var(--light);
            --outgoing-bg: var(--primary);
            --text-primary: var(--dark);
            --text-secondary: var(--gray);
            --border-color: var(--gray);
        }

        .chat-container {
            height: calc(100vh - 200px);
            display: flex;
            flex-direction: column;
            background: var(--light);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        /* Header Section */
        .chat-header {
            padding: 1.5rem;
            background: var(--light);
            border-bottom: 1px solid var(--border-color);
            border-radius: 12px 12px 0 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .participant-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .participant-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
            box-shadow: var(--shadow-sm);
        }

        .participant-status {
            font-size: 0.875rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .online-dot {
            width: 10px;
            height: 10px;
            background: var(--primary-color);
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.8;
            }

            70% {
                transform: scale(1.1);
                opacity: 0.4;
            }

            100% {
                transform: scale(0.95);
                opacity: 0.8;
            }
        }

        /* Messages Container */
        .chat-messages {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            scroll-behavior: smooth;
            background: var(--light);
        }

        .message-group {
            margin-bottom: 1.5rem;
        }

        .message {
            display: flex;
            gap: 0.75rem;
            max-width: 80%;
            margin-bottom: 0.5rem;
            transition: transform 0.2s ease;
            align-items: center;
        }

        .message:hover {
            transform: translateX(4px);
        }

        .message.incoming {
            margin-right: auto;
        }

        .message.outgoing {
            margin-left: auto;
            flex-direction: row-reverse;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid var(--primary-color);
        }

        .message-bubble {
            padding: 0.875rem 1.25rem;
            border-radius: 16px;
            line-height: 1.5;
            position: relative;
            word-break: break-word;
            box-shadow: var(--shadow-sm);
        }

        .incoming .message-bubble {
            background: var(--incoming-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            border-radius: 16px 16px 16px 4px;
        }

        .outgoing .message-bubble {
            background: var(--outgoing-bg);
            color: white;
            border-radius: 16px 16px 4px 16px;
        }

        .message-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .outgoing .message-time {
            justify-content: flex-end;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Date Separator */
        .date-separator {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .date-separator span {
            background: var(--light);
            padding: 0.25rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            color: var(--text-secondary);
            position: relative;
            z-index: 1;
            border: 1px solid var(--border-color);
        }

        .date-separator:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--border-color);
            z-index: 0;
        }

        /* Input Area */
        .message-input-area {
            padding: 1.5rem;
            background: var(--light);
            border-top: 1px solid var(--border-color);
            border-radius: 0 0 12px 12px;
        }

        .message-form {
            display: flex;
            gap: 1rem;
            align-items: flex-end;
        }

        .message-input {
            flex: 1;
            padding: 0.875rem 1.25rem;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            resize: none;
            line-height: 1.5;
            transition: all 0.2s ease;
            background: var(--light);
            color: var(--text-primary);
        }

        .message-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }

        .send-button {
            padding: 0.75rem 1.5rem;
            border-radius: 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .send-button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        /* Scroll to Bottom Button */
        .scroll-bottom-btn {
            position: fixed;
            bottom: 100px;
            right: 30px;
            background: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .scroll-bottom-btn.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Text Colors */
        .text-muted {
            color: var(--text-secondary) !important;
        }

        /* Card Styles */
        .card {
            background: var(--light);
            border: 1px solid var(--border-color);
        }

        /* RTL Support */
        [dir="rtl"] .message.incoming {
            margin-left: auto;
            margin-right: 0;
        }

        [dir="rtl"] .message.outgoing {
            margin-right: auto;
            margin-left: 0;
        }

        [dir="rtl"] .incoming .message-bubble {
            border-radius: 16px 16px 4px 16px;
        }

        [dir="rtl"] .outgoing .message-bubble {
            border-radius: 16px 16px 16px 4px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="card shadow-lg">
            
            <div class="chat-header">
                <div class="participant-info">
                    <?php if($otherParticipants->count() > 1): ?>
                        <div class="avatar-group">
                            <?php $__currentLoopData = $otherParticipants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e($participant->profile_image ? asset('storage/' . $participant->profile_image) : asset('admin\assets\img/emp_default.png')); ?>"
                                    onerror="this.onerror=null; this.src='<?php echo e(asset('admin\assets\img/emp_default.png')); ?>'"
                                    class="participant-avatar" alt="<?php echo e($participant->name); ?>"
                                    title="<?php echo e($participant->name); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <?php $participant = $otherParticipants->first(); ?>
                        <img src="<?php echo e($participant->profile_image ? asset('storage/' . $participant->profile_image) : asset('admin\assets\img/emp_default.png')); ?>"
                            class="participant-avatar" alt="<?php echo e($participant->name); ?>">
                    <?php endif; ?>
                    <div>
                        <h5 class="mb-0"><?php echo e($participantsString); ?></h5>
                        <div class="participant-status">
                            <span class="online-dot"></span>
                            <span><?php echo e(__('dashboard.online')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="chat-messages" id="chat-messages">
                <?php $lastMessageDate = null; ?>
                <?php if($messages->isEmpty()): ?>
                    <div class="text-center text-muted py-4">
                        <?php echo e(__('dashboard.no_messages_in_conversation')); ?>

                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $isOutgoing = $message->user_id === $currentUser->id;
                            $currentMessageDate = $message->created_at->format('Y-m-d');
                        ?>

                        <?php if($currentMessageDate != $lastMessageDate): ?>
                            <div class="date-separator">
                                <span>
                                    <?php if($message->created_at->isToday()): ?>
                                        <?php echo e(__('dashboard.today')); ?>

                                    <?php elseif($message->created_at->isYesterday()): ?>
                                        <?php echo e(__('dashboard.yesterday')); ?>

                                    <?php else: ?>
                                        <?php echo e($message->created_at->translatedFormat('l, j F Y')); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                            <?php $lastMessageDate = $currentMessageDate; ?>
                        <?php endif; ?>

                        <div class="message-group">
                            <div class="message <?php echo e($isOutgoing ? 'outgoing' : 'incoming'); ?>">
                                
                                <?php if (! ($isOutgoing)): ?>
                                    <img src="<?php echo e($message->user->profile_image ? asset('storage/' . $message->user->profile_image) : asset('admin\assets\img/emp_default.png')); ?>"
                                        class="message-avatar" alt="<?php echo e($message->user->name); ?>">
                                <?php endif; ?>

                                
                                <?php if($isOutgoing): ?>
                                    <img src="<?php echo e($currentUser->profile_image ? asset('storage/' . $currentUser->profile_image) : asset('admin\assets\img/emp_default.png')); ?>"
                                        class="message-avatar" alt="<?php echo e($currentUser->name); ?>">
                                <?php endif; ?>

                                <div class="message-bubble">
                                    <div class="message-text"><?php echo nl2br(e($message->body)); ?></div>
                                    <div class="message-time">
                                        <span><?php echo e($message->created_at->format('g:i A')); ?></span>
                                        <?php if($isOutgoing): ?>
                                            <i class="fas fa-check-double text-xs opacity-70"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            
            <div class="message-input-area">
                <form class="message-form" action="<?php echo e(route('conversations.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="conversation_id" value="<?php echo e($conversation->id); ?>">

                    <textarea name="message" class="message-input" rows="1" placeholder="<?php echo e(__('dashboard.type_your_message')); ?>..."
                        required oninput="autoResize(this)"></textarea>

                    <button type="submit" class="send-button">
                        <i class="fas fa-paper-plane"></i>
                        <span class="d-none d-md-inline"><?php echo e(__('dashboard.send')); ?></span>
                    </button>
                </form>
            </div>
        </div>

        
        <div class="scroll-bottom-btn" id="scrollBottomBtn">
            <i class="fas fa-arrow-down"></i>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Auto-resize textarea
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // Scroll to bottom functionality
        const chatMessages = document.getElementById('chat-messages');
        const scrollBottomBtn = document.getElementById('scrollBottomBtn');

        function toggleScrollButton() {
            const {
                scrollTop,
                scrollHeight,
                clientHeight
            } = chatMessages;
            const isNearBottom = scrollHeight - (scrollTop + clientHeight) < 100;
            scrollBottomBtn.classList.toggle('visible', !isNearBottom);
        }

        scrollBottomBtn.addEventListener('click', () => {
            chatMessages.scrollTo({
                top: chatMessages.scrollHeight,
                behavior: 'smooth'
            });
        });

        chatMessages.addEventListener('scroll', toggleScrollButton);
        window.addEventListener('DOMContentLoaded', () => {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });

        // Auto-scroll to bottom when new message is added
        const observer = new MutationObserver(() => {
            const isNearBottom = chatMessages.scrollHeight - (chatMessages.scrollTop + chatMessages.clientHeight) <
                100;
            if (isNearBottom) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            toggleScrollButton();
        });

        observer.observe(chatMessages, {
            childList: true,
            subtree: true
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\conversations\show.blade.php ENDPATH**/ ?>