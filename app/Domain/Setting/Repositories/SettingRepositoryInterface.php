<?php

namespace App\Domain\Setting\Repositories;

use Illuminate\Support\Collection;

interface SettingRepositoryInterface
{
    public function get(string $key, ?string $default = null): ?string;
    public function set(string $key, ?string $value, string $group = 'general', ?string $label = null): void;
    public function getAllGrouped(): Collection;
}
