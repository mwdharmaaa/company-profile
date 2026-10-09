<?php

namespace App\Http\Controllers\Admin\Post;

use App\Domain\Post\Actions\CreatePostAction;
use App\Domain\Post\DTOs\PostData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Http\RedirectResponse;

class StorePostController extends Controller
{
    public function __invoke(PostRequest $request, CreatePostAction $action): RedirectResponse
    {
        $dto = PostData::fromArray($request->validated());
        $action->execute($dto);

        return redirect()->route('admin.posts.index')->with('success', 'Blog article created successfully.');
    }
}
