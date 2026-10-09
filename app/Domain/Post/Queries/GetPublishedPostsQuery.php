<?php

namespace App\Domain\Post\Queries;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetPublishedPostsQuery
{
    public function execute(?string $category = null, ?string $search = null, int $perPage = 6): LengthAwarePaginator
    {
        $query = Post::published()->latest('published_at');

        if (!empty($category)) {
            $query->where('category', $category);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }
}
