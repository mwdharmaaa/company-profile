<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostAdminController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest('created_at')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if (empty($data['reading_time'])) {
            $wordCount = str_word_count(strip_tags($data['content']));
            $minutes = max(1, (int) ceil($wordCount / 200));
            $data['reading_time'] = "{$minutes} min read";
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Blog article created successfully.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if (empty($data['reading_time'])) {
            $wordCount = str_word_count(strip_tags($data['content']));
            $minutes = max(1, (int) ceil($wordCount / 200));
            $data['reading_time'] = "{$minutes} min read";
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Blog article updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Blog article deleted successfully.');
    }
}
