<?php

namespace App\Domain\Post\Events;

use App\Models\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostPublishedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public Post $post) {}
}
