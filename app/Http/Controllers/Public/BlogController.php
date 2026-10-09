<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::published()->latest('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(6)->withQueryString();
        $categories = Post::published()->select('category')->distinct()->pluck('category');

        return view('public.blog.index', compact('posts', 'categories'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $post->incrementViews();

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest('published_at')
            ->take(2)
            ->get();

        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take(2)
                ->get();
        }

        return view('public.blog.show', compact('post', 'relatedPosts'));
    }
}
