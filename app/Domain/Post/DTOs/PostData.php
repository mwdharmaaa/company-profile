<?php

namespace App\Domain\Post\DTOs;

readonly class PostData
{
    public function __construct(
        public string $title,
        public ?string $slug,
        public string $category,
        public string $excerpt,
        public string $content,
        public string $authorName,
        public ?string $readingTime,
        public string $status,
        public ?string $publishedAt,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            slug: $data['slug'] ?? null,
            category: $data['category'] ?? 'General',
            excerpt: $data['excerpt'],
            content: $data['content'],
            authorName: $data['author_name'] ?? 'MonoCorp Editorial',
            readingTime: $data['reading_time'] ?? null,
            status: $data['status'] ?? 'published',
            publishedAt: $data['published_at'] ?? null,
        );
    }

    public function calculateReadingTime(): string
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = max(1, (int) ceil($words / 200));
        return "{$minutes} min read";
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'author_name' => $this->authorName,
            'reading_time' => $this->readingTime ?? $this->calculateReadingTime(),
            'status' => $this->status,
            'published_at' => $this->publishedAt ?? ($this->status === 'published' ? now() : null),
        ];
    }
}
