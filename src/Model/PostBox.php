<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\DocumentRecurringSendAs;
use GoSuccess\Easybill\Enum\PostBoxDocumentFileType;
use GoSuccess\Easybill\Enum\PostBoxPostSendType;
use GoSuccess\Easybill\Enum\PostBoxStatus;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PostBox
 */
final readonly class PostBox extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public ?int $documentId = null,
        public ?string $to = null,
        public ?string $cc = null,
        public ?string $from = null,
        public ?string $subject = null,
        public ?string $message = null,
        public ?string $date = null,
        public ?string $createdAt = null,
        public ?string $processedAt = null,
        public ?bool $sendBySelf = null,
        public ?bool $sendWithAttachment = null,
        public ?DocumentRecurringSendAs $type = null,
        public ?PostBoxStatus $status = null,
        public ?string $statusMsg = null,
        public ?int $loginId = null,
        public ?PostBoxDocumentFileType $documentFileType = null,
        public ?PostBoxPostSendType $postSendType = null,
        public ?string $trackingIdentifier = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            to: self::asString($data['to'] ?? null),
            cc: self::asString($data['cc'] ?? null),
            from: self::asString($data['from'] ?? null),
            subject: self::asString($data['subject'] ?? null),
            message: self::asString($data['message'] ?? null),
            date: self::asString($data['date'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            processedAt: self::asString($data['processed_at'] ?? null),
            sendBySelf: self::asBool($data['send_by_self'] ?? null),
            sendWithAttachment: self::asBool($data['send_with_attachment'] ?? null),
            type: self::asEnum(DocumentRecurringSendAs::class, $data['type'] ?? null),
            status: self::asEnum(PostBoxStatus::class, $data['status'] ?? null),
            statusMsg: self::asString($data['status_msg'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            documentFileType: self::asEnum(PostBoxDocumentFileType::class, $data['document_file_type'] ?? null),
            postSendType: self::asEnum(PostBoxPostSendType::class, $data['post_send_type'] ?? null),
            trackingIdentifier: self::asString($data['tracking_identifier'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        }
        if ($this->to !== null) {
            $data['to'] = $this->to;
        }
        if ($this->cc !== null) {
            $data['cc'] = $this->cc;
        }
        if ($this->from !== null) {
            $data['from'] = $this->from;
        }
        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        }
        if ($this->message !== null) {
            $data['message'] = $this->message;
        }
        if ($this->date !== null) {
            $data['date'] = $this->date;
        }
        if ($this->createdAt !== null) {
            $data['created_at'] = $this->createdAt;
        }
        if ($this->processedAt !== null) {
            $data['processed_at'] = $this->processedAt;
        }
        if ($this->sendBySelf !== null) {
            $data['send_by_self'] = $this->sendBySelf;
        }
        if ($this->sendWithAttachment !== null) {
            $data['send_with_attachment'] = $this->sendWithAttachment;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        }
        if ($this->statusMsg !== null) {
            $data['status_msg'] = $this->statusMsg;
        }
        if ($this->documentFileType !== null) {
            $data['document_file_type'] = $this->documentFileType->value;
        }
        if ($this->postSendType !== null) {
            $data['post_send_type'] = $this->postSendType->value;
        }

        return $data;
    }
}
