<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreatePostController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.posts.create');
    }
}
