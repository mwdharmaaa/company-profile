<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $query = Service::where('is_active', true)->orderBy('sort_order');

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%");
            });
        }

        $services = $query->get();

        return view('public.services.index', compact('services'));
    }

    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('public.services.show', compact('service', 'relatedServices'));
    }
}
