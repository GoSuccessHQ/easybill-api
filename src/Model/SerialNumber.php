<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json SerialNumber
 */
final readonly class SerialNumber extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public ?string $serialNumber = null,
        public ?int $positionId = null,
        public ?int $documentId = null,
        public ?int $documentPositionId = null,
        public ?string $usedAt = null,
        public ?string $createdAt = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            serialNumber: self::asString($data['serial_number'] ?? null),
            positionId: self::asInt($data['position_id'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            documentPositionId: self::asInt($data['document_position_id'] ?? null),
            usedAt: self::asString($data['used_at'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->serialNumber !== null) {
            $data['serial_number'] = $this->serialNumber;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        }

        return $data;
    }
}
