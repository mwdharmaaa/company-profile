<?php

namespace App\Domain\Service\Events;

use App\Models\Service;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServiceCreatedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public Service $service) {}
}
