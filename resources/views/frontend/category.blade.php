@extends('frontend.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center">{{ $category->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="lightgallery">
                @if($products->isEmpty())
                    <div class="col-12 text-center">
                        <p>لا توجد منتجات في هذا التصنيف حالياً.</p>
                    </div>
                @else
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ asset($product->image ? $product->image : 'admin/assets/img/product_default.png') }}" data-sub-html="<h4>{{ $product->name }}</h4>">
                            <a href="{{ route('frontend.product.show', $product->id) }}">
                                <img src="{{ asset($product->image ? $product->image : 'admin/assets/img/product_default.png') }}" alt="{{ $product->name }}" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
