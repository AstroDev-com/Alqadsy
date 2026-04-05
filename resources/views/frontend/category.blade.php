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
            <div class="dense-gallery" id="lightgallery">
                @forelse($products as $product)
                    <div class="item" data-aos="fade" data-src="{{ asset($product->image ? $product->image : 'admin/assets/img/product_default.png') }}" data-sub-html="<h4>{{ $product->name }}</h4>">
                        <a href="{{ route('frontend.product.show', $product->id) }}">
                            <img src="{{ asset($product->image ? $product->image : 'admin/assets/img/product_default.png') }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-fluid" 
                                 loading="lazy">
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>لا توجد منتجات في هذا التصنيف حالياً.</p>
                    </div>
                @endforelse
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
