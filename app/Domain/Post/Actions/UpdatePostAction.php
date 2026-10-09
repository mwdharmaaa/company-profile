<?php

namespace App\Domain\Post\Actions;

use App\Domain\Post\DTOs\PostData;
use App\Models\Post;
use Illuminate\Support\Str;

class UpdatePostAction
{
    public function execute(Post $post, PostData $data): Post
    {
        $payload = $data->toArray();
        if (empty($payload['slug'])) {
            $payload['slug'] = Str::slug($payload['title']);
        }

        $post->update($payload);
        return $post;
    }
}
