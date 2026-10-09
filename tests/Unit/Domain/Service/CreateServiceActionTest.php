<?php

namespace Tests\Unit\Domain\Service;

use App\Domain\Service\Actions\CreateServiceAction;
use App\Domain\Service\DTOs\ServiceData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateServiceActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_service_action_persists_record(): void
    {
        $action = new CreateServiceAction();
        $dto = ServiceData::fromArray([
            'title' => 'Kubernetes Mesh',
            'excerpt' => 'Service mesh orchestration',
            'description' => 'High performance proxy mesh',
            'features' => ['Envoy Proxy'],
        ]);

        $service = $action->execute($dto);
        $this->assertDatabaseHas('services', ['id' => $service->id, 'title' => 'Kubernetes Mesh']);
    }
}
