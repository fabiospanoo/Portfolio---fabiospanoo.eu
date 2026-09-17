@php
    $eventClass = function ($log) {
        return $log->isFailure() ? 'admin-badge-fail' : 'admin-badge-ok';
    };
@endphp

<x-admin-layout title="audit // admin">
    <div class="admin-head">
        <div>
            <p class="admin-eyebrow">./ audit</p>
            <h1 class="admin-title">Access log</h1>
            <p class="admin-hint mt-2">Every password attempt and 2FA check, successful or not.</p>
        </div>
    </div>

    <div class="admin-table">
        <div class="admin-table-head admin-table-head--audit">
            <span>date</span>
            <span>event</span>
            <span>ip</span>
            <span>user agent</span>
        </div>

        @forelse ($logs as $log)
            <div class="admin-table-row admin-table-row--audit">
                <div class="admin-hint">{{ $log->created_at?->format('Y-m-d H:i:s') }}</div>
                <div><span class="admin-badge {{ $eventClass($log) }}">{{ $log->label() }}</span></div>
                <div class="admin-cell-ip">{{ $log->ip ?: '—' }}</div>
                <div class="admin-cell-agent">{{ \Illuminate\Support\Str::limit($log->user_agent, 60) ?: '—' }}</div>
            </div>
        @empty
            <div class="admin-card admin-empty">
                <span class="text-comment">&gt;</span> no activity recorded yet.
            </div>
        @endforelse
    </div>

    <div class="admin-pagination">
        {{ $logs->links('pagination::bootstrap-5') }}
    </div>
</x-admin-layout>
