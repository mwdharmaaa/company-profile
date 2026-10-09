<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        $about = [
            'story' => CompanySetting::get('about_story'),
            'vision' => CompanySetting::get('about_vision'),
            'mission' => CompanySetting::get('about_mission'),
            'methodology' => CompanySetting::get('about_methodology'),
            'company_name' => CompanySetting::get('company_name', 'MONOCORP'),
            'tagline' => CompanySetting::get('tagline'),
        ];

        $principles = [
            [
                'number' => '01',
                'title' => 'Single Responsibility Focus',
                'description' => 'Every system component, module, and team process operates with one clear, uncompromising purpose.',
            ],
            [
                'number' => '02',
                'title' => 'Zero-Framework Overhead',
                'description' => 'We reject gratuitous layers of abstraction. Native platform primitives deliver superior throughput and longevity.',
            ],
            [
                'number' => '03',
                'title' => 'Deterministic Orchestration',
                'description' => 'From development to bare-metal production, environments are reproducible via single-enter shell scripts.',
            ],
            [
                'number' => '04',
                'title' => 'Rigorous Resilience',
                'description' => 'We design for catastrophic failure, ensuring graceful degradation, circuit breaking, and sub-second recovery.',
            ],
        ];

        return view('public.about', compact('about', 'principles'));
    }
}
