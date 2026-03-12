@extends('admin.layouts.master')

@section('title', __('dashboard.conversations')) {{-- Or use a different translation key like chat.conversations --}}

@push('styles')
    <style>
        .conversation-item.unread {
            background-color: var(--gray);
            /* Similar to unread notification */
            border-left: 4px solid var(--success);
            /* Green border for unread chat */
            font-weight: bold;
        }

        .conversation-item>a {
            color: var(--dark);
        }

        .conversation-item>a:hover {
            background-color: var(--gray);
        }

        .participant-avatars img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-left: -8px;
            /* Overlap avatars slightly */
            border: 1px solid var(--light);
        }

        .participant-avatars .avatar-placeholder {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: var(--gray);
            color: var(--dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8em;
            margin-left: -8px;
            border: 1px solid var(--light);
        }

        .text-muted {
            color: var(--gray) !important;
        }

        .card {
            background-color: var(--light);
            border: 1px solid var(--gray);
        }

        .list-group-item {
            background-color: var(--light);
            border-color: var(--gray);
            color: var(--dark);
        }

        .card-footer {
            background-color: var(--light) !important;
            border-top: 1px solid var(--gray);
        }

        .badge.bg-success {
            background-color: var(--success) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .text-gray-800 {
            color: var(--dark) !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">

        {{-- Session Messages --}}
        @include('admin.partials.session-messages')

        {{-- Page Heading --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('dashboard.conversations') }}</h1>
            {{-- Optional: Button to start new conversation --}}
            <a href="{{ route('conversations.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('dashboard.new_conversation') }}
            </a>
        </div>

        {{-- Conversations List --}}
        <div class="card shadow mb-4">
            <div class="card-body p-0">
                @if ($conversations->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach ($conversations as $conversation)
                            @php
                                // Get participants other than the current user
                                $otherParticipants = $conversation->participants->where('id', '!=', Auth::id());
                                $displayParticipants = $otherParticipants->take(3);
                                // Check if the conversation has unread messages for the current user
                                $isUnread = $conversation->unread_count > 0;
                            @endphp
                            <li class="list-group-item conversation-item {{ $isUnread ? 'unread' : 'read' }}">
                                <a href="{{ route('conversations.show', $conversation->id) }}"
                                    class="text-decoration-none text-dark d-flex align-items-center">
                                    {{-- Participant Avatars/Names --}}
                                    <div class="participant-avatars {{ $isRTL ?? false ? 'ms-3' : 'me-3' }}">
                                        @if($displayParticipants->isEmpty())
                                            <span class="avatar-placeholder"><i class="fas fa-user"></i></span>
                                        @else
                                            @foreach ($displayParticipants as $participant)
                                                {{-- Use placeholder for now, replace with actual avatar if available --}}
                                                <img src="{{ $participant->profile_image ? asset('storage/' . $participant->profile_image) : asset('admin\assets\img/emp_default.png') }}"
                                                    alt="{{ $participant->name }}" class="avatar-placeholder">
                                            @endforeach
                                        @endif
                                        @if ($otherParticipants->count() > 3)
                                            <span class="avatar-placeholder">+{{ $otherParticipants->count() - 3 }}</span>
                                        @endif
                                    </div>

                                    {{-- Conversation Details --}}
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold {{ $isUnread ? 'text-primary' : '' }}">
                                                {{ $otherParticipants->pluck('name')->implode(', ') }}
                                            </span>
                                            <small class="text-muted ms-2">
                                                {{ $conversation->latestMessage?->created_at->diffForHumans() ?? $conversation->updated_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <p class="mb-0 text-muted small text-truncate" style="max-width: 80%;">
                                            {{-- Show sender name if latest message is from someone else --}}
                                            @if ($conversation->latestMessage && $conversation->latestMessage->user_id !== Auth::id())
                                                <strong>{{ $conversation->latestMessage->user->name }}:</strong>
                                            @endif
                                            {{ $conversation->latestMessage?->body ?? __('dashboard.no_messages_yet') }}
                                        </p>
                                    </div>

                                    {{-- Unread Badge --}}
                                    @if ($isUnread)
                                        <span
                                            class="badge bg-success rounded-pill ms-3">{{ $conversation->unread_count }}</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-muted p-5">{{ __('dashboard.no_conversations_found') }}</p>
                @endif
            </div>

            {{-- Pagination --}}
            @if ($conversations->hasPages())
                <div class="card-footer bg-light border-top">
                    {{ $conversations->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
