<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Domain\Setting\Repositories\SettingRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexSettingController extends Controller
{
    public function __invoke(SettingRepositoryInterface $repository): View
    {
        $settings = $repository->getAllGrouped();
        return view('admin.settings.index', compact('settings'));
    }
}
