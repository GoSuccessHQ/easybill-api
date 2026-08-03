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
    public ?string $to;
    public ?string $cc;
    public ?string $from;
    public ?string $subject;
    public ?string $message;
    public ?string $date;
    public ?bool $sendBySelf;
    public ?bool $sendWithAttachment;
    public ?DocumentFileType $documentFileType;
    public ?PostSendType $postSendType;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $to = Undefined::Value,
        string|Undefined|null $cc = Undefined::Value,
        string|Undefined|null $from = Undefined::Value,
        string|Undefined|null $subject = Undefined::Value,
        string|Undefined|null $message = Undefined::Value,
        string|Undefined|null $date = Undefined::Value,
        bool|Undefined|null $sendBySelf = Undefined::Value,
        bool|Undefined|null $sendWithAttachment = Undefined::Value,
        DocumentFileType|Undefined|null $documentFileType = Undefined::Value,
        PostSendType|Undefined|null $postSendType = Undefined::Value,
    ) {
        $this->to = $to instanceof Undefined ? null : $to;
        $this->cc = $cc instanceof Undefined ? null : $cc;
        $this->from = $from instanceof Undefined ? null : $from;
        $this->subject = $subject instanceof Undefined ? null : $subject;
        $this->message = $message instanceof Undefined ? null : $message;
        $this->date = $date instanceof Undefined ? null : $date;
        $this->sendBySelf = $sendBySelf instanceof Undefined ? null : $sendBySelf;
        $this->sendWithAttachment = $sendWithAttachment instanceof Undefined ? null : $sendWithAttachment;
        $this->documentFileType = $documentFileType instanceof Undefined ? null : $documentFileType;
        $this->postSendType = $postSendType instanceof Undefined ? null : $postSendType;
        $this->explicit = self::explicitFields([
            'to' => $to,
            'cc' => $cc,
            'from' => $from,
            'subject' => $subject,
            'message' => $message,
            'date' => $date,
            'send_by_self' => $sendBySelf,
            'send_with_attachment' => $sendWithAttachment,
            'document_file_type' => $documentFileType,
            'post_send_type' => $postSendType,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            to: self::asString($data['to'] ?? null) ?? Undefined::Value,
            cc: self::asString($data['cc'] ?? null) ?? Undefined::Value,
            from: self::asString($data['from'] ?? null) ?? Undefined::Value,
            subject: self::asString($data['subject'] ?? null) ?? Undefined::Value,
            message: self::asString($data['message'] ?? null) ?? Undefined::Value,
            date: self::asString($data['date'] ?? null) ?? Undefined::Value,
            sendBySelf: self::asBool($data['send_by_self'] ?? null) ?? Undefined::Value,
            sendWithAttachment: self::asBool($data['send_with_attachment'] ?? null) ?? Undefined::Value,
            documentFileType: self::asEnum(DocumentFileType::class, $data['document_file_type'] ?? null) ?? Undefined::Value,
            postSendType: self::asEnum(PostSendType::class, $data['post_send_type'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->to !== null) {
            $data['to'] = $this->to;
        } elseif (isset($this->explicit['to'])) {
            $data['to'] = null;
        }
        if ($this->cc !== null) {
            $data['cc'] = $this->cc;
        } elseif (isset($this->explicit['cc'])) {
            $data['cc'] = null;
        }
        if ($this->from !== null) {
            $data['from'] = $this->from;
        } elseif (isset($this->explicit['from'])) {
            $data['from'] = null;
        }
        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        } elseif (isset($this->explicit['subject'])) {
            $data['subject'] = null;
        }
        if ($this->message !== null) {
            $data['message'] = $this->message;
        } elseif (isset($this->explicit['message'])) {
            $data['message'] = null;
        }
        if ($this->date !== null) {
            $data['date'] = $this->date;
        } elseif (isset($this->explicit['date'])) {
            $data['date'] = null;
        }
        if ($this->sendBySelf !== null) {
            $data['send_by_self'] = $this->sendBySelf;
        } elseif (isset($this->explicit['send_by_self'])) {
            $data['send_by_self'] = null;
        }
        if ($this->sendWithAttachment !== null) {
            $data['send_with_attachment'] = $this->sendWithAttachment;
        } elseif (isset($this->explicit['send_with_attachment'])) {
            $data['send_with_attachment'] = null;
        }
        if ($this->documentFileType !== null) {
            $data['document_file_type'] = $this->documentFileType->value;
        } elseif (isset($this->explicit['document_file_type'])) {
            $data['document_file_type'] = null;
        }
        if ($this->postSendType !== null) {
            $data['post_send_type'] = $this->postSendType->value;
        } elseif (isset($this->explicit['post_send_type'])) {
            $data['post_send_type'] = null;
        }

        return $data;
    }
}
