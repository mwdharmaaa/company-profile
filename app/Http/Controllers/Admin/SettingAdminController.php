<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsRequest;
use App\Models\CompanySetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingAdminController extends Controller
{
    public function index(): View
    {
        $settings = CompanySetting::all()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingsRequest $request): RedirectResponse
    {
        $inputs = $request->validated()['settings'];

        foreach ($inputs as $key => $value) {
            CompanySetting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Company profile and system settings updated successfully.');
    }
}
