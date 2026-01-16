<aside class="sidebar no-print" style="color:light;">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="logo-container">
            <img src="{{ asset('frontend/images/Alqadsy.png') }}" alt="Logo">
        </a>
    </div>
    <nav class="sidebar-menu">
        <a href="{{ route('dashboard') }}" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>{{ __('dashboard.home', ['fallback' => 'Dashboard']) }}</span>
            </div>
        </a>

          <a href="{{ route('admin.categories.index') }}" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>التصنيفات</span>
            </div>
        </a>

        <a href="{{ route('admin.products.index') }}" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>المنتجات</span>
            </div>
        </a>

          <a href="{{ route('home') }}" class="menu-item">
            <div class="menu-item-left">
                <i class="fas fa-home"></i>
                <span>المشروع</span>
            </div>
        </a>

        <!-- المستخدمين -->
        <div class="menu-item has-submenu">
            <div class="menu-item-left">
                <i class="fas fa-users text-white"></i>
                <span>{{ __('dashboard.users', ['fallback' => 'Users']) }}</span>
            </div>
            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                <i class="fas fa-chevron-left"></i>
            @else
                <i class="fas fa-chevron-right"></i>
            @endif
        </div>
        <div class="submenu">
            <a href=" {{ route('users.index') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-list text-white"></i>
                    <span>{{ __('dashboard.users_list', ['fallback' => 'Users List']) }}</span>
                </div>
            </a>
            <a href="{{ route('roles.index') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-user-shield text-info"></i>
                    <span>{{ __('dashboard.roles', ['fallback' => 'Roles']) }}</span>
                </div>
            </a>
            <a href="{{ route('permissions.index') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-key text-warning"></i>
                    <span>{{ __('dashboard.permissions', ['fallback' => 'Permissions']) }}</span>
                </div>
            </a>
            <!-- User Profile Link -->
            <a href="{{ route('user.profile.edit') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-user-edit text-primary"></i>
                    <span>{{ __('dashboard.edit_profile', ['fallback' => 'Edit Profile']) }}</span>
                </div>
            </a>
            <a href="{{ route('users.trashed') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-trash-restore text-danger"></i>
                    <span>{{ __('dashboard.deleted_users', ['fallback' => 'Deleted Users']) }}</span>
                    <span
                        class="nav-badge badge text-bg-danger me-3">{{ App\Models\User::onlyTrashed()->count() }}</span>
                </div>
            </a>
        </div>

        {{-- Activity Log (Kept for now, moved under Settings/System) --}}
        <!-- Settings -->
        <div class="menu-item has-submenu">
            <div class="menu-item-left">
                <i class="fas fa-cogs text-secondary"></i>
                <span>{{ __('dashboard.settings', ['fallback' => 'Settings']) }}</span>
            </div>
            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                <i class="fas fa-chevron-left"></i>
            @else
                <i class="fas fa-chevron-right"></i>
            @endif
        </div>
        <div class="submenu">
            <a href="{{ route('settings.index') }}" class="menu-item">
                <div class="menu-item-left">
                    <i class="fas fa-cog text-secondary"></i>
                    <span>{{ __('dashboard.general_settings', ['fallback' => 'General Settings']) }}</span>
                </div>
            </a>
        </div>


        {{-- الساعة الرقمية --}}
        <br>


    </nav>
</aside>
