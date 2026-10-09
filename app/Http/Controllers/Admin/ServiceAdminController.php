<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceAdminController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('sort_order')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['features'] = $this->parseFeatures($data['features'] ?? '');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? (Service::max('sort_order') + 1);

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);
        $data['features'] = $this->parseFeatures($data['features'] ?? '');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    private function parseFeatures(string $featuresInput): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", $featuresInput))));
    }
}
