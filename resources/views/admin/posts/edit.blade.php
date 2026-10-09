@extends('layouts.admin')

@section('title', 'Edit Article - ' . $post->title)
@section('header_title', 'Edit Blog Dispatch')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline btn-sm">&larr; Back to Articles</a>
    <h2 style="margin-top: 12px;">Edit: {{ $post->title }}</h2>
</div>

<div class="card" style="background: #ffffff; max-width: 860px;">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid-2">
            <div class="form-group">
                <label for="title" class="form-label">Article Title</label>
                <input type="text" id="title" name="title" class="form-input" required value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label for="slug" class="form-label">URL Slug</label>
                <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug', $post->slug) }}">
            </div>
        </div>

        <div class="grid-3">
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <input type="text" id="category" name="category" class="form-input" required value="{{ old('category', $post->category) }}">
            </div>

            <div class="form-group">
                <label for="author_name" class="form-label">Author Name</label>
                <input type="text" id="author_name" name="author_name" class="form-input" required value="{{ old('author_name', $post->author_name) }}">
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Publication Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published Live</option>
                    <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt" class="form-label">Article Excerpt</label>
            <input type="text" id="excerpt" name="excerpt" class="form-input" required value="{{ old('excerpt', $post->excerpt) }}">
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Article Body Content</label>
            <textarea id="content" name="content" class="form-textarea" style="min-height: 260px;" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 24px;">
            <button type="submit" class="btn btn-primary">Update Article</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
