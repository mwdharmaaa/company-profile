<?php

namespace App\Http\Controllers\Admin\Service;

use App\Domain\Service\Actions\DeleteServiceAction;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;

class DestroyServiceController extends Controller
{
    public function __invoke(Service $service, DeleteServiceAction $action): RedirectResponse
    {
        $action->execute($service);
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
