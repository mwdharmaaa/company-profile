<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Domain\Inquiry\Actions\DeleteInquiryAction;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;

class DestroyInquiryController extends Controller
{
    public function __invoke(Inquiry $inquiry, DeleteInquiryAction $action): RedirectResponse
    {
        $action->execute($inquiry);
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry removed.');
    }
}
