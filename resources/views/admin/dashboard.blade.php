@extends('layouts.admin')

@section('title', 'Admin Dashboard - Overview')
@section('header_title', 'Operational Overview')

@section('content')
<div class="stat-card-group">
    <div class="admin-stat-card">
        <span class="mono" style="font-size: 11px; color: var(--text-muted);">Total Services</span>
        <div class="admin-stat-number">{{ $stats['total_services'] }}</div>
        <div style="font-size: 12px; color: var(--text-secondary); margin-top: 4px;">{{ $stats['active_services'] }} currently active</div>
    </div>

    <div class="admin-stat-card">
        <span class="mono" style="font-size: 11px; color: var(--text-muted);">Blog Dispatches</span>
        <div class="admin-stat-number">{{ $stats['total_posts'] }}</div>
        <div style="font-size: 12px; color: var(--text-secondary); margin-top: 4px;">{{ $stats['published_posts'] }} published live</div>
    </div>

    <div class="admin-stat-card">
        <span class="mono" style="font-size: 11px; color: var(--text-muted);">Unread Inquiries</span>
        <div class="admin-stat-number" style="color: var(--accent);">{{ $stats['unread_inquiries'] }}</div>
        <div style="font-size: 12px; color: var(--text-secondary); margin-top: 4px;">Awaiting response</div>
    </div>

    <div class="admin-stat-card">
        <span class="mono" style="font-size: 11px; color: var(--text-muted);">Total Article Reads</span>
        <div class="admin-stat-number">{{ $stats['total_views'] }}</div>
        <div style="font-size: 12px; color: var(--text-secondary); margin-top: 4px;">Cumulative engagement</div>
    </div>
</div>

<!-- Quick Action Shortcuts -->
<div style="display: flex; gap: 12px; margin-bottom: 32px;">
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">+ New Service Specification</a>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-outline btn-sm">+ New Blog Dispatch</a>
    <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary btn-sm">Edit System Settings</a>
</div>

<!-- Recent Inquiries -->
<div style="margin-bottom: 40px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h3>Incoming Client Inquiries</h3>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline btn-sm">View All Inquiries &rarr;</a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentInquiries as $inquiry)
                    <tr>
                        <td class="mono" style="font-size: 12px;">{{ $inquiry->created_at->format('M d, H:i') }}</td>
                        <td><strong>{{ $inquiry->name }}</strong></td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ Str::limit($inquiry->subject, 36) }}</td>
                        <td>
                            @if ($inquiry->status === 'unread')
                                <span class="badge badge-dark">Unread</span>
                            @else
                                <span class="badge">{{ ucfirst($inquiry->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-outline btn-sm">Read</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">No incoming inquiries recorded.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Recent Blog Posts -->
<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h3>Recent Articles</h3>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline btn-sm">Manage All Articles &rarr;</a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentPosts as $post)
                    <tr>
                        <td><strong>{{ Str::limit($post->title, 45) }}</strong></td>
                        <td><span class="badge">{{ $post->category }}</span></td>
                        <td>
                            <span class="badge {{ $post->status === 'published' ? 'badge-dark' : '' }}">{{ ucfirst($post->status) }}</span>
                        </td>
                        <td class="mono">{{ $post->views_count }}</td>
                        <td class="mono" style="font-size: 12px;">{{ $post->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-secondary btn-sm">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">No posts available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
