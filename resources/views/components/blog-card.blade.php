@props(['post'])

<article class="card">
    <div class="blog-card-meta">
        <span class="badge">{{ $post->category }}</span>
        <span>{{ $post->reading_time }}</span>
    </div>
    <h3 style="font-size:1.15rem;margin-bottom:10px;">
        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
    </h3>
    <p style="font-size:13px;line-height:1.6;margin-bottom:16px;">{{ $post->excerpt }}</p>
    <a href="{{ route('blog.show', $post->slug) }}" style="font-size:13px;font-weight:600;text-decoration:underline;">Read &rarr;</a>
</article>
