<?php

namespace Tests\Unit\Domain\Setting;

use App\Domain\Setting\Repositories\SettingRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_repository_sets_and_gets_settings(): void
    {
        $repo = new SettingRepository();
        $repo->set('custom_key', 'custom_value', 'general', 'Custom Label');

        $this->assertSame('custom_value', $repo->get('custom_key'));
    }
}
