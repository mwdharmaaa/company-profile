<?php

namespace App\Domain\Service\Queries;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class GetActiveServicesQuery
{
    public function execute(?string $search = null): Collection
    {
        $query = Service::where('is_active', true)->orderBy('sort_order');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }
}
