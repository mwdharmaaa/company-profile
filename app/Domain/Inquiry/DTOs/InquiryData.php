<?php

namespace App\Domain\Inquiry\DTOs;

readonly class InquiryData
{
    public function __construct(
        public string $name,
        public string $email,
        public ?int $serviceId,
        public string $subject,
        public string $message,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            serviceId: !empty($data['service_id']) ? (int) $data['service_id'] : null,
            subject: $data['subject'],
            message: $data['message'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'service_id' => $this->serviceId,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'unread',
        ];
    }
}
