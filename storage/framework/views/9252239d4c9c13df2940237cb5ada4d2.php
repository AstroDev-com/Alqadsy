<aside class="sidebar no-print" style="color:light;">
    <div class="sidebar-brand">
        <a href="<?php echo e(route('dashboard')); ?>" class="logo-container">
            <img src="<?php echo e(asset('frontend/images/Alqadsy.png')); ?>" alt="Logo">
        </a>
    </div>
    <nav class="sidebar-menu">
        <a href="<?php echo e(route('dashboard')); ?>" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span><?php echo e(__('dashboard.home', ['fallback' => 'Dashboard'])); ?></span>
            </div>
        </a>

          <a href="<?php echo e(route('admin.categories.index')); ?>" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>التصنيفات</span>
            </div>
        </a>

        <a href="<?php echo e(route('admin.products.index')); ?>" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>المنتجات</span>
            </div>
        </a>

          <a href="<?php echo e(route('home')); ?>" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>المشروع</span>
            </div>
        </a>

        <!-- المستخدمين -->
        <div class="menu-item has-submenu">
            <div class="menu-item-left">
                <i class="fas fa-users text-white"></i>
                <span><?php echo e(__('dashboard.users', ['fallback' => 'Users'])); ?></span>
            </div>
            <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                <i class="fas fa-chevron-left"></i>
            <?php else: ?>
                <i class="fas fa-chevron-right"></i>
            <?php endif; ?>
        </div>
        <div class="submenu">
            <a href=" <?php echo e(route('users.index')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-list text-white"></i>
                    <span><?php echo e(__('dashboard.users_list', ['fallback' => 'Users List'])); ?></span>
                </div>
            </a>
            <a href="<?php echo e(route('roles.index')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-user-shield text-info"></i>
                    <span><?php echo e(__('dashboard.roles', ['fallback' => 'Roles'])); ?></span>
                </div>
            </a>
            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-key text-warning"></i>
                    <span><?php echo e(__('dashboard.permissions', ['fallback' => 'Permissions'])); ?></span>
                </div>
            </a>
            <!-- User Profile Link -->
            <a href="<?php echo e(route('user.profile.edit')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-user-edit text-primary"></i>
                    <span><?php echo e(__('dashboard.edit_profile', ['fallback' => 'Edit Profile'])); ?></span>
                </div>
            </a>
            <a href="<?php echo e(route('users.trashed')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-trash-restore text-danger"></i>
                    <span><?php echo e(__('dashboard.deleted_users', ['fallback' => 'Deleted Users'])); ?></span>
                    <span
                        class="nav-badge badge text-bg-danger me-3"><?php echo e(App\Models\User::onlyTrashed()->count()); ?></span>
                </div>
            </a>
        </div>

        
        <!-- Settings -->
        <div class="menu-item has-submenu">
            <div class="menu-item-left">
                <i class="fas fa-cogs text-secondary"></i>
                <span><?php echo e(__('dashboard.settings', ['fallback' => 'Settings'])); ?></span>
            </div>
            <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                <i class="fas fa-chevron-left"></i>
            <?php else: ?>
                <i class="fas fa-chevron-right"></i>
            <?php endif; ?>
        </div>
        <div class="submenu">
            <a href="<?php echo e(route('settings.index')); ?>" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-cog text-secondary"></i>
                    <span><?php echo e(__('dashboard.general_settings', ['fallback' => 'General Settings'])); ?></span>
                </div>
            </a>
        </div>


        
        <br>


    </nav>
</aside>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy_lastupdate\Alqadsy\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>