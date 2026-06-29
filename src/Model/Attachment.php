<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Attachment
 */
final readonly class Attachment extends AbstractModel
{
    public function __construct(
        public ?string $createdAt = null,
        public ?int $customerId = null,
        public ?int $documentId = null,
        public ?string $fileName = null,
        public ?int $id = null,
        public ?int $projectId = null,
        public ?int $size = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: self::asString($data['created_at'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            fileName: self::asString($data['file_name'] ?? null),
            id: self::asInt($data['id'] ?? null),
            projectId: self::asInt($data['project_id'] ?? null),
            size: self::asInt($data['size'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        }

        return $data;
    }
}
