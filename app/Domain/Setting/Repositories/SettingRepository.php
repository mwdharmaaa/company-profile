<?php

namespace App\Domain\Setting\Repositories;

use App\Models\CompanySetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SettingRepository implements SettingRepositoryInterface
{
    public function get(string $key, ?string $default = null): ?string
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            $record = CompanySetting::where('key', $key)->first();
            return $record ? $record->value : $default;
        });
    }

    public function set(string $key, ?string $value, string $group = 'general', ?string $label = null): void
    {
        CompanySetting::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'label' => $label ?? ucfirst(str_replace('_', ' ', $key)),
            ]
        );

        Cache::forget("setting_{$key}");
    }

    public function getAllGrouped(): Collection
    {
        return CompanySetting::all()->groupBy('group');
    }
}
