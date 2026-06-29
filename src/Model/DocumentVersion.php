<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentVersion
 */
final readonly class DocumentVersion extends AbstractModel
{
    public function __construct(
        public ?string $createdAt = null,
        public ?int $documentId = null,
        public ?int $id = null,
        /** @var list<DocumentVersionItem> */
        public array $items = [],
        public ?string $reason = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: self::asString($data['created_at'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            id: self::asInt($data['id'] ?? null),
            items: self::asModelList(DocumentVersionItem::class, $data['items'] ?? null),
            reason: self::asString($data['reason'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(DocumentVersionItem $item): array => $item->toArray(), $this->items);
        }

        return $data;
    }
}
