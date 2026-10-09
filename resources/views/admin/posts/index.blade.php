@extends('layouts.admin')

@section('title', 'Manage Blog Articles - MONOCORP')
@section('header_title', 'Blog Management')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h2>Engineering Dispatches</h2>
        <p style="font-size: 13.5px;">Publish technical articles, architectural case studies, and engineering updates.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">+ Write New Article</a>
</div>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Reads</th>
                <th>Published</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>
                        <strong>{{ $post->title }}</strong>
                        <div class="mono" style="font-size: 11px; color: var(--text-muted);">/blog/{{ $post->slug }}</div>
                    </td>
                    <td><span class="badge">{{ $post->category }}</span></td>
                    <td style="font-size: 13px;">{{ $post->author_name }}</td>
                    <td>
                        <span class="badge {{ $post->status === 'published' ? 'badge-dark' : '' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </td>
                    <td class="mono">{{ $post->views_count }}</td>
                    <td class="mono" style="font-size: 12px;">
                        {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Unscheduled' }}
                    </td>
                    <td style="text-align: right;">
                        <div class="action-buttons" style="justify-content: flex-end;">
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-outline btn-sm">Preview</a>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-secondary btn-sm">Edit</a>

                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="delete-confirm-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color: #b91c1c;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No blog posts created yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 24px;">
    {{ $posts->links() }}
</div>
@endsection
