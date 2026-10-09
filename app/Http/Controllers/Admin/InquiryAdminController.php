<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryAdminController extends Controller
{
    public function index(): View
    {
        $inquiries = Inquiry::with('service')
            ->latest()
            ->paginate(15);

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry): View
    {
        if ($inquiry->status === 'unread') {
            $inquiry->update(['status' => 'read']);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:unread,read,archived'],
        ]);

        $inquiry->update(['status' => $request->status]);

        return back()->with('success', 'Inquiry status updated.');
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry removed.');
    }
}
