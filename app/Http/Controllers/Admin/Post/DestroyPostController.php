<?php

namespace App\Http\Controllers\Admin\Post;

use App\Domain\Post\Actions\DeletePostAction;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DestroyPostController extends Controller
{
    public function __invoke(Post $post, DeletePostAction $action): RedirectResponse
    {
        $action->execute($post);
        return redirect()->route('admin.posts.index')->with('success', 'Blog article deleted successfully.');
    }
}
