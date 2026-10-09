<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Domain\Inquiry\Actions\UpdateInquiryStatusAction;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateInquiryStatusController extends Controller
{
    public function __invoke(Request $request, Inquiry $inquiry, UpdateInquiryStatusAction $action): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:unread,read,archived']]);
        $action->execute($inquiry, $request->status);

        return back()->with('success', 'Inquiry status updated.');
    }
}
