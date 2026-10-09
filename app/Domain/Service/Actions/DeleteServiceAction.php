<?php

namespace App\Domain\Service\Actions;

use App\Models\Service;

class DeleteServiceAction
{
    public function execute(Service $service): bool
    {
        return (bool) $service->delete();
    }
}
