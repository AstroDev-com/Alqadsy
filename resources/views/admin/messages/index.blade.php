@extends('admin.layouts.master')
@section('title', 'الرسائل والمذكرات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">الرسائل والمذكرات</h3>
                        <a href="{{ route('messages.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> رسالة جديدة
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>المرسل</th>
                                        <th>المستلم</th>
                                        <th>الموضوع</th>
                                        <th>الأولوية</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($messages->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">لا توجد رسائل</td>
                                        </tr>
                                    @else
                                        @foreach($messages as $message)
                                            <tr class="{{ $message->status === 'unread' ? 'table-warning' : '' }}">
                                                <td>{{ $message->sender->name }}</td>
                                                <td>{{ $message->receiver->name }}</td>
                                                <td>
                                                    <a href="{{ route('messages.show', $message) }}">
                                                        {{ $message->subject }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $message->priority === 'high' ? 'danger' : ($message->priority === 'medium' ? 'warning' : 'info') }}">
                                                        {{ $message->priority }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $message->status === 'unread' ? 'warning' : ($message->status === 'read' ? 'success' : 'secondary') }}">
                                                        {{ $message->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('messages.show', $message) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        @if ($message->status === 'unread')
                                                            <form action="{{ route('messages.markAsRead', $message) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        <form action="{{ route('messages.archive', $message) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-secondary">
                                                                <i class="fas fa-archive"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
