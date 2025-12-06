<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // تفعيل القوائم المنسدلة
    document.querySelectorAll('.menu-item.has-submenu').forEach(item => {
        item.addEventListener('click', function() {
            // إغلاق كل القوائم المنسدلة الأخرى
            document.querySelectorAll('.menu-item.has-submenu').forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.nextElementSibling.classList.remove('show');
                }
            });

            // تبديل حالة القائمة الحالية
            this.classList.toggle('active');
            this.nextElementSibling.classList.toggle('show');
        });
    });

    // تفعيل زر القائمة للشاشات الصغيرة
    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
        document.querySelector('.sidebar').classList.toggle('active');
    });

    // تحديد القائمة النشطة
    const currentPath = window.location.pathname;
    document.querySelectorAll('.sidebar a.menu-item').forEach(item => {
        if (item.getAttribute('href') === currentPath) {
            item.classList.add('active');
            const parentSubmenu = item.closest('.submenu');
            if (parentSubmenu) {
                parentSubmenu.classList.add('show');
                parentSubmenu.previousElementSibling.classList.add('active');
            }
        }
    });

    // تفعيل زر إخفاء/إظهار السايدبار
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const mainHeader = document.querySelector('.main-header');
    const mainContent = document.querySelector('.main-content');
    const mobileOverlay = document.getElementById('mobileOverlay');

    function toggleSidebar() {
        const isMobile = window.innerWidth < 992;

        if (isMobile) {
            sidebar.classList.toggle('active');
            mobileOverlay.classList.toggle('show');
        } else {
            sidebar.classList.toggle('collapsed');
            mainHeader.classList.toggle('expanded');
            mainContent.classList.toggle('expanded');

            // تغيير أيقونة الزر
            const icon = sidebarToggle.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-bars-staggered');
            } else {
                icon.classList.remove('fa-bars-staggered');
                icon.classList.add('fa-bars');
            }
        }
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    mobileOverlay.addEventListener('click', () => {
        if (window.innerWidth < 992) {
            sidebar.classList.remove('active');
            mobileOverlay.classList.remove('show');
        }
    });

    // حفظ حالة السايدبار في localStorage
    function saveSidebarState() {
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
    }

    // استرجاع حالة السايدبار عند تحميل الصفحة
    function loadSidebarState() {
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed && window.innerWidth >= 992) {
            toggleSidebar();
        }
    }

    sidebarToggle.addEventListener('click', saveSidebarState);
    window.addEventListener('load', loadSidebarState);

    // معالجة تغيير حجم النافذة
    let timeout;
    window.addEventListener('resize', () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const isMobile = window.innerWidth < 992;
            if (isMobile) {
                sidebar.classList.remove('collapsed');
                mainHeader.classList.remove('expanded');
                mainContent.classList.remove('expanded');
            } else {
                mobileOverlay.classList.remove('show');
                sidebar.classList.remove('active');
            }
        }, 250);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // تفعيل collapse مع Bootstrap
        const submenus = document.querySelectorAll('.submenu');
        submenus.forEach(submenu => {
            submenu.addEventListener('show.bs.collapse', function() {
                this.previousElementSibling.classList.add('active');
                this.previousElementSibling.querySelector('.fa-chevron-left').style.transform =
                    'rotate(90deg)';
            });

            submenu.addEventListener('hide.bs.collapse', function() {
                this.previousElementSibling.classList.remove('active');
                this.previousElementSibling.querySelector('.fa-chevron-left').style.transform =
                    '';
            });
        });

        // تفعيل زر القائمة للشاشات الصغيرة
        document.querySelector('.menu-toggle')?.addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('active');
        });

    });
</script>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy\resources\views/admin/includes/scripts.blade.php ENDPATH**/ ?>