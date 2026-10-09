<?php

namespace Tests\Unit\Domain\Inquiry;

use App\Domain\Inquiry\Actions\CreateInquiryAction;
use App\Domain\Inquiry\DTOs\InquiryData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateInquiryActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_inquiry_action_persists_record(): void
    {
        $action = new CreateInquiryAction();
        $dto = InquiryData::fromArray([
            'name' => 'Sarah Connor',
            'email' => 'sarah@sky.test',
            'subject' => 'Infrastructure Invariant Verification',
            'message' => 'Validating the distributed cluster tolerance.',
        ]);

        $inquiry = $action->execute($dto);
        $this->assertDatabaseHas('inquiries', ['id' => $inquiry->id, 'email' => 'sarah@sky.test']);
    }
}
