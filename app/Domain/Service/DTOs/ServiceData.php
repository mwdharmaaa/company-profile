<?php

namespace App\Domain\Service\DTOs;

readonly class ServiceData
{
    public function __construct(
        public string $title,
        public ?string $slug,
        public ?string $tagline,
        public string $excerpt,
        public string $description,
        public array $features,
        public ?string $startingPrice,
        public ?string $deliveryTime,
        public ?string $badge,
        public string $iconName,
        public bool $isFeatured,
        public bool $isActive,
        public int $sortOrder = 0,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            slug: $data['slug'] ?? null,
            tagline: $data['tagline'] ?? null,
            excerpt: $data['excerpt'],
            description: $data['description'],
            features: is_array($data['features'] ?? null) ? $data['features'] : [],
            startingPrice: $data['starting_price'] ?? null,
            deliveryTime: $data['delivery_time'] ?? null,
            badge: $data['badge'] ?? null,
            iconName: $data['icon_name'] ?? 'server',
            isFeatured: (bool) ($data['is_featured'] ?? false),
            isActive: (bool) ($data['is_active'] ?? true),
            sortOrder: (int) ($data['sort_order'] ?? 0),
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'tagline' => $this->tagline,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'features' => $this->features,
            'starting_price' => $this->startingPrice,
            'delivery_time' => $this->deliveryTime,
            'badge' => $this->badge,
            'icon_name' => $this->iconName,
            'is_featured' => $this->isFeatured,
            'is_active' => $this->isActive,
            'sort_order' => $this->sortOrder,
        ];
    }
}
