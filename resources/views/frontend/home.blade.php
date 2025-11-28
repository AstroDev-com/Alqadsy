@extends('frontend.layouts.app')
@section('content')
    <!-- SEO-Friendly Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">ورشة القدسي | ورشة عبد الحكيم القدسي | القدسي للحديد</h1>
            <p class="lead">مرحباً بكم في <strong>ورشة القدسي</strong> - <strong>ورشة عبد الحكيم القدسي</strong> - <strong>القدسي للحديد</strong>. نحن متخصصون في جميع أعمال الحديد والأعمال المعدنية بأعلى جودة وأفضل الأسعار.</p>
            <p>تأسست <strong>ورشة القدسي</strong> لتقديم أفضل الخدمات في مجال الحدادة والأعمال المعدنية. <strong>القدسي للحديد</strong> هو اسم موثوق في الصناعة، ونحن في <strong>ورشة عبد الحكيم القدسي</strong> نضمن لكم الجودة والتميز في كل مشروع.</p>
        </div>
    </div>

    <div class="row">

        @foreach ($categories as $info)
            <div class="col-lg-4">
                <div class="image-wrap-2">
                    <div class="image-info">
                        <h2 class="mb-3">{{ $info->name }}</h2>
                        <a href="{{ route('frontend.category.products', $info->id) }}">عرض المزيد</a>
                    </div>
                    <img src="{{ asset($info->image) }}" alt="Image" class="img-fluid">
                </div>
            </div>
        @endforeach
    @endsection
