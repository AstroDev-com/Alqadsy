@if($activities->isEmpty())
    <p class="text-muted text-center">{{ __('dashboard.no_activities_found') }}</p>
@else
    @foreach ($activities as $activity)
        <div class="timeline-item">
            <div
                class="timeline-point bg-{{ $loop->iteration % 3 == 1 ? 'primary' : ($loop->iteration % 3 == 2 ? 'success' : 'warning') }}">
            </div>
            <h6 class="fw-bold mb-1">
                {{-- @if ($activity instanceof \App\Models\Sale)
                    {{ __('dashboard.new_sale') }}
                    @php $route = route('sales.show', $activity->id); @endphp
                 --}}
                {{-- @if ($activity instanceof \App\Models\Purchase)
                    {{ __('dashboard.new_purchase') }}
                    @php $route = route('purchases.show', $activity->id); @endphp
                @else --}}
                {{-- Handle other activity types if needed --}}
                {{ __('dashboard.new_activity') }}
                @php $route = '#'; @endphp
                {{-- @endif --}}
            </h6>
            <p class="text-muted small mb-1">{{ $activity->created_at->diffForHumans() }}</p>
            <p class="mb-0 small">
                {{-- @if ($activity instanceof \App\Models\Sale)
                    <a href="{{ $route }}" class="text-decoration-none">
                        <span>{{ __('dashboard.customer') }}:
                            {{ $activity->customer->name ?? __('dashboard.guest_customer') }}</span>
                        <span class="mx-1 text-muted">|</span>
                        <span>{{ __('dashboard.total') }}: <span
                                class="text-success fw-bold">{{ number_format($activity->grand_total) }}</span>
                            {{ __('dashboard.YER') }}</span>
                    </a>
                --}}
                {{-- @if ($activity instanceof \App\Models\Purchase)
                    <a href="{{ $route }}" class="text-decoration-none">
                        <span>{{ __('dashboard.supplier') }}:
                            {{ $activity->supplier->name ?? __('dashboard.unknown_supplier') }}</span>
                        <span class="mx-1 text-muted">|</span>
                        <span>{{ __('dashboard.total') }}: <span
                                class="text-warning fw-bold">{{ number_format($activity->grand_total) }}</span>
                            {{ __('dashboard.YER') }}</span>
                    </a>
                @endif --}}
                {{-- Display generic activity info or info relevant to new system --}}
            </p>
        </div>
    @endforeach
@endif
