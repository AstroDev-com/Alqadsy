<style>
    /* المتغيرات الأساسية */
    :root {
        /* الألوان الرئيسية */
        --primary: #7c4dff;
        --primary-light: #b47cff;
        --primary-dark: #651fff;

        /* الألوان الثانوية */
        --secondary: #40c4ff;
        --success: #69f0ae;
        --warning: #ffd740;
        --danger: #ff5252;

        /* الألوان المحايدة */
        --light: #fafafa;
        /* --dark: #424242; */
        --gray: #e0e0e0;

        /* الظلال */
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.08);

        /* الزوايا */
        --radius-sm: 8px;
        --radius-md: 15px;
        --radius-lg: 20px;

        /* التباعد */
        --spacing-sm: 0.5rem;
        --spacing-md: 1rem;
        --spacing-lg: 1.5rem;
    }

    /* Dark Mode Variables */
    [data-theme="dark"] {
        --light: #1a1a1a;
        --dark: #e0e0e0;
        --gray: #2d2d2d;

        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.2);
        --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* التنسيقات الأساسية */
    body {
        font-family: 'Cairo', sans-serif;
        background-color: var(--light);
        color: var(--dark);
        line-height: 1.5;
    }

    /* تنسيقات النصوص */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: var(--spacing-md);
    }

    p,
    span,
    div {
        color: var(--dark);
    }

    /* تنسيقات البطاقات */
    .card {
        background: var(--light);
        border: none;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .card-header {
        background: var(--light);
        color: var(--dark);
        border-radius: var(--radius-md) var(--radius-md) 0 0 !important;
        padding: var(--spacing-md);
        border-bottom: 1px solid var(--gray);
        position: relative;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        z-index: 0;
        pointer-events: none;
    }

    .card-header>* {
        position: relative;
        z-index: 1;
    }

    .card-body {
        padding: var(--spacing-lg);
        color: var(--dark);
    }

    /* تنسيقات الأزرار */
    /* .btn {
        border-radius: var(--radius-sm);
        padding: var(--spacing-sm) var(--spacing-md);
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        color: #fff;
        box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
        background: linear-gradient(145deg, var(--primary-dark), var(--primary));
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-success {
        background: linear-gradient(145deg, var(--success), #13855c);
        color: #fff;
        box-shadow: var(--shadow-sm);
    }

    .btn-success:hover {
        background: linear-gradient(145deg, #13855c, var(--success));
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-warning {
        background: linear-gradient(145deg, var(--warning), #dda20a);
        color: #fff;
        box-shadow: var(--shadow-sm);
    }

    .btn-warning:hover {
        background: linear-gradient(145deg, #dda20a, var(--warning));
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-danger {
        background: linear-gradient(145deg, var(--danger), #b02a37);
        color: #fff;
        box-shadow: var(--shadow-sm);
    }

    .btn-danger:hover {
        background: linear-gradient(145deg, #b02a37, var(--danger));
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    } */

    /* أزرار الإجراءات */
    .actions-group {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-action {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .btn-action:hover::before {
        transform: translateX(0);
    }

    .btn-view {
        background: linear-gradient(135deg, #17a2b8, #20c997);
        text-decoration: none;
    }

    .btn-edit {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #ff3547);
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
    }


    /* تنسيقات المجموعات */
    .btn-group {
        gap: var(--spacing-sm);
    }

    .d-flex.gap-2 {
        gap: var(--spacing-sm);
    }

    /* تنسيقات الأيقونات داخل الأزرار */
    .btn i,
    .btn-action i {
        font-size: 1rem;
    }





    /* تنسيقات التنبيهات */
    .alert {
        background-color: var(--light);
        border: 1px solid var(--gray);
        border-radius: var(--radius-md);
        padding: var(--spacing-md);
    }

    .alert-success {
        background: linear-gradient(145deg, var(--success), #13855c);
    }

    .alert-danger {
        background: linear-gradient(145deg, var(--danger), #b02a37);
    }

    .alert-warning {
        background: linear-gradient(145deg, var(--warning), #dda20a);
    }

    .alert-info {
        background: linear-gradient(145deg, var(--secondary), #4a6b85);
    }

    /* تنسيقات النماذج */
    .form-control {
        background-color: var(--light);
        border: 1px solid var(--gray);
        border-radius: var(--radius-sm);
        padding: var(--spacing-sm) var(--spacing-md);
        color: var(--dark);
    }

    .form-control:focus {
        background-color: var(--light);
        border-color: var(--primary);
        color: var(--dark);
    }

    .form-label {
        color: var(--dark);
        font-weight: 500;
        margin-bottom: var(--spacing-sm);
    }

    /* تنسيقات القوائم */
    .dropdown-menu {
        background-color: var(--light);
        border: 1px solid var(--gray);
        border-radius: var(--radius-md);
        padding: var(--spacing-sm);
    }

    .dropdown-item {
        color: var(--dark);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-sm);
    }

    .dropdown-item:hover {
        background-color: var(--gray);
        color: var(--primary);
    }

    /* تنسيقات إضافية */
    .badge {
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-sm);
        font-weight: 500;
    }

    .nav-link {
        color: var(--dark);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-sm);
    }

    .nav-link:hover {
        color: var(--primary);
        background-color: var(--light);
    }

    .pagination {
        margin-top: var(--spacing-md);
    }

    .page-link {
        background-color: var(--light);
        border-color: var(--gray);
        color: var(--dark);
    }

    .page-link:hover {
        background-color: var(--gray);
        color: var(--dark);
    }

    .page-item.active .page-link {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
    }

    /* تنسيقات خاصة بالصور */
    .product-thumbnail {
        width: 35px;
        height: 35px;
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-sm);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }

    .product-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .no-image i {
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .table> :not(caption)>*>* {
            padding: var(--spacing-sm);
        }

        .table tbody tr {
            height: 45px;
        }
    }


    /* تنسيقات الأيقونة */
    .icon-wrapper {
        width: 50px;
        height: 50px;
        background: var(--gray);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    .icon-wrapper i {
        font-size: 1.5rem;
        color: white;
        animation: float 3s ease-in-out infinite;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* تنسيقات الجداول */
    .table {
        color: var(--dark);
    }

    .table td,
    .table th {
        border-color: var(--gray);
    }

    /* تنسيقات الإشعارات */
    .notification-item {
        background-color: var(--light);
        border-color: var(--gray);
    }

    .notification-item.unread {
        background-color: var(--gray);
        border-left: 4px solid var(--primary);
    }

    .notification-icon {
        background-color: var(--gray);
        color: var(--dark);
    }

    /* تنسيقات الأزرار */
    .btn-outline-secondary {
        color: var(--dark);
        border-color: var(--gray);
    }

    .btn-outline-secondary:hover {
        background-color: var(--gray);
        color: var(--dark);
    }
</style>
