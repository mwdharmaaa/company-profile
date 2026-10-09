@extends('layouts.public')

@section('title', $post->title . ' - MONOCORP Journal')

@section('content')
<article class="section section-border">
    <div class="container" style="max-width: 820px;">
        <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm" style="margin-bottom: 28px;">&larr; Back to Journal</a>

        <div style="display: flex; gap: 10px; margin-bottom: 16px;">
            <span class="badge badge-dark">{{ $post->category }}</span>
            <span class="badge">{{ $post->reading_time }}</span>
        </div>

        <h1 style="font-size: 2.75rem; line-height: 1.2; margin-bottom: 20px;">
            {{ $post->title }}
        </h1>

        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid var(--border-light); font-size: 13px; color: var(--text-muted); font-family: var(--font-mono);">
            <div>By <strong style="color: var(--text-primary);">{{ $post->author_name }}</strong></div>
            <div>{{ $post->published_at ? $post->published_at->format('F d, Y') : 'Draft' }} &bull; {{ $post->views_count }} reads</div>
        </div>

        <div class="article-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div style="margin-top: 60px; padding-top: 24px; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
            <span class="mono" style="font-size: 12px; color: var(--text-muted);">MONOCORP Architectural Publications</span>
            <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm">All Dispatches</a>
        </div>
    </div>
</article>

@if ($relatedPosts->isNotEmpty())
<section class="section">
    <div class="container" style="max-width: 820px;">
        <h3 style="margin-bottom: 24px;">Related Dispatches</h3>
        <div class="grid-2">
            @foreach ($relatedPosts as $rel)
                <div class="card">
                    <span class="badge" style="margin-bottom: 8px;">{{ $rel->category }}</span>
                    <h4 style="margin-top: 4px; margin-bottom: 8px;">
                        <a href="{{ route('blog.show', $rel->slug) }}">{{ $rel->title }}</a>
                    </h4>
                    <p style="font-size: 13px;">{{ $rel->excerpt }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
