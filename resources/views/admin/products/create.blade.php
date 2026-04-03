@extends('admin.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-3" dir="rtl">
        <div class="card shadow w-100" style="max-width: 600px;">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">{{ __('dashboard.create_product') }}</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- الحقول التالية يتم توليدها تلقائياً --}}
                    <input type="hidden" name="name" value="auto">
                    <input type="hidden" name="description" value="auto">
                    <div class="form-group mb-3">
                        <label for="images">{{ __('dashboard.product_images') }}</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <div class="form-group mb-4">
                        <label for="category_id">{{ __('dashboard.category') }}</label>
                        <select name="category_id" class="form-control" required>
                            <option value="" disabled selected>-- اختر القسم --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-plus"></i> {{ __('dashboard.create_product') }}
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-right"></i> {{ __('dashboard.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
