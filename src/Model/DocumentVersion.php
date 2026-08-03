<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentVersion
 */
final readonly class DocumentVersion extends AbstractModel
{
    public ?string $createdAt;
    public ?int $documentId;
    public ?int $id;
    /** @var list<DocumentVersionItem> */
    public array $items;
    public ?string $reason;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<DocumentVersionItem>|Undefined $items
     */
    public function __construct(
        ?string $createdAt = null,
        ?int $documentId = null,
        ?int $id = null,
        array|Undefined $items = Undefined::Value,
        ?string $reason = null,
    ) {
        $this->createdAt = $createdAt;
        $this->documentId = $documentId;
        $this->id = $id;
        $this->items = $items instanceof Undefined ? [] : $items;
        $this->reason = $reason;
        $this->explicit = self::explicitFields([
            'items' => $items,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            createdAt: self::asString($data['created_at'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            id: self::asInt($data['id'] ?? null),
            items: self::asModelList(DocumentVersionItem::class, $data['items'] ?? null) ?: Undefined::Value,
            reason: self::asString($data['reason'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(DocumentVersionItem $item): array => $item->toArray(), $this->items);
        } elseif (isset($this->explicit['items'])) {
            $data['items'] = [];
        }

        return $data;
    }
}
