<div class="nav-buttons-container text-center p-4">
    <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?php echo e(route('roles.index')); ?>" class="nav-button role-btn">
            <i class="bi bi-shield-lock me-2"></i>
            <span>إدارة الأدوار</span>
        </a>

        <a href="<?php echo e(route('permissions.index')); ?>" class="nav-button permission-btn">
            <i class="bi bi-key me-2"></i>
            <span>التحكم بالصلاحيات</span>
        </a>

        <a href="<?php echo e(route('users.index')); ?>" class="nav-button user-btn">
            <i class="bi bi-people me-2"></i>
            <span>المستخدمين</span>
        </a>
    </div>
</div>

<style>
    .nav-button {
        padding: 1.2rem 2rem;
        border-radius: 15px;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: none;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
    }

    .nav-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg,
                rgba(255, 255, 255, 0.15),
                rgba(255, 255, 255, 0.05));
        z-index: 1;
        transition: 0.3s;
    }

    .nav-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .nav-button:active {
        transform: translateY(1px);
    }

    /* تخصيص ألوان لكل زر */
    .role-btn {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
        color: white !important;
    }

    .permission-btn {
        background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
        color: white !important;
    }

    .user-btn {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        color: white !important;
    }

    /* تأثير عند المرور */
    .nav-button:hover::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent);
        transform: rotate(45deg);
        animation: shine 1.5s infinite;
    }

    @keyframes shine {
        0% {
            left: -50%;
        }

        100% {
            left: 150%;
        }
    }

    @media (max-width: 768px) {
        .nav-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy_lastupdate\Alqadsy\resources\views/admin/role-permission/nav-links.blade.php ENDPATH**/ ?>