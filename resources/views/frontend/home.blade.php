@extends('frontend.layouts.app')
@section('content')
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
