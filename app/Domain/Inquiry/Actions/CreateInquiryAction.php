<?php

namespace App\Domain\Inquiry\Actions;

use App\Domain\Inquiry\DTOs\InquiryData;
use App\Models\Inquiry;

class CreateInquiryAction
{
    public function execute(InquiryData $data): Inquiry
    {
        return Inquiry::create($data->toArray());
    }
}
