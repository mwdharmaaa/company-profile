<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'excerpt',
        'description',
        'features',
        'starting_price',
        'delivery_time',
        'badge',
        'icon_name',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getFormattedFeaturesAttribute(): array
    {
        if (is_array($this->features)) {
            return $this->features;
        }

        return [];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
