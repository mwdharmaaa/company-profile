<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateServiceController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.services.create');
    }
}
