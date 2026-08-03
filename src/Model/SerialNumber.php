<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json SerialNumber
 */
final readonly class SerialNumber extends AbstractModel
{
    public ?int $id;
    public ?string $serialNumber;
    public ?int $positionId;
    public ?int $documentId;
    public ?int $documentPositionId;
    public ?string $usedAt;
    public ?string $createdAt;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        string|Undefined|null $serialNumber = Undefined::Value,
        int|Undefined|null $positionId = Undefined::Value,
        ?int $documentId = null,
        ?int $documentPositionId = null,
        ?string $usedAt = null,
        ?string $createdAt = null,
    ) {
        $this->id = $id;
        $this->serialNumber = $serialNumber instanceof Undefined ? null : $serialNumber;
        $this->positionId = $positionId instanceof Undefined ? null : $positionId;
        $this->documentId = $documentId;
        $this->documentPositionId = $documentPositionId;
        $this->usedAt = $usedAt;
        $this->createdAt = $createdAt;
        $this->explicit = self::explicitFields([
            'serial_number' => $serialNumber,
            'position_id' => $positionId,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            serialNumber: self::asString($data['serial_number'] ?? null) ?? Undefined::Value,
            positionId: self::asInt($data['position_id'] ?? null) ?? Undefined::Value,
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
        } elseif (isset($this->explicit['serial_number'])) {
            $data['serial_number'] = null;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        } elseif (isset($this->explicit['position_id'])) {
            $data['position_id'] = null;
        }

        return $data;
    }
}
