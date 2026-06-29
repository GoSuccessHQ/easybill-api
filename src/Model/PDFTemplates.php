<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplates
 */
final readonly class PDFTemplates extends AbstractModel
{
    public function __construct(
        /** @var list<PDFTemplate> */
        public array $items = [],
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            items: self::asModelList(PDFTemplate::class, $data['items'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(PDFTemplate $item): array => $item->toArray(), $this->items);
        }

        return $data;
    }
}
