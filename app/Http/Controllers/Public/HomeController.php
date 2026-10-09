<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use App\Models\Post;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $featuredServices = Service::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        if ($featuredServices->isEmpty()) {
            $featuredServices = Service::where('is_active', true)
                ->orderBy('sort_order')
                ->take(3)
                ->get();
        }

        $latestPosts = Post::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $stats = [
            'projects' => CompanySetting::get('stat_projects', '150+'),
            'uptime' => CompanySetting::get('stat_uptime', '99.98%'),
            'experience' => CompanySetting::get('stat_experience', '10+ Yrs'),
            'retention' => CompanySetting::get('stat_retention', '98%'),
        ];

        return view('public.home', compact('featuredServices', 'latestPosts', 'stats'));
    }
}
