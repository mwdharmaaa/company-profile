<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Domain\Setting\Actions\UpdateSettingsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsRequest;
use Illuminate\Http\RedirectResponse;

class UpdateSettingController extends Controller
{
    public function __invoke(SettingsRequest $request, UpdateSettingsAction $action): RedirectResponse
    {
        $inputs = $request->validated()['settings'];
        $action->execute($inputs);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Company profile and system settings updated successfully.');
    }
}
