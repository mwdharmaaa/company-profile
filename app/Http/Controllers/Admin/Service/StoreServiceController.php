<?php

namespace App\Http\Controllers\Admin\Service;

use App\Domain\Service\Actions\CreateServiceAction;
use App\Domain\Service\DTOs\ServiceData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use Illuminate\Http\RedirectResponse;

class StoreServiceController extends Controller
{
    public function __invoke(ServiceRequest $request, CreateServiceAction $action): RedirectResponse
    {
        $data = $request->validated();
        $features = !empty($data['features']) ? array_values(array_filter(array_map('trim', explode("\n", $data['features'])))) : [];
        $data['features'] = $features;
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);

        $dto = ServiceData::fromArray($data);
        $action->execute($dto);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }
}
