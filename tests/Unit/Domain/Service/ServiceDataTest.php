<?php

namespace Tests\Unit\Domain\Service;

use App\Domain\Service\DTOs\ServiceData;
use Tests\TestCase;

class ServiceDataTest extends TestCase
{
    public function test_service_data_instantiation_from_array(): void
    {
        $data = [
            'title' => 'Core Architecture',
            'excerpt' => 'Short summary',
            'description' => 'Detailed description',
            'features' => ['Feature A', 'Feature B'],
            'is_active' => true,
        ];

        $dto = ServiceData::fromArray($data);
        $this->assertSame('Core Architecture', $dto->title);
        $this->assertCount(2, $dto->features);
        $this->assertTrue($dto->isActive);
    }
}
