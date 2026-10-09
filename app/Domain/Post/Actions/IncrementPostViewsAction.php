<?php

namespace App\Domain\Post\Actions;

use App\Models\Post;

class IncrementPostViewsAction
{
    public function execute(Post $post): void
    {
        $post->increment('views_count');
    }
}
