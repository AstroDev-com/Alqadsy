@extends('frontend.layouts.app')
@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row" id="lightgallery">
            @forelse ($products as $info)
                @php
                    $imageUrl = $info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png');
                @endphp
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade">
                    <a href="{{ $imageUrl }}" data-sub-html="<h4>{{ $info->name }}</h4>@if (!empty($info->description))<p>{{ Str::limit($info->description, 80) }}</p>@endif">
                        <img src="{{ $imageUrl }}" alt="{{ $info->name }}" class="img-fluid">
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">لا توجد منتجات لعرضها حالياً.</div>
                </div>
            @endforelse
        </div>

    </div>
@endsection


