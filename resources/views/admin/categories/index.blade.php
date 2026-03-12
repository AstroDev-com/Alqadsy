

@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">التصنيفات</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> إضافة تصنيف
            </a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" id="categorySearch" class="form-control search-bar"
                placeholder="🔍 ابحث عن تصنيف بالاسم أو الوصف...">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="categoriesTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الصورة</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted">لا توجد تصنيفات حالياً.</td>
                        </tr>
                    @else
                        @foreach ($categories as $index => $category)
                            @php $search = request('search'); @endphp
                            <tr>
                                <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</td>
                                <td class="fw-semibold">{!! $search ? str_ireplace($search, '<mark>' . $search . '</mark>', $category->name) : $category->name !!}</td>
                                <td>
                                    <span title="{{ $category->description }}">
                                        {!! $search ? str_ireplace($search, '<mark>' . $search . '</mark>', \Illuminate\Support\Str::limit($category->description, 40)) : \Illuminate\Support\Str::limit($category->description, 40) !!}
                                    </span>
                                </td>
                                <td>
                                    <img src="{{ $category->image ? asset($category->image) : asset('admin/assets/img/product_default.png') }}"
                                        alt="{{ $category->name }}" width="60" height="60" class="rounded-circle border">
                                </td>
                                <td>
                                    @if ($category->status == 1)
                                        <span class="badge bg-success">نشط</span>
                                    @else
                                        <span class="badge bg-secondary">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.show', $category->id) }}"
                                        class="btn btn-info btn-sm me-1" title="عرض"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm me-1" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div id="noCategoryResults" class="no-results" style="display:none;">لا توجد نتائج مطابقة.</div>
        </div>
        @if (request('search'))
            <div class="alert alert-info mt-3">
                نتائج البحث عن: <strong>{{ request('search') }}</strong>
                @if ($categories->isEmpty())
                    <br>لا توجد نتائج مطابقة.
                @endif
            </div>
        @endif
        <div class="d-flex justify-content-center mt-3">
            {{ $categories->withQueryString()->links() }}
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .search-bar {
            max-width: 300px;
            border-radius: 25px;
            padding-right: 35px;
            background: #f8f9fa;
        }

        .no-results {
            text-align: center;
            color: #888;
            font-size: 1.1em;
            padding: 30px 0;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('categorySearch');
            const table = document.getElementById('categoriesTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const noResults = document.getElementById('noCategoryResults');

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
        });
    </script>
@endpush


