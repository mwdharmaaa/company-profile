<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\View\View;

class EditServiceController extends Controller
{
    public function __invoke(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }
}
