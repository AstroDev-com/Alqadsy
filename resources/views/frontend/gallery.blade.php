@extends('frontend.layouts.app')
@section('content')
    @push('styles')
    <style>
        /* ضمان عرض الشرائح في الوسط مع التحجيم المناسب */
        .lg-outer.lg-slide .lg-item {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer.lg-slide .lg-item .lg-img-wrap {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
            text-align: center !important;
            padding: 0 !important;
        }
        
        .lg-outer.lg-slide .lg-image,
        .lg-outer.lg-slide .lg-object {
            max-width: 90vw !important;
            max-height: 90vh !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain !important;
            margin: auto !important;
            display: block !important;
            position: relative !important;
            left: auto !important;
            right: auto !important;
        }
        
        /* توسيط جميع الصور في المعرض */
        .lg-outer .lg-item {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer .lg-img-wrap {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        
        .lg-outer .lg-image,
        .lg-outer .lg-object {
            margin: auto !important;
            display: block !important;
        }
        
        /* توسيط الصور في lg-inner عند فتحها مباشرة عبر hash */
        .lg-outer.lg-slide .lg-inner {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        .lg-outer.lg-slide .lg {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
    </style>
    @endpush

    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row" id="lightgallery">
            @forelse ($products as $info)
                @php
                    $imageUrl = $info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png');
                @endphp
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ $imageUrl }}" data-sub-html="<h4>{{ $info->name }}</h4>@if (!empty($info->description))<p>{{ Str::limit($info->description, 80) }}</p>@endif">
                    <a href="{{ $imageUrl }}"><img src="{{ $imageUrl }}" alt="{{ $info->name }}" class="img-fluid"></a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">لا توجد منتجات لعرضها حالياً.</div>
                </div>
            @endforelse
        </div>

    </div>
@endsection


