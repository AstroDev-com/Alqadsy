@include('admin.includes.style')
<!DOCTYPE html>
<html dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}" lang="{{ app()->getLocale() }}"
    data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'لوحة التحكم')</title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('admin/css/rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('admin/css/ltr.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --card-bg: #ffffff;
            --card-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05),
                -5px -5px 10px rgba(255, 255, 255, 0.8);
            --card-hover-shadow: 7px 7px 15px rgba(0, 0, 0, 0.08),
                -7px -7px 15px rgba(255, 255, 255, 0.9);
            --sidebar-bg: #2c3e50;
            --sidebar-hover-bg: rgba(255, 255, 255, 0.1);
            --sidebar-text: #ffffff;
            --sidebar-icon: #ffffff;
            --sidebar-border: rgba(255, 255, 255, 0.1);
            --header-bg: #ffffff;
            --border-color: #e2e8f0;
        }

        [data-theme="dark"] {
            --bg-color: #1a1a1a;
            --text-color: #ffffff;
            --card-bg: #2d2d2d;
            --card-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2),
                -5px -5px 10px rgba(45, 45, 45, 0.8);
            --card-hover-shadow: 7px 7px 15px rgba(0, 0, 0, 0.3),
                -7px -7px 15px rgba(45, 45, 45, 0.9);
            --sidebar-bg: #1a1a1a;
            --sidebar-hover-bg: rgba(255, 255, 255, 0.05);
            --sidebar-text: #ffffff;
            --sidebar-icon: #ffffff;
            --sidebar-border: rgba(255, 255, 255, 0.05);
            --header-bg: #2d2d2d;
            --border-color: #404040;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .main-content {
            background-color: var(--bg-color);
        }

        .card {
            background-color: var(--card-bg);
            border-color: var(--border-color);
        }

        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            background: var(--card-bg);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            box-shadow: var(--card-shadow);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            box-shadow: var(--card-hover-shadow);
        }

        .theme-toggle i {
            font-size: 1.2rem;
        }

        /* Dark mode styles for other elements */
        [data-theme="dark"] .navbar {
            background-color: var(--header-bg);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .sidebar {
            background-color: var(--sidebar-bg);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .table {
            color: var(--text-color);
        }

        [data-theme="dark"] .form-control {
            background-color: var(--card-bg);
            border-color: var(--border-color);
            color: var(--text-color);
        }

        [data-theme="dark"] .form-control:focus {
            background-color: var(--card-bg);
            color: var(--text-color);
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        /* Force hide vertical scrollbar for the entire page */
        body {
            overflow-x: hidden;
        }
    </style>
    @stack('styles')
</head>

<body>
    @php
        use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
        use Illuminate\Support\Facades\Auth;
        $isRTL = LaravelLocalization::getCurrentLocale() == 'ar';
        $unreadConversationsCountForLayout = 0;
        $unreadNotificationsCountForLayout = 0;
        $unreadNotificationsForLayout = collect();
        $currentUserForLayout = Auth::user();
        if ($currentUserForLayout) {
            try {
                $unreadNotificationsForLayout = $currentUserForLayout->unreadNotifications;
                $unreadNotificationsCountForLayout = $unreadNotificationsForLayout->count();
            } catch (\Exception $e) {
                logger('Error calculating notifications in layout', ['error' => $e->getMessage()]);
            }
            try {
                $unreadConversationsCountForLayout = $currentUserForLayout
                    ->conversations()
                    ->where(function ($query) {
                        $query
                            ->whereNull('conversation_participants.read_at')
                            ->orWhereColumn('conversations.updated_at', '>', 'conversation_participants.read_at');
                    })
                    ->count();
            } catch (\Exception $e) {
                logger('Error calculating unread convos in layout', ['error' => $e->getMessage()]);
                $unreadConversationsCountForLayout = 0;
            }
        }
    @endphp

    @include('admin.includes.sidebar')

    <!-- Header -->
    @include('admin.includes.header')

    <!-- Theme Toggle Button -->
    <button type="button" class="theme-toggle" id="themeToggle" title="تبديل الوضع">
        <i class="fas fa-moon"></i>
    </button>

    <!-- Main Content -->
    <main class="main-content">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.error')

        @yield('content')
    </main>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    {{-- Include Moment.js locale if needed, e.g., for Arabic --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ar.js"></script>
    <script>
        // Set Moment.js locale based on app locale
        moment.locale('{{ app()->getLocale() }}');

        // Theme Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const icon = themeToggle.querySelector('i');
            const html = document.documentElement;

            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'light';
            html.setAttribute('data-theme', savedTheme);
            updateIcon(savedTheme);

            themeToggle.addEventListener('click', () => {
                const currentTheme = html.getAttribute('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';

                html.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);

                // Send theme preference to server
                fetch('{{ route('theme.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        theme: newTheme
                    })
                });
            });

            function updateIcon(theme) {
                icon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
            }
        });
    </script>
    @include('admin.includes.scripts')
    @stack('scripts')
    <script src="{{ asset('admin/select2/js/select2.full.min.js') }}"></script>

</body>

</html>
