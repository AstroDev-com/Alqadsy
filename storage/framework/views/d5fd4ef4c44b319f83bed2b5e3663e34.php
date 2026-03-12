<?php $__env->startSection('title', __('dashboard.new_conversation')); ?>

<?php $__env->startPush('styles'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        /* Dark mode styles for the form */
        .card {
            background-color: var(--light);
            border: 1px solid var(--gray);
        }

        .card-header {
            background-color: var(--light);
            border-bottom: 1px solid var(--gray);
        }

        .card-header h6 {
            color: var(--primary);
        }

        .form-label {
            color: var(--dark);
        }

        .form-select,
        .form-control {
            background-color: var(--light);
            border: 1px solid var(--gray);
            color: var(--dark);
        }

        .form-select:focus,
        .form-control:focus {
            background-color: var(--light);
            border-color: var(--primary);
            color: var(--dark);
        }

        /* Select2 Dark Mode Styles */
        .select2-container--bootstrap-5 .select2-selection {
            background-color: var(--light);
            border-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered {
            background-color: var(--light);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice {
            background-color: var(--gray);
            border-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            background-color: var(--light);
            border-color: var(--gray);
        }

        .select2-container--bootstrap-5 .select2-results__option {
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove {
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: var(--primary);
        }

        /* Button styles */
        .btn-secondary {
            background-color: var(--gray);
            border-color: var(--gray);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--light);
        }

        .text-danger {
            color: var(--danger) !important;
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
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.new_conversation')); ?></h1>
            <a href="<?php echo e(route('conversations.index')); ?>" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> <?php echo e(__('dashboard.back_to_conversations')); ?>

            </a>
        </div>

        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('dashboard.start_new_conversation')); ?></h6>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('conversations.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    
                    <div class="mb-3">
                        <label for="recipients" class="form-label"><?php echo e(__('dashboard.recipients')); ?>:</label>
                        <select class="form-select" id="recipients" name="recipients[]" multiple="multiple" required>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['recipients'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-3">
                        <label for="message" class="form-label"><?php echo e(__('dashboard.message')); ?>:</label>
                        <textarea name="message" id="message" class="form-control" rows="4"
                            placeholder="<?php echo e(__('dashboard.type_your_initial_message')); ?>" required><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> <?php echo e(__('dashboard.send_message')); ?>

                    </button>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#recipients').select2({
                theme: "bootstrap-5",
                placeholder: "<?php echo e(__('dashboard.select_recipients')); ?>",
                allowClear: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy API\Alqadsy Web\resources\views\admin\conversations\create.blade.php ENDPATH**/ ?>