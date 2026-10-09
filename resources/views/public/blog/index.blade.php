@extends('layouts.public')

@section('title', 'Technical Journal & Architectural Dispatches - MONOCORP')

@section('content')
<section class="section section-border">
    <div class="container">
        <span class="badge badge-dark">Engineering Log</span>
        <h1 style="margin-top: 16px; margin-bottom: 16px;">Technical Dispatches</h1>
        <p style="font-size: 1.15rem; color: var(--text-secondary); max-width: 680px; margin-bottom: 32px;">
            In-depth perspectives on scalable systems, zero-framework architecture, and deterministic orchestration.
        </p>

        <!-- Categories & Search Bar -->
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 16px;">
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="{{ route('blog.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-secondary' }} btn-sm">All Categories</a>
                @foreach ($categories as $cat)
                    <a href="{{ route('blog.index', ['category' => $cat]) }}" class="btn {{ request('category') === $cat ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <form action="{{ route('blog.index') }}" method="GET" style="display: flex; gap: 8px;">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="q" class="form-input" placeholder="Search dispatches..." value="{{ request('q') }}" style="width: 220px; padding: 6px 12px; font-size: 13px;">
                <button type="submit" class="btn btn-outline btn-sm">Search</button>
            </form>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @if ($posts->isEmpty())
            <div style="text-align: center; padding: 60px; border: 1px dashed var(--border-light);">
                <p>No dispatches found matching your search criteria.</p>
                <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm" style="margin-top: 16px;">Reset Filter</a>
            </div>
        @else
            <div class="grid-3">
                @foreach ($posts as $post)
                    <article class="card service-card">
                        <div>
                            <div class="blog-card-meta">
                                <span class="badge">{{ $post->category }}</span>
                                <span>{{ $post->reading_time }}</span>
                            </div>

                            <h3 style="font-size: 1.2rem; margin-top: 6px; margin-bottom: 12px;">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            <p style="font-size: 13.5px; line-height: 1.6; margin-bottom: 20px;">
                                {{ $post->excerpt }}
                            </p>
                        </div>

                        <div style="margin-top: 20px; padding-top: 14px; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: var(--text-muted); font-family: var(--font-mono);">
                            <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</span>
                            <a href="{{ route('blog.show', $post->slug) }}" style="font-weight: 600; text-decoration: underline; color: var(--text-primary);">Read &rarr;</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Clean Native Pagination -->
            <div style="margin-top: 48px; display: flex; justify-content: center;">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
