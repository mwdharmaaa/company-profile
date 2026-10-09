<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\InquiryRequest;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    public function store(InquiryRequest $request): RedirectResponse
    {
        Inquiry::create($request->validated());

        return back()->with('success', 'Thank you. Your inquiry has been received. Our engineering team will review it promptly.');
    }
}
