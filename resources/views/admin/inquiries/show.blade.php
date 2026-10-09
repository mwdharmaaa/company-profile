@extends('layouts.admin')

@section('title', 'Inquiry Details - MONOCORP')
@section('header_title', 'Inquiry Inspection')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline btn-sm">&larr; Back to Inquiries</a>
    <h2 style="margin-top: 12px;">Subject: {{ $inquiry->subject }}</h2>
</div>

<div class="card" style="background: #ffffff; max-width: 800px; margin-bottom: 24px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; padding-bottom: 20px; border-bottom: 1px solid var(--border-light); margin-bottom: 24px;">
        <div>
            <div style="font-size: 16px; font-weight: 600;">{{ $inquiry->name }}</div>
            <div style="font-size: 14px; color: var(--text-secondary);">
                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
            </div>
            <div class="mono" style="font-size: 11px; color: var(--text-muted); margin-top: 4px;">
                Received: {{ $inquiry->created_at->format('l, F d, Y - H:i:s T') }}
            </div>
        </div>

        <div>
            @if ($inquiry->service)
                <span class="badge badge-dark">Target: {{ $inquiry->service->title }}</span>
            @else
                <span class="badge">General Consultation</span>
            @endif
        </div>
    </div>

    <div>
        <h4 style="font-size: 13px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 8px;">Message Body</h4>
        <div style="font-size: 15px; line-height: 1.8; color: var(--text-primary); white-space: pre-wrap; background-color: var(--bg-secondary); padding: 20px; border-radius: var(--radius-sm); border: 1px solid var(--border-light);">
            {{ $inquiry->message }}
        </div>
    </div>

    <div style="margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
        <form action="{{ route('admin.inquiries.status', $inquiry) }}" method="POST" style="display: flex; align-items: center; gap: 10px;">
            @csrf
            @method('PATCH')
            <label for="status" class="form-label" style="margin-bottom: 0;">Change Status:</label>
            <select name="status" id="status" class="form-select" style="width: auto; padding: 6px 12px; font-size: 13px;">
                <option value="unread" {{ $inquiry->status === 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read</option>
                <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            <button type="submit" class="btn btn-secondary btn-sm">Update</button>
        </form>

        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="delete-confirm-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline btn-sm" style="color: #b91c1c;">Delete Inquiry</button>
        </form>
    </div>
</div>
@endsection
