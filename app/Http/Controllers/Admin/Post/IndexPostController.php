<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexPostController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::latest('created_at')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }
}
