<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplates
 */
final readonly class PDFTemplates extends AbstractModel
{
    /** @var list<PDFTemplate> */
    public array $items;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<PDFTemplate>|Undefined $items
     */
    public function __construct(
        array|Undefined $items = Undefined::Value,
    ) {
        $this->items = $items instanceof Undefined ? [] : $items;
        $this->explicit = self::explicitFields([
            'items' => $items,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            items: self::asModelList(PDFTemplate::class, $data['items'] ?? null) ?: Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(PDFTemplate $item): array => $item->toArray(), $this->items);
        } elseif (isset($this->explicit['items'])) {
            $data['items'] = [];
        }

        return $data;
    }
}
