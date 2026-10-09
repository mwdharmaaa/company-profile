<?php

namespace Tests\Unit\Domain\Post;

use App\Domain\Post\Actions\CreatePostAction;
use App\Domain\Post\DTOs\PostData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_post_action_persists_record(): void
    {
        $action = new CreatePostAction();
        $dto = PostData::fromArray([
            'title' => 'Cache Aside Paradigm',
            'excerpt' => 'Sub millisecond tuning',
            'content' => 'Deep dive into memory cache',
            'author_name' => 'Author Test',
            'category' => 'Backend',
        ]);

        $post = $action->execute($dto);
        $this->assertDatabaseHas('posts', ['id' => $post->id, 'title' => 'Cache Aside Paradigm']);
    }
}
