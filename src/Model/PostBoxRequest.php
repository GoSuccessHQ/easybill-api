<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\DocumentFileType;
use GoSuccess\Easybill\Enum\PostSendType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PostBoxRequest
 */
final readonly class PostBoxRequest extends AbstractModel
{
    public function __construct(
        public ?string $to = null,
        public ?string $cc = null,
        public ?string $from = null,
        public ?string $subject = null,
        public ?string $message = null,
        public ?string $date = null,
        public ?bool $sendBySelf = null,
        public ?bool $sendWithAttachment = null,
        public ?DocumentFileType $documentFileType = null,
        public ?PostSendType $postSendType = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            to: self::asString($data['to'] ?? null),
            cc: self::asString($data['cc'] ?? null),
            from: self::asString($data['from'] ?? null),
            subject: self::asString($data['subject'] ?? null),
            message: self::asString($data['message'] ?? null),
            date: self::asString($data['date'] ?? null),
            sendBySelf: self::asBool($data['send_by_self'] ?? null),
            sendWithAttachment: self::asBool($data['send_with_attachment'] ?? null),
            documentFileType: self::asEnum(DocumentFileType::class, $data['document_file_type'] ?? null),
            postSendType: self::asEnum(PostSendType::class, $data['post_send_type'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
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
        if ($this->sendBySelf !== null) {
            $data['send_by_self'] = $this->sendBySelf;
        }
        if ($this->sendWithAttachment !== null) {
            $data['send_with_attachment'] = $this->sendWithAttachment;
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
