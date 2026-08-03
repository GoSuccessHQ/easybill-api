<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Stock
 */
final readonly class Stock extends AbstractModel
{
    public ?int $id;
    public ?string $note;
    public ?int $stockCount;
    public ?int $positionId;
    public ?int $documentId;
    public ?int $documentPositionId;
    public ?string $storedAt;
    public ?string $createdAt;
    public ?string $updatedAt;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        string|Undefined|null $note = Undefined::Value,
        int|Undefined|null $stockCount = Undefined::Value,
        int|Undefined|null $positionId = Undefined::Value,
        ?int $documentId = null,
        ?int $documentPositionId = null,
        string|Undefined|null $storedAt = Undefined::Value,
        ?string $createdAt = null,
        ?string $updatedAt = null,
    ) {
        $this->id = $id;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->stockCount = $stockCount instanceof Undefined ? null : $stockCount;
        $this->positionId = $positionId instanceof Undefined ? null : $positionId;
        $this->documentId = $documentId;
        $this->documentPositionId = $documentPositionId;
        $this->storedAt = $storedAt instanceof Undefined ? null : $storedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->explicit = self::explicitFields([
            'note' => $note,
            'stock_count' => $stockCount,
            'position_id' => $positionId,
            'stored_at' => $storedAt,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            stockCount: self::asInt($data['stock_count'] ?? null) ?? Undefined::Value,
            positionId: self::asInt($data['position_id'] ?? null) ?? Undefined::Value,
            documentId: self::asInt($data['document_id'] ?? null),
            documentPositionId: self::asInt($data['document_position_id'] ?? null),
            storedAt: self::asString($data['stored_at'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->stockCount !== null) {
            $data['stock_count'] = $this->stockCount;
        } elseif (isset($this->explicit['stock_count'])) {
            $data['stock_count'] = null;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        } elseif (isset($this->explicit['position_id'])) {
            $data['position_id'] = null;
        }
        if ($this->storedAt !== null) {
            $data['stored_at'] = $this->storedAt;
        } elseif (isset($this->explicit['stored_at'])) {
            $data['stored_at'] = null;
        }

        return $data;
    }
}
