<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ __('Login') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    {{-- Ensure Bootstrap CSS/JS are loaded via Vite or CDN --}}
    {{-- @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js']) --}}

    {{-- Or if using Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Include Font Awesome if needed for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom Styles for Gradient Background --}}
    <style>
        body {
            background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
            /* Light gradient */
            font-family: 'Cairo', sans-serif;
            /* Ensure Cairo font is applied */
        }

        .card {
            border: none;
            /* Remove default border if adding shadow */
            transition: box-shadow 0.3s ease-in-out;
            /* Smooth shadow transition */
        }

        .input-group-text {
            background-color: #f0f4f9;
            /* Light grey background like image */
            border: none;
            /* No border */
            border-top-right-radius: 0.375rem !important;
            /* Rounded corner on the right */
            border-bottom-right-radius: 0.375rem !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            padding: 0.75rem 1rem;
            /* Adjust padding to match input lg */
            color: #6c757d;
            /* Icon color */
        }

        .form-control {
            background-color: #f0f4f9;
            /* Light grey background like image */
            border: none;
            /* No border */
            border-top-left-radius: 0.375rem !important;
            /* Rounded corner on the left */
            border-bottom-left-radius: 0.375rem !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        /* Ensure input group looks cohesive */
        .input-group {
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            /* Subtle shadow for depth */
            transition: box-shadow 0.3s ease;
        }

        .input-group .form-control:focus {
            background-color: #e9eef4;
            /* Slightly darker on focus */
            position: relative;
            /* Ensure focus shadow is not clipped */
            z-index: 2;
            box-shadow: none;
            /* Remove default BS focus shadow */
            border: none;
        }

        /* Style the icon part when the input group is focused */
        .input-group:focus-within .input-group-text {
            background-color: #e9eef4;
            /* Slightly darker on focus */
            z-index: 2;
            border: none;
            box-shadow: none;
        }

        /* Enhance focus visibility on the whole group */
        .input-group:focus-within {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            /* Slightly larger shadow on focus */
        }

        .btn-primary {
            background-color: #0d6efd;
            /* Standard Bootstrap blue */
            border: none;
            transition: background-color 0.3s ease;
            border-radius: 0.375rem;
            /* Ensure button matches input rounding */
            padding: 0.75rem 1.5rem;
            /* Adjust padding for a bolder look */
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            /* Darker blue on hover */
        }

        .small a {
            color: #6c757d;
            /* Slightly darker grey for links */
            font-weight: 500;
            font-size: 0.85rem;
        }

        .small a:hover {
            color: #0d6efd;
            /* Blue on hover */
        }

        .form-check-label {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .card {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            /* Softer, larger shadow */
        }
    </style>

</head>

<body style="font-family: cairo;">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 my-5">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('frontend/images/Alqadsy.png') }}" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </div>

                <div class="card shadow rounded-3">
                    <div class="card-body pt-5 ps-5 pe-5 pb-4">

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('dashboard_control') }}">
                            @csrf

                            <h5 class="card-title text-center mb-4 fw-bold">{{ __('تسجيل الدخول') }}</h5>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <div class="input-group @error('email') has-validation @enderror">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        type="email" name="email" value="{{ old('email') }}" required autofocus
                                        autocomplete="username" placeholder="{{ __('Email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <div class="input-group @error('password') has-validation @enderror">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        type="password" name="password" required autocomplete="current-password"
                                        placeholder="{{ __('Password') }}" />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password Row -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if (Route::has('password.request'))
                                    <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('dashboard.Forgot your password?') }}
                                    </a>
                                @endif
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label for="remember_me" class="form-check-label small">
                                        {{ __('dashboard.Remember me') }}
                                    </label>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('تسجيل الدخول') }}
                                </button>
                            </div>

                        </form>

                        {{-- Social Login (Optional) --}}
                        {{-- You can place the social login buttons here if needed --}}

                    </div> {{-- End card-body --}}
                </div> {{-- End card --}}
            </div> {{-- End col --}}
        </div> {{-- End row --}}
    </div> {{-- End container --}}

    {{-- Include Bootstrap JS if needed (e.g., for dropdowns, modals) --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
