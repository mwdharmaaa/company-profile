<?php

namespace App\Domain\Shared\Traits;

use Illuminate\Support\Str;

trait HasSlugTrait
{
    public static function bootHasSlugTrait(): void
    {
        static::creating(function ($model) {
            $sourceField = property_exists($model, 'slugSource') ? $model->slugSource : 'title';
            if (empty($model->slug) && !empty($model->{$sourceField})) {
                $model->slug = Str::slug($model->{$sourceField});
            }
        });
    }
}
