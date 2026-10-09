<?php

namespace App\Domain\Service\Actions;

use App\Domain\Service\DTOs\ServiceData;
use App\Models\Service;
use Illuminate\Support\Str;

class UpdateServiceAction
{
    public function execute(Service $service, ServiceData $data): Service
    {
        $payload = $data->toArray();
        if (empty($payload['slug'])) {
            $payload['slug'] = Str::slug($payload['title']);
        }

        $service->update($payload);
        return $service;
    }
}
