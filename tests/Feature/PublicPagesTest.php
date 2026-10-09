<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('MONOCORP');
        $response->assertSee('Systems Architecture');
    }

    public function test_about_page_returns_successful_response(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Engineering Principles');
    }

    public function test_services_catalog_page_returns_successful_response(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Production Engineering Services');
    }

    public function test_single_service_page_returns_successful_response(): void
    {
        $service = Service::first();
        if ($service) {
            $response = $this->get("/services/{$service->slug}");
            $response->assertStatus(200);
            $response->assertSee($service->title);
        }
    }

    public function test_blog_catalog_page_returns_successful_response(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Technical Dispatches');
    }

    public function test_single_blog_post_returns_successful_response(): void
    {
        $post = Post::published()->first();
        if ($post) {
            $response = $this->get("/blog/{$post->slug}");
            $response->assertStatus(200);
            $response->assertSee($post->title);
        }
    }

    public function test_public_inquiry_can_be_submitted(): void
    {
        $response = $this->post('/inquiries', [
            'name' => 'John Architect',
            'email' => 'john@enterprise.test',
            'subject' => 'High-Throughput Architecture Consultation',
            'message' => 'We are scaling our distributed backend and need an architectural audit.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', [
            'email' => 'john@enterprise.test',
        ]);
    }
}
