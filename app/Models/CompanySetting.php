<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CompanySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'label',
    ];

    public static function get(string $key, ?string $default = null): ?string
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            $record = static::where('key', $key)->first();
            return $record ? $record->value : $default;
        });
    }

    public static function set(string $key, ?string $value, string $group = 'general', ?string $label = null): void
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'label' => $label ?? ucfirst(str_replace('_', ' ', $key)),
            ]
        );

        Cache::forget("setting_{$key}");
    }

    public static function getAllGrouped(): array
    {
        return static::all()->groupBy('group')->toArray();
    }
}
