<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Stock
 */
final readonly class Stock extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public ?string $note = null,
        public ?int $stockCount = null,
        public ?int $positionId = null,
        public ?int $documentId = null,
        public ?int $documentPositionId = null,
        public ?string $storedAt = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            note: self::asString($data['note'] ?? null),
            stockCount: self::asInt($data['stock_count'] ?? null),
            positionId: self::asInt($data['position_id'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            documentPositionId: self::asInt($data['document_position_id'] ?? null),
            storedAt: self::asString($data['stored_at'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->stockCount !== null) {
            $data['stock_count'] = $this->stockCount;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        }
        if ($this->storedAt !== null) {
            $data['stored_at'] = $this->storedAt;
        }

        return $data;
    }
}
