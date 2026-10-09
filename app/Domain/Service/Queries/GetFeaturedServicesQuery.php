<?php

namespace App\Domain\Service\Queries;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class GetFeaturedServicesQuery
{
    public function execute(int $limit = 3): Collection
    {
        $featured = Service::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take($limit)
            ->get();

        if ($featured->isEmpty()) {
            return Service::where('is_active', true)
                ->orderBy('sort_order')
                ->take($limit)
                ->get();
        }

        return $featured;
    }
}
