<?php

namespace App\Domain\Post\Actions;

use App\Domain\Post\DTOs\PostData;
use App\Models\Post;
use Illuminate\Support\Str;

class CreatePostAction
{
    public function execute(PostData $data): Post
    {
        $payload = $data->toArray();
        if (empty($payload['slug'])) {
            $payload['slug'] = Str::slug($payload['title']);
        }

        return Post::create($payload);
    }
}
