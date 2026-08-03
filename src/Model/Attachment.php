<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Attachment
 */
final readonly class Attachment extends AbstractModel
{
    public ?string $createdAt;
    public ?int $customerId;
    public ?int $documentId;
    public ?string $fileName;
    public ?int $id;
    public ?int $projectId;
    public ?int $size;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?string $createdAt = null,
        int|Undefined|null $customerId = Undefined::Value,
        int|Undefined|null $documentId = Undefined::Value,
        ?string $fileName = null,
        ?int $id = null,
        int|Undefined|null $projectId = Undefined::Value,
        ?int $size = null,
    ) {
        $this->createdAt = $createdAt;
        $this->customerId = $customerId instanceof Undefined ? null : $customerId;
        $this->documentId = $documentId instanceof Undefined ? null : $documentId;
        $this->fileName = $fileName;
        $this->id = $id;
        $this->projectId = $projectId instanceof Undefined ? null : $projectId;
        $this->size = $size;
        $this->explicit = self::explicitFields([
            'customer_id' => $customerId,
            'document_id' => $documentId,
            'project_id' => $projectId,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: self::asString($data['created_at'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null) ?? Undefined::Value,
            documentId: self::asInt($data['document_id'] ?? null) ?? Undefined::Value,
            fileName: self::asString($data['file_name'] ?? null),
            id: self::asInt($data['id'] ?? null),
            projectId: self::asInt($data['project_id'] ?? null) ?? Undefined::Value,
            size: self::asInt($data['size'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        } elseif (isset($this->explicit['customer_id'])) {
            $data['customer_id'] = null;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        } elseif (isset($this->explicit['document_id'])) {
            $data['document_id'] = null;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        } elseif (isset($this->explicit['project_id'])) {
            $data['project_id'] = null;
        }

        return $data;
    }
}
