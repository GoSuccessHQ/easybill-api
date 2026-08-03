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
    public ?int $id;
    public ?int $documentId;
    public ?string $to;
    public ?string $cc;
    public ?string $from;
    public ?string $subject;
    public ?string $message;
    public ?string $date;
    public ?string $createdAt;
    public ?string $processedAt;
    public ?bool $sendBySelf;
    public ?bool $sendWithAttachment;
    public ?DocumentRecurringSendAs $type;
    public ?PostBoxStatus $status;
    public ?string $statusMsg;
    public ?int $loginId;
    public ?PostBoxDocumentFileType $documentFileType;
    public ?PostBoxPostSendType $postSendType;
    public ?string $trackingIdentifier;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        int|Undefined|null $documentId = Undefined::Value,
        string|Undefined|null $to = Undefined::Value,
        string|Undefined|null $cc = Undefined::Value,
        string|Undefined|null $from = Undefined::Value,
        string|Undefined|null $subject = Undefined::Value,
        string|Undefined|null $message = Undefined::Value,
        string|Undefined|null $date = Undefined::Value,
        string|Undefined|null $createdAt = Undefined::Value,
        string|Undefined|null $processedAt = Undefined::Value,
        bool|Undefined|null $sendBySelf = Undefined::Value,
        bool|Undefined|null $sendWithAttachment = Undefined::Value,
        DocumentRecurringSendAs|Undefined|null $type = Undefined::Value,
        PostBoxStatus|Undefined|null $status = Undefined::Value,
        string|Undefined|null $statusMsg = Undefined::Value,
        ?int $loginId = null,
        PostBoxDocumentFileType|Undefined|null $documentFileType = Undefined::Value,
        PostBoxPostSendType|Undefined|null $postSendType = Undefined::Value,
        ?string $trackingIdentifier = null,
    ) {
        $this->id = $id;
        $this->documentId = $documentId instanceof Undefined ? null : $documentId;
        $this->to = $to instanceof Undefined ? null : $to;
        $this->cc = $cc instanceof Undefined ? null : $cc;
        $this->from = $from instanceof Undefined ? null : $from;
        $this->subject = $subject instanceof Undefined ? null : $subject;
        $this->message = $message instanceof Undefined ? null : $message;
        $this->date = $date instanceof Undefined ? null : $date;
        $this->createdAt = $createdAt instanceof Undefined ? null : $createdAt;
        $this->processedAt = $processedAt instanceof Undefined ? null : $processedAt;
        $this->sendBySelf = $sendBySelf instanceof Undefined ? null : $sendBySelf;
        $this->sendWithAttachment = $sendWithAttachment instanceof Undefined ? null : $sendWithAttachment;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->status = $status instanceof Undefined ? null : $status;
        $this->statusMsg = $statusMsg instanceof Undefined ? null : $statusMsg;
        $this->loginId = $loginId;
        $this->documentFileType = $documentFileType instanceof Undefined ? null : $documentFileType;
        $this->postSendType = $postSendType instanceof Undefined ? null : $postSendType;
        $this->trackingIdentifier = $trackingIdentifier;
        $this->explicit = self::explicitFields([
            'document_id' => $documentId,
            'to' => $to,
            'cc' => $cc,
            'from' => $from,
            'subject' => $subject,
            'message' => $message,
            'date' => $date,
            'created_at' => $createdAt,
            'processed_at' => $processedAt,
            'send_by_self' => $sendBySelf,
            'send_with_attachment' => $sendWithAttachment,
            'type' => $type,
            'status' => $status,
            'status_msg' => $statusMsg,
            'document_file_type' => $documentFileType,
            'post_send_type' => $postSendType,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null) ?? Undefined::Value,
            to: self::asString($data['to'] ?? null) ?? Undefined::Value,
            cc: self::asString($data['cc'] ?? null) ?? Undefined::Value,
            from: self::asString($data['from'] ?? null) ?? Undefined::Value,
            subject: self::asString($data['subject'] ?? null) ?? Undefined::Value,
            message: self::asString($data['message'] ?? null) ?? Undefined::Value,
            date: self::asString($data['date'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null) ?? Undefined::Value,
            processedAt: self::asString($data['processed_at'] ?? null) ?? Undefined::Value,
            sendBySelf: self::asBool($data['send_by_self'] ?? null) ?? Undefined::Value,
            sendWithAttachment: self::asBool($data['send_with_attachment'] ?? null) ?? Undefined::Value,
            type: self::asEnum(DocumentRecurringSendAs::class, $data['type'] ?? null) ?? Undefined::Value,
            status: self::asEnum(PostBoxStatus::class, $data['status'] ?? null) ?? Undefined::Value,
            statusMsg: self::asString($data['status_msg'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null),
            documentFileType: self::asEnum(PostBoxDocumentFileType::class, $data['document_file_type'] ?? null) ?? Undefined::Value,
            postSendType: self::asEnum(PostBoxPostSendType::class, $data['post_send_type'] ?? null) ?? Undefined::Value,
            trackingIdentifier: self::asString($data['tracking_identifier'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        } elseif (isset($this->explicit['document_id'])) {
            $data['document_id'] = null;
        }
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
        if ($this->createdAt !== null) {
            $data['created_at'] = $this->createdAt;
        } elseif (isset($this->explicit['created_at'])) {
            $data['created_at'] = null;
        }
        if ($this->processedAt !== null) {
            $data['processed_at'] = $this->processedAt;
        } elseif (isset($this->explicit['processed_at'])) {
            $data['processed_at'] = null;
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
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        } elseif (isset($this->explicit['status'])) {
            $data['status'] = null;
        }
        if ($this->statusMsg !== null) {
            $data['status_msg'] = $this->statusMsg;
        } elseif (isset($this->explicit['status_msg'])) {
            $data['status_msg'] = null;
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
