<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\View\View;

class ShowInquiryController extends Controller
{
    public function __invoke(Inquiry $inquiry): View
    {
        if ($inquiry->status === 'unread') {
            $inquiry->update(['status' => 'read']);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }
}
