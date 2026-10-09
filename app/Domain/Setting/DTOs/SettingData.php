<?php

namespace App\Domain\Setting\DTOs;

readonly class SettingData
{
    public function __construct(
        public string $key,
        public ?string $value,
        public string $group = 'general',
        public ?string $label = null,
    ) {}
}
