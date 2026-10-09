<?php

namespace App\Domain\Service\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServiceDeletedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public int $serviceId) {}
}
