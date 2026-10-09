<?php

namespace App\Http\Controllers\Admin\Service;

use App\Domain\Service\Actions\UpdateServiceAction;
use App\Domain\Service\DTOs\ServiceData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;

class UpdateServiceController extends Controller
{
    public function __invoke(ServiceRequest $request, Service $service, UpdateServiceAction $action): RedirectResponse
    {
        $data = $request->validated();
        $features = !empty($data['features']) ? array_values(array_filter(array_map('trim', explode("\n", $data['features'])))) : [];
        $data['features'] = $features;
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        $dto = ServiceData::fromArray($data);
        $action->execute($service, $dto);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }
}
