<?php $__env->startSection('title', __('dashboard.edit_profile')); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid user-profile-page-container">
        <div class="py-4">
            <div class="row justify-content-center">
                
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4><?php echo e(__('dashboard.profile_information')); ?></h4>
                            <p class="text-muted small mb-0"><?php echo e(__('dashboard.update_profile_info_description')); ?></p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.profile.update')); ?>" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('patch'); ?>

                                
                                <?php if(session('status') === 'profile-updated'): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(__('dashboard.profile_updated_successfully')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                
                                <div class="mb-3">
                                    <label for="name" class="form-label"><?php echo e(__('dashboard.name')); ?></label>
                                    <input id="name" name="name" type="text"
                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('name', $user->name)); ?>" required autofocus autocomplete="name">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="email" class="form-label"><?php echo e(__('dashboard.email')); ?></label>
                                    <input id="email" name="email" type="email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('email', $user->email)); ?>" required autocomplete="username">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()): ?>
                                        <div>
                                            <p class="text-sm mt-2 text-warning">
                                                <?php echo e(__('dashboard.email_unverified')); ?>


                                                <button form="send-verification"
                                                    class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('dashboard.click_resend_verification')); ?></button>
                                            </p>

                                            <?php if(session('status') === 'verification-link-sent'): ?>
                                                <p class="mt-2 fw-medium text-sm text-success">
                                                    <?php echo e(__('dashboard.verification_link_sent')); ?>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label"><?php echo e(__('dashboard.phone_number')); ?></label>
                                    <input id="phone_number" name="phone_number" type="tel"
                                        class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('phone_number', $user->phone_number)); ?>" autocomplete="tel">
                                    <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e(__('dashboard.profile_image')); ?></label>
                                    <div class="profile-image-upload position-relative mx-auto mx-md-0"
                                        style="width: 150px; height: 150px;">
                                        <img id="profileImagePreview"
                                            src="<?php echo e($user->profile_image ? Storage::url($user->profile_image) : asset('admin/assets/img/emp_default.png')); ?>"
                                            alt="Profile Image"
                                            class="rounded-circle <?php echo e($user->profile_image ? 'border p-1 shadow-sm img-thumbnail' : ''); ?>"
                                            width="150" height="150" style="object-fit: cover;">
                                        <label for="profile_image" class="profile-image-edit-button">
                                            <i class="fas fa-pencil-alt"></i>
                                        </label>
                                        <input id="profile_image" name="profile_image" type="file"
                                            class="form-control d-none <?php $__errorArgs = ['profile_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            accept="image/png, image/jpeg, image/jpg, image/webp"
                                            onchange="previewProfileImage(event)">
                                    </div>
                                    <?php $__errorArgs = ['profile_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block text-center text-md-start"><?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-save me-2"></i><?php echo e(__('dashboard.save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4><?php echo e(__('dashboard.update_password')); ?></h4>
                            <p class="text-muted small mb-0"><?php echo e(__('dashboard.update_password_description')); ?></p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.profile.password.update')); ?>"
                                class="needs-validation" novalidate>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('patch'); ?>

                                
                                <?php if(session('status') === 'password-updated'): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(__('dashboard.password_updated_successfully')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                
                                <div class="mb-3">
                                    <label for="current_password"
                                        class="form-label"><?php echo e(__('dashboard.current_password')); ?></label>
                                    <input id="current_password" name="current_password" type="password"
                                        class="form-control <?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        autocomplete="current-password" required>
                                    <?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="password" class="form-label"><?php echo e(__('dashboard.new_password')); ?></label>
                                    <input id="password" name="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        autocomplete="new-password" required>
                                    
                                    <div class="progress mt-2" style="height: 5px;"
                                        id="passwordStrengthProgressContainer">
                                        <div id="passwordStrengthProgress" class="progress-bar" role="progressbar"
                                            style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small id="passwordStrengthText" class="form-text text-muted"></small>
                                    <?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="password_confirmation"
                                        class="form-label"><?php echo e(__('dashboard.confirm_password')); ?></label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="form-control <?php $__errorArgs = ['password_confirmation', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        autocomplete="new-password" required>
                                    <?php $__errorArgs = ['password_confirmation', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-save me-2"></i><?php echo e(__('dashboard.save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Inspired by supplier edit page - Apply similar card styling */
        .user-profile-page-container .card {
            border: none;
            border-radius: 1rem;
            /* Rounded corners */
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            /* Softer shadow */
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            /* Needed for potential border effects */
            margin-bottom: 2rem;
            /* Ensure spacing between cards */
        }

        .user-profile-page-container .card-header {
            background-color: #f8f9fc;
            /* Light background for header */
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.5rem;
            border-top-left-radius: 1rem;
            /* Match card radius */
            border-top-right-radius: 1rem;
            /* Match card radius */
        }

        .user-profile-page-container .card-header h4 {
            margin-bottom: 0.25rem;
            font-weight: 600;
            color: #5a5c69;
        }

        .user-profile-page-container .card-header p {
            font-size: 0.85rem;
        }

        .user-profile-page-container .card-body {
            padding: 2rem;
            /* More padding */
        }

        /* Input and Label Styling */
        .user-profile-page-container .form-label {
            font-weight: 500;
            color: #5a5c69;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .user-profile-page-container .form-control {
            border-radius: 0.5rem;
            /* Consistent rounded inputs */
            border: 1px solid #d1d3e2;
            padding: 0.75rem 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            font-size: 0.9rem;
        }

        .user-profile-page-container .form-control:focus {
            border-color: #4e73df;
            /* Primary color focus */
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
        }

        .user-profile-page-container .form-control.is-invalid {
            border-color: #e74a3b;
            /* Danger color */
        }

        .user-profile-page-container .form-control.is-invalid:focus {
            box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.15);
        }

        .user-profile-page-container .invalid-feedback {
            font-size: 0.8rem;
            margin-top: 0.3rem;
        }

        /* Button Styling */
        .user-profile-page-container .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .user-profile-page-container .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
            transform: translateY(-2px);
            box-shadow: 0 0.25rem 0.5rem rgba(78, 115, 223, 0.2);
        }

        /* Profile Image Upload Styling */
        .profile-image-upload {
            transition: all 0.3s ease;
            border-radius: 50%;
            /* Ensure container is round */
            overflow: hidden;
            /* Hide overflow */
            border: 3px solid #fff;
            /* Add white border like thumbnail */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            /* Add shadow */
        }

        .profile-image-upload img {
            transition: filter 0.3s ease, transform 0.3s ease;
            /* Add transform transition */
            display: block;
            /* Remove any potential bottom space */
        }

        .profile-image-upload .profile-image-edit-button {
            position: absolute;
            bottom: 5px;
            right: 10px;
            width: 40px;
            height: 40px;
            /* Use primary color from template - subtle gradient */
            background-image: linear-gradient(135deg, rgba(78, 115, 223, 0.9) 0%, rgba(58, 90, 190, 0.95) 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            transform: scale(0.8);
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .profile-image-upload:hover .profile-image-edit-button {
            opacity: 1;
            transform: scale(1);
            /* Enhance hover effect */
            background-image: linear-gradient(135deg, rgba(78, 115, 223, 1) 0%, rgba(58, 90, 190, 1) 100%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25);
        }

        .profile-image-upload:hover img {
            filter: brightness(0.8);
            transform: scale(1.05);
            /* Slight zoom on hover */
        }

        /* Email Verification Button */
        .btn-link {
            color: #4e73df;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #2e59d9;
            text-decoration: underline;
        }

        /* Password Strength Meter */
        #passwordStrengthProgressContainer {
            height: 6px;
            /* Slightly thicker */
            border-radius: 3px;
            background-color: #e9ecef;
            /* Background for the container */
            margin-top: 0.5rem;
            /* Space it from input */
        }

        #passwordStrengthProgress {
            transition: width 0.3s ease-in-out, background-color 0.3s ease-in-out;
            border-radius: 3px;
        }

        #passwordStrengthText {
            font-size: 0.8rem;
            margin-top: 0.3rem;
            display: block;
            /* Ensure it takes space */
            height: 1.2em;
            /* Reserve space to prevent layout shift */
        }

        /* Responsive adjustments if needed */
        @media (max-width: 991.98px) {

            /* Adjust breakpoint for col-lg */
            .user-profile-page-container .card-body {
                padding: 1.5rem;
            }

            .profile-image-upload {
                margin: 0 auto 1.5rem auto !important;
                /* Center image on smaller screens */
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function previewProfileImage(event) {
            const input = event.target;
            const preview = document.getElementById('profileImagePreview');
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            } else {
                // Restore original if selection cancelled (optional)
                // preview.src = "<?php echo e($user->profile_image ? Storage::url($user->profile_image) : asset('admin/assets/img/emp_default.png')); ?>";
            }
        }
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const strengthProgress = document.getElementById('passwordStrengthProgress');
            const strengthText = document.getElementById('passwordStrengthText');
            const progressContainer = document.getElementById('passwordStrengthProgressContainer');

            if (passwordInput && strengthProgress && strengthText && progressContainer) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    let score = 0;
                    let feedback = '';
                    let progressClass = '';
                    let width = '0%';

                    if (password.length === 0) {
                        progressContainer.style.display = 'none'; // Hide if empty
                        strengthText.textContent = '';
                    } else {
                        progressContainer.style.display = 'block'; // Show if not empty

                        if (password.length >= 8) score++;
                        if (password.match(/[a-z]/)) score++;
                        if (password.match(/[A-Z]/)) score++;
                        if (password.match(/[0-9]/)) score++;
                        if (password.match(/[^a-zA-Z0-9]/)) score++; // Special characters

                        width = (score * 20) + '%';

                        switch (score) {
                            case 0:
                            case 1:
                                feedback =
                                    '<?php echo e(__('dashboard.password_strength_very_weak', ['fallback' => 'Very Weak'])); ?>';
                                progressClass = 'bg-danger';
                                break;
                            case 2:
                                feedback =
                                    '<?php echo e(__('dashboard.password_strength_weak', ['fallback' => 'Weak'])); ?>';
                                progressClass = 'bg-warning';
                                break;
                            case 3:
                                feedback =
                                    '<?php echo e(__('dashboard.password_strength_medium', ['fallback' => 'Medium'])); ?>';
                                progressClass = 'bg-info';
                                break;
                            case 4:
                                feedback =
                                    '<?php echo e(__('dashboard.password_strength_strong', ['fallback' => 'Strong'])); ?>';
                                progressClass = 'bg-success';
                                break;
                            case 5:
                                feedback =
                                    '<?php echo e(__('dashboard.password_strength_very_strong', ['fallback' => 'Very Strong'])); ?>';
                                progressClass = 'bg-success fw-bold'; // Make very strong stand out
                                break;
                        }
                        strengthText.textContent = feedback;
                        strengthProgress.style.width = width;
                        strengthProgress.className = 'progress-bar ' +
                            progressClass; // Reset and apply class
                        strengthProgress.setAttribute('aria-valuenow', score * 20);
                    }
                });
                // Initial check in case of prefilled password (e.g., browser autocomplete)
                // passwordInput.dispatchEvent(new Event('input')); // Optional: trigger on load
                progressContainer.style.display = 'none'; // Initially hidden
            }
        });
    </script>

    
    <script>
        (function() {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Select form groups within the styled container
            document.querySelectorAll(
                '.user-profile-page-container .form-group, .user-profile-page-container .mb-3').forEach((group,
                index) => {
                // Check if it's the image upload group, handle differently if needed or skip
                if (!group.querySelector('.profile-image-upload')) {
                    group.style.opacity = '0';
                    group.style.transform = 'translateY(20px)';
                    // Apply animation with a slight delay based on index
                    group.style.animation = `fadeInUpForm 0.4s ease-out ${index * 0.05}s forwards`;
                }
            });

            // Inject the keyframes CSS into the head
            const formStyleSheet = document.createElement("style");
            formStyleSheet.type = "text/css";
            formStyleSheet.innerText = `@keyframes fadeInUpForm { to { opacity: 1; transform: translateY(0); } }`;
            document.head.appendChild(formStyleSheet);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/user/profile/edit.blade.php ENDPATH**/ ?>