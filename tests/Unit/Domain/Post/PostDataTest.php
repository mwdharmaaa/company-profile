<?php

namespace Tests\Unit\Domain\Post;

use App\Domain\Post\DTOs\PostData;
use Tests\TestCase;

class PostDataTest extends TestCase
{
    public function test_reading_time_computation(): void
    {
        $words = str_repeat('engineering ', 450);
        $dto = PostData::fromArray([
            'title' => 'High Throughput',
            'excerpt' => 'Excerpt test',
            'content' => $words,
            'author_name' => 'Lead Architect',
        ]);

        $this->assertSame('3 min read', $dto->calculateReadingTime());
    }
}
