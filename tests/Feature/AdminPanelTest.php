<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;
    private function getAdminUser(): User
    {
        return User::firstOrCreate(
            ['email' => 'admin@monocorp.test'],
            [
                'name' => 'MonoCorp Admin',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_authenticate_and_access_dashboard(): void
    {
        $admin = $this->getAdminUser();

        $loginResponse = $this->post('/admin/login', [
            'email' => $admin->email,
            'password' => 'password123',
        ]);

        $loginResponse->assertRedirect('/admin');

        $dashboardResponse = $this->actingAs($admin)->get('/admin');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Operational Overview');
    }

    public function test_admin_can_create_and_manage_service(): void
    {
        $admin = $this->getAdminUser();

        $response = $this->actingAs($admin)->post('/admin/services', [
            'title' => 'Realtime WebSocket Cluster',
            'slug' => 'realtime-websocket-cluster',
            'excerpt' => 'Distributed pub-sub socket cluster with zero drop rates.',
            'description' => 'Detailed architecture and specifications for high-load sockets.',
            'features' => "Redis Streams backend\nHeartbeat monitoring",
            'starting_price' => '$3,000',
            'delivery_time' => '2 Weeks',
            'icon_name' => 'server',
            'is_active' => true,
        ]);

        $response->assertRedirect('/admin/services');
        $this->assertDatabaseHas('services', [
            'slug' => 'realtime-websocket-cluster',
        ]);
    }

    public function test_admin_can_create_and_manage_blog_post(): void
    {
        $admin = $this->getAdminUser();

        $response = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'Deterministic Container Lifecycles',
            'slug' => 'deterministic-container-lifecycles',
            'category' => 'DevOps',
            'excerpt' => 'Why distroless container builds eliminate security attack vectors.',
            'content' => 'Deep dive into distroless and minimal alpine images.',
            'author_name' => 'MonoCorp Admin',
            'status' => 'published',
        ]);

        $response->assertRedirect('/admin/posts');
        $this->assertDatabaseHas('posts', [
            'slug' => 'deterministic-container-lifecycles',
        ]);
    }
}
