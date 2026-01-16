<aside class="sidebar no-print" style="color:light;">
    <div class="sidebar-brand">
        <a href="<?php echo e(route('dashboard')); ?>" class="logo-container">
            <img src="<?php echo e(asset('admin/logo.png')); ?>" alt="Logo">
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

        <div class="nav-item clock-container">
            <a href="#" class="nav-link d-flex align-items-center p-2 py-1">
                <i class="nav-icon bi bi-clock text-muted"></i>
                <div class="clock-content ms-2">
                    <div class="digital-clock">
                        <span class="time-part seconds text-info">00</span>
                        <span class="time-separator">:</span>
                        <span class="time-part minutes">00</span>
                        <span class="time-separator">:</span>
                        <span class="time-part hours">00</span>
                        <span class="ampm ms-1 text-warning">AM</span>
                    </div>
                    <div class="date-display mt-1"></div>
                </div>
            </a>
        </div>
        <?php $__env->startPush('scripts'); ?>
            <script>
                const arabicDays = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
                const arabicMonths = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر',
                    'نوفمبر', 'ديسمبر'
                ];
                const englishDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                const englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ];

                function updateClock() {
                    const now = new Date();
                    const isArabic = document.documentElement.lang === 'ar';

                    // تنسيق الوقت
                    let hours = now.getHours();
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12 || 12;

                    document.querySelector('.hours').textContent = hours.toString().padStart(2, '0');
                    document.querySelector('.minutes').textContent = now.getMinutes().toString().padStart(2, '0');
                    document.querySelector('.seconds').textContent = now.getSeconds().toString().padStart(2, '0');
                    document.querySelector('.ampm').textContent = ampm;

                    // تنسيق التاريخ
                    const day = isArabic ? arabicDays[now.getDay()] : englishDays[now.getDay()];
                    const month = isArabic ? arabicMonths[now.getMonth()] : englishMonths[now.getMonth()];
                    const dateString = isArabic ?
                        `${day}، ${now.getDate()} ${month} ${now.getFullYear()}` :
                        `${day}, ${now.getDate()} ${month} ${now.getFullYear()}`;

                    document.querySelector('.date-display').textContent = dateString;
                }

                // تحديث الساعة كل ثانية
                setInterval(updateClock, 1000);
                updateClock();
            </script>
        <?php $__env->stopPush(); ?>
        <style>
            .clock-container {
                margin: 2px 0;
                border-radius: 8px;
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.03) !important;
                padding: 8px;
            }

            .clock-container:hover {
                background: rgba(255, 255, 255, 0.1) !important;
            }

            .digital-clock {
                display: flex;
                align-items: center;
                font-family: 'Segoe UI', system-ui, sans-serif;
                color: #e0e0e0;
                gap: 2px;
            }

            .time-part {
                padding: 4px 10px;
                border-radius: 6px;
                font-size: 1.2rem;
                font-weight: 600;
                background: rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }

            .time-part:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: scale(1.05);
            }

            .time-separator {
                color: #8c9eff;
                font-size: 1.3rem;
                font-weight: 600;
                margin: 0 2px;
                animation: blink 1s infinite;
            }

            @keyframes blink {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.5;
                }
            }

            .ampm {
                font-size: 1rem;
                color: #8c9eff;
                letter-spacing: 0.5px;
                padding: 2px 8px;
                border-radius: 4px;
                background: rgba(140, 158, 255, 0.1);
            }

            .date-display {
                color: #b0b0b0;
                font-size: 0.9rem;
                letter-spacing: 0.3px;
                margin-top: 4px;
                text-align: center;
                background: rgba(255, 255, 255, 0.05);
                padding: 4px;
                border-radius: 4px;
            }

            /* تحسينات الساعة التناظرية */
            .analog-clock-container {
                padding: 20px;
                display: flex;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .analog-clock {
                width: 150px;
                height: 150px;
                background: linear-gradient(145deg, #2c3e50, #34495e);
                border-radius: 50%;
                position: relative;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3),
                    0 -15px 15px rgba(255, 255, 255, 0.05),
                    inset 0 -15px 15px rgba(255, 255, 255, 0.05),
                    inset 0 15px 15px rgba(0, 0, 0, 0.3);
                border: 4px solid #34495e;
                transition: transform 0.3s ease;
            }

            .analog-clock:hover {
                transform: scale(1.05) rotate(5deg);
            }

            .numbers span {
                color: #ecf0f1;
                font-size: 1.1rem;
                font-weight: 600;
                text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
            }

            .hand {
                transition: transform 0.2s cubic-bezier(0.4, 2.3, 0.3, 1);
            }

            .hour-hand {
                width: 5px;
                height: 35px;
                background: linear-gradient(to top, #ecf0f1, #bdc3c7);
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }

            .minute-hand {
                width: 4px;
                height: 45px;
                background: linear-gradient(to top, #bdc3c7, #95a5a6);
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }

            .second-hand {
                width: 2px;
                height: 50px;
                background: linear-gradient(to top, #e74c3c, #c0392b);
                box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
            }

            .center-circle {
                width: 10px;
                height: 10px;
                background: linear-gradient(145deg, #e74c3c, #c0392b);
                box-shadow: 0 0 10px rgba(231, 76, 60, 0.5);
            }

            .markings span {
                background: linear-gradient(to bottom, #7f8c8d, #95a5a6);
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
            }

            @media (max-width: 768px) {
                .time-part {
                    font-size: 1rem;
                    padding: 3px 8px;
                }

                .time-separator {
                    font-size: 1.1rem;
                }

                .ampm {
                    font-size: 0.9rem;
                }

                .date-display {
                    font-size: 0.8rem;
                }

                .analog-clock {
                    width: 120px;
                    height: 120px;
                }

                .numbers span {
                    font-size: 1rem;
                }

                .hour-hand {
                    height: 30px;
                }

                .minute-hand {
                    height: 40px;
                }

                .second-hand {
                    height: 45px;
                }
            }
        </style>
        <hr>

        

        <li class="nav-item analog-clock-container">
            <div class="analog-clock">
                <div class="clock-face">
                    <!-- الأرقام -->
                    <div class="numbers">
                        <span style="--i:1"><b>1</b></span>
                        <span style="--i:2"><b>2</b></span>
                        <span style="--i:3"><b>3</b></span>
                        <span style="--i:4"><b>4</b></span>
                        <span style="--i:5"><b>5</b></span>
                        <span style="--i:6"><b>6</b></span>
                        <span style="--i:7"><b>7</b></span>
                        <span style="--i:8"><b>8</b></span>
                        <span style="--i:9"><b>9</b></span>
                        <span style="--i:10"><b>10</b></span>
                        <span style="--i:11"><b>11</b></span>
                        <span style="--i:12"><b>12</b></span>
                    </div>

                    <!-- الخطوط الدقيقة -->
                    <div class="markings"></div>

                    <!-- العقارب -->
                    <div class="hand hour-hand"></div>
                    <div class="hand minute-hand"></div>
                    <div class="hand second-hand"></div>

                    <!-- المركز -->
                    <div class="center-circle"></div>
                </div>
            </div>
        </li>

        <style>
            .analog-clock-container {
                padding: 15px;
                display: flex;
                justify-content: center;
            }

            .analog-clock {
                width: 140px;
                height: 140px;
                background: #2c3e50;
                border-radius: 50%;
                position: relative;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2),
                    0 -15px 15px rgba(255, 255, 255, 0.05),
                    inset 0 -15px 15px rgba(255, 255, 255, 0.05),
                    inset 0 15px 15px rgba(0, 0, 0, 0.3);
                border: 3px solid #34495e;
                transition: transform 0.3s ease;
                overflow: hidden;
                /* إضافة مهمة */
            }

            .analog-clock:hover {
                transform: scale(1.05);
            }

            .clock-face {
                position: relative;
                width: 100%;
                height: 100%;
            }

            .numbers {
                position: absolute;
                width: 100%;
                height: 100%;
                font-family: 'Arial', sans-serif;
            }

            .numbers span {
                position: absolute;
                color: #ecf0f1;
                font-size: 1rem;
                font-weight: 500;
                text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
                transform: rotate(calc(var(--i) * 30deg));
                display: block;
                width: 100%;
                height: 100%;
                text-align: center;
            }

            .numbers span b {
                display: inline-block;
                transform: rotate(calc(-1 * var(--i) * 30deg));
                position: absolute;
                left: 50%;
                top: 12px;
                /* تعديل القيمة */
                transform: translateX(-50%) rotate(calc(-1 * var(--i) * 30deg));
            }

            .markings {
                position: absolute;
                width: 100%;
                height: 100%;
            }

            .markings span {
                position: absolute;
                width: 1px;
                height: 8px;
                background: #7f8c8d;
                left: 50%;
                transform-origin: bottom center;
                margin-left: -0.5px;
            }

            .hand {
                position: absolute;
                bottom: 50%;
                left: 50%;
                transform-origin: bottom;
                border-radius: 3px;
                z-index: 2;
            }

            .hour-hand {
                width: 4px;
                height: 30px;
                background: #ecf0f1;
                margin-left: -2px;
            }

            .minute-hand {
                width: 3px;
                height: 40px;
                background: #bdc3c7;
                margin-left: -1.5px;
            }

            .second-hand {
                width: 2px;
                height: 45px;
                background: #e74c3c;
                margin-left: -1px;
                transition: transform 0.2s cubic-bezier(0.4, 2.3, 0.3, 1);
            }

            .center-circle {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 8px;
                height: 8px;
                background: #e74c3c;
                border-radius: 50%;
                transform: translate(-50%, -50%);
                z-index: 3;
            }

            @media (max-width: 768px) {
                .analog-clock {
                    width: 100px;
                    height: 100px;
                }

                .numbers span {
                    font-size: 0.9rem;
                }

                .hour-hand {
                    height: 25px;
                }

                .minute-hand {
                    height: 35px;
                }

                .second-hand {
                    height: 40px;
                }

                .numbers span b {
                    top: 8px;
                    /* تعديل القيمة للشاشات الصغيرة */
                }
            }

            /* تعديلات CSS الإضافية */
            .markings span {
                position: absolute;
                width: 1px;
                height: 8px;
                background: #7f8c8d;
                left: 50%;
                transform-origin: bottom center;
                margin-left: -0.5px;
                bottom: 50%;
                /* إضافة لتحديد نقطة الارتكاز */
            }

            .analog-clock {
                overflow: hidden;
                /* التأكد من تفعيل هذا */
            }
        </style>
        <script>
            function updateAnalogClock() {
                const now = new Date();
                const hours = now.getHours() % 12;
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();

                const hourDeg = (hours * 30) + (minutes * 0.5);
                const minuteDeg = (minutes * 6) + (seconds * 0.1);
                const secondDeg = seconds * 6;

                document.querySelector('.hour-hand').style.transform = `rotate(${hourDeg}deg)`;
                document.querySelector('.minute-hand').style.transform = `rotate(${minuteDeg}deg)`;
                document.querySelector('.second-hand').style.transform = `rotate(${secondDeg}deg)`;
            }

            // إنشاء الخطوط الدقيقة مع التعديلات
            const markings = document.querySelector('.markings');
            const clock = document.querySelector('.analog-clock');
            const clockSize = clock.offsetWidth;
            const radius = clockSize / 2;
            const markLength = 8; // طول الخط الدقيق
            const innerRadius = radius - markLength - 4; // هامش 4px

            for (let i = 0; i < 60; i++) {
                const span = document.createElement('span');
                const rotation = i * 6;

                span.style.transform = `rotate(${rotation}deg) translateY(-${innerRadius}px)`;

                // إخفاء الخطوط تحت الأرقام الرئيسية
                if (i % 5 === 0) span.style.display = 'none';

                markings.appendChild(span);

                setInterval(updateAnalogClock, 1000);
                updateAnalogClock();
            }
        </script>
    </nav>
</aside>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy_lastupdate\Alqadsy\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>