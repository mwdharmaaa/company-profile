@extends('layouts.admin')

@section('title', 'Client Inquiries - MONOCORP')
@section('header_title', 'Client Inquiries Inbox')

@section('content')
<div style="margin-bottom: 24px;">
    <h2>Client Inquiries</h2>
    <p style="font-size: 13.5px;">Messages and consultation requests received through public contact forms.</p>
</div>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Received</th>
                <th>Sender</th>
                <th>Target Service</th>
                <th>Subject</th>
                <th>Status</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $inquiry)
                <tr>
                    <td class="mono" style="font-size: 12px;">{{ $inquiry->created_at->format('M d, Y H:i') }}</td>
                    <td>
                        <strong>{{ $inquiry->name }}</strong>
                        <div style="font-size: 12px; color: var(--text-muted);">{{ $inquiry->email }}</div>
                    </td>
                    <td>
                        @if ($inquiry->service)
                            <span class="badge">{{ $inquiry->service->title }}</span>
                        @else
                            <span style="font-size: 12px; color: var(--text-muted);">General</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($inquiry->subject, 36) }}</td>
                    <td>
                        @if ($inquiry->status === 'unread')
                            <span class="badge badge-dark">Unread</span>
                        @elseif ($inquiry->status === 'read')
                            <span class="badge">Read</span>
                        @else
                            <span class="badge" style="opacity: 0.6;">Archived</span>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        <div class="action-buttons" style="justify-content: flex-end;">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-outline btn-sm">Inspect</a>

                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="delete-confirm-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color: #b91c1c;">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">No client inquiries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 24px;">
    {{ $inquiries->links() }}
</div>
@endsection
