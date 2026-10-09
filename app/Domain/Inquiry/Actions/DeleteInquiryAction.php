<?php

namespace App\Domain\Inquiry\Actions;

use App\Models\Inquiry;

class DeleteInquiryAction
{
    public function execute(Inquiry $inquiry): bool
    {
        return (bool) $inquiry->delete();
    }
}
