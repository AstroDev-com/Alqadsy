@extends('admin.layouts.master')

@section('content')
    <style>
        .product-img {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: transform 0.2s;
        }

        .product-img:hover {
            transform: scale(1.08);
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: bold;
            vertical-align: middle;
        }

        .action-btns .btn {
            margin-left: 3px;
            margin-right: 3px;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .search-bar {
            max-width: 300px;
            border-radius: 25px;
            padding-right: 35px;
            background: #f8f9fa;
        }

        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f7ef;
            transition: background 0.2s;
        }

        .badge-status {
            font-size: 1em;
            border-radius: 12px;
            letter-spacing: 1px;
        }

        .badge-active {
            background: linear-gradient(90deg, #28a745 60%, #218838 100%);
            color: #fff;
        }

        .badge-inactive {
            background: linear-gradient(90deg, #dc3545 60%, #b21f2d 100%);
            color: #fff;
        }

        .no-results {
            text-align: center;
            color: #888;
            font-size: 1.1em;
            padding: 30px 0;
        }

        @media (max-width: 768px) {
            .table-responsive {
                padding: 0;
            }

            .card {
                padding: 0.5rem;
            }

            .search-bar {
                width: 100%;
            }
        }
    </style>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h1 class="fw-bold mb-2"  style="font-size:2rem;">{{ __('dashboard.products') }}</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success shadow mb-2" data-bs-toggle="tooltip"
                title="{{ __('dashboard.create_product') }}">
                <i class="fa fa-plus"></i> {{ __('dashboard.create_product') }}
            </a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" id="productSearch" class="form-control search-bar"
                placeholder="🔍 ابحث عن منتج بالاسم أو الوصف...">
        </div>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0" id="productsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dashboard.name') }}</th>
                            <th>{{ __('dashboard.description') }}</th>
                            <th>{{ __('dashboard.image') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.category') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>
                                    <img src="{{ asset($product->image ?? 'admin/assets/img/product_default.png') }}"
                                        alt="{{ $product->name }}" width="60"
                                        class="rounded-circle border product-img">
                                </td>
                                <td>
                                    @if ($product->status == 1)
                                        <span
                                            class="badge badge-status badge-active px-3 py-2">{{ __('dashboard.active') }}</span>
                                    @else
                                        <span
                                            class="badge badge-status badge-inactive px-3 py-2">{{ __('dashboard.inactive') }}</span>
                                    @endif
                                </td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td class="action-btns">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm"
                                        data-bs-toggle="tooltip" title="{{ __('dashboard.view') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        title="{{ __('dashboard.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                            title="{{ __('dashboard.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="noResults" class="no-results" style="display:none;">لا توجد نتائج مطابقة.</div>
            </div>
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
    <script>
        // تفعيل البحث الديناميكي
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('productSearch');
            const table = document.getElementById('productsTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const noResults = document.getElementById('noResults');

            searchInput.addEventListener('keyup', function() {
                let filter = searchInput.value.toLowerCase();
                let visibleCount = 0;
                for (let i = 0; i < rows.length; i++) {
                    let name = rows[i].cells[1].textContent.toLowerCase();
                    let desc = rows[i].cells[2].textContent.toLowerCase();
                    if (name.includes(filter) || desc.includes(filter)) {
                        rows[i].style.display = '';
                        visibleCount++;
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
                noResults.style.display = visibleCount === 0 ? '' : 'none';
            });

            // تفعيل Tooltip للأزرار (Bootstrap 5)
            if (window.bootstrap) {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }
        });
    </script>
@endsection
