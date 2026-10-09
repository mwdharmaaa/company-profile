<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::where('is_active', true)->count(),
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'unread_inquiries' => Inquiry::where('status', 'unread')->count(),
            'total_views' => Post::sum('views_count'),
        ];

        $recentInquiries = Inquiry::with('service')
            ->latest()
            ->take(5)
            ->get();

        $recentPosts = Post::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentPosts'));
    }
}
