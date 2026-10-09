<?php

namespace App\Domain\Inquiry\Actions;

use App\Models\Inquiry;

class UpdateInquiryStatusAction
{
    public function execute(Inquiry $inquiry, string $status): Inquiry
    {
        $inquiry->update(['status' => $status]);
        return $inquiry;
    }
}
