<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\View\View;

class IndexInquiryController extends Controller
{
    public function __invoke(): View
    {
        $inquiries = Inquiry::with('service')->latest()->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }
}
