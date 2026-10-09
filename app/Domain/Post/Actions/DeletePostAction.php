<?php

namespace App\Domain\Post\Actions;

use App\Models\Post;

class DeletePostAction
{
    public function execute(Post $post): bool
    {
        return (bool) $post->delete();
    }
}
