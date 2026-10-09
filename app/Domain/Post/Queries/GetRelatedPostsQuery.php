<?php

namespace App\Domain\Post\Queries;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class GetRelatedPostsQuery
{
    public function execute(Post $post, int $limit = 2): Collection
    {
        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest('published_at')
            ->take($limit)
            ->get();

        if ($related->isEmpty()) {
            return Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take($limit)
                ->get();
        }

        return $related;
    }
}
