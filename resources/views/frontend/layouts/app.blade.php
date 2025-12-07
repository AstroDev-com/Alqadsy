<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @php
        $siteName = \App\Models\Setting::get('site_name', 'ورشة القدسي');
        $siteDescription = \App\Models\Setting::get('site_description', 'ورشة القدسي - ورشة عبدالحكيم القدسي - القدسي للحديد - أفضل ورشة للحديد والأعمال المعدنية');
        $metaDescription = \App\Models\Setting::get('meta_description', 'ورشة القدسي | ورشة عبدالحكيم القدسي | القدسي للحديد | أفضل ورشة للحديد والأعمال المعدنية في المنطقة');
        $metaKeywords = \App\Models\Setting::get('meta_keywords', 'ورشة القدسي، ورشة عبدالحكيم القدسي، القدسي للحديد، القدسي، ورشة حديد، أعمال معدنية، حدادة');
        $currentUrl = url()->current();
        $siteLogo = \App\Models\Setting::get('site_logo') ? asset('storage/settings/' . \App\Models\Setting::get('site_logo')) : asset('frontend/images/logo.png');

        // Build social media URLs array for Schema.org
        $socialUrls = [];
        $facebookUrl = \App\Models\Setting::get('facebook_url', '');
        $instagramUrl = \App\Models\Setting::get('instagram_url', '');
        $twitterUrl = \App\Models\Setting::get('twitter_url', '');

        if ($facebookUrl && $facebookUrl != 'https://facebook.com') {
            $socialUrls[] = $facebookUrl;
        }
        if ($instagramUrl && $instagramUrl != 'https://instagram.com') {
            $socialUrls[] = $instagramUrl;
        }
        if ($twitterUrl && $twitterUrl != 'https://twitter.com') {
            $socialUrls[] = $twitterUrl;
        }
    @endphp

    <title>ورشة القدسي | ورشة عبدالحكيم القدسي | القدسي للحديد | القدسي</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Primary Meta Tags -->
    <meta name="title" content="ورشة القدسي | ورشة عبدالحكيم القدسي | القدسي للحديد">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}, ورشة القدسي, ورشة عبدالحكيم القدسي, القدسي للحديد, القدسي">
    <meta name="author" content="ورشة القدسي">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Arabic">
    <meta name="revisit-after" content="7 days">
    <meta name="geo.region" content="PS">
    <meta name="geo.placename" content="Palestine">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="ورشة القدسي | ورشة عبدالحكيم القدسي | القدسي للحديد">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $siteLogo }}">
    <meta property="og:locale" content="ar_AR">
    <meta property="og:site_name" content="{{ $siteName }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="ورشة القدسي | ورشة عبدالحكيم القدسي | القدسي للحديد">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $siteLogo }}">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#000000">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/lightgallery.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/gallery-fix.css') }}">

    <!-- Schema.org Structured Data for LocalBusiness -->
    <script type="application/ld+json">
    @php
        $localBusinessSchema = [
            "@context" => "https://schema.org",
            "@type" => "LocalBusiness",
            "name" => "ورشة القدسي",
            "alternateName" => ["ورشة عبدالحكيم القدسي", "القدسي للحديد", "القدسي"],
            "description" => $metaDescription,
            "url" => $currentUrl,
            "logo" => $siteLogo,
            "image" => $siteLogo,
            "address" => [
                "@type" => "PostalAddress",
                "addressCountry" => "PS",
                "addressLocality" => "Palestine"
            ],
            "priceRange" => "$$",
            "openingHours" => "Mo-Su",
            "keywords" => "ورشة القدسي، ورشة عبدالحكيم القدسي، القدسي للحديد، القدسي، ورشة حديد، أعمال معدنية، حدادة",
            "areaServed" => [
                "@type" => "Country",
                "name" => "Palestine"
            ]
        ];

        if (\App\Models\Setting::get('contact_phone', '')) {
            $localBusinessSchema["telephone"] = \App\Models\Setting::get('contact_phone', '');
        }

        if (\App\Models\Setting::get('contact_email', '')) {
            $localBusinessSchema["email"] = \App\Models\Setting::get('contact_email', '');
        }

        if (!empty($socialUrls)) {
            $localBusinessSchema["sameAs"] = $socialUrls;
        }
    @endphp
    {!! json_encode($localBusinessSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Organization Schema -->
    <script type="application/ld+json">
    @php
        $organizationSchema = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "ورشة القدسي",
            "alternateName" => ["ورشة عبدالحكيم القدسي", "القدسي للحديد", "القدسي"],
            "url" => $currentUrl,
            "logo" => $siteLogo
        ];

        $contactPoint = [];
        if (\App\Models\Setting::get('contact_phone', '')) {
            $contactPoint["telephone"] = \App\Models\Setting::get('contact_phone', '');
        }
        if (\App\Models\Setting::get('contact_email', '')) {
            $contactPoint["email"] = \App\Models\Setting::get('contact_email', '');
        }
        if (!empty($contactPoint)) {
            $contactPoint["@type"] = "ContactPoint";
            $contactPoint["contactType"] = "customer service";
            $organizationSchema["contactPoint"] = $contactPoint;
        }

        if (!empty($socialUrls)) {
            $organizationSchema["sameAs"] = $socialUrls;
        }
    @endphp
    {!! json_encode($organizationSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

</head>

<body style="font-family: cairo; min-height: 100vh; display: flex; flex-direction: column;">
    <div class="site-wrap" style="flex: 1 0 auto; display: flex; flex-direction: column; min-height: 100vh;">
        <div class="site-mobile-menu bg-black text-black">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body text-white bg-black"></div>
        </div>

        @include('frontend.layouts.header')

        <div class="main-content" style="flex: 1 0 auto;">
            <div class="container-fluid" data-aos="fade" data-aos-delay="500">
                @yield('content')
            </div>
        </div>

    </div>

    @include('frontend.layouts.footer')


    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/picturefill.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.mousewheel.min.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
<<<<<<< Updated upstream
            $('#lightgallery').lightGallery();
=======
            $('#lightgallery').lightGallery({
                selector: 'a',
                mode: 'lg-slide',
                speed: 400,
                enableSwipe: true,
                enableDrag: true,
                hideBarsDelay: 6000,
                thumbnail: true,
                showThumbByDefault: true,
                zoom: false,
                actualSize: false,
                showAfterLoad: true,
                loop: true,
                closable: true,
                escKey: true,
                keyPress: true,
                controls: true
            });
>>>>>>> Stashed changes
        });
    </script>


</body>

</html>
