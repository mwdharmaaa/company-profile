<?php

namespace App\Http\Controllers\Admin\Post;

use App\Domain\Post\Actions\UpdatePostAction;
use App\Domain\Post\DTOs\PostData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdatePostController extends Controller
{
    public function __invoke(PostRequest $request, Post $post, UpdatePostAction $action): RedirectResponse
    {
        $dto = PostData::fromArray($request->validated());
        $action->execute($post, $dto);

        return redirect()->route('admin.posts.index')->with('success', 'Blog article updated successfully.');
    }
}
