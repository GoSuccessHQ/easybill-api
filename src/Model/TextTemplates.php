<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json TextTemplates
 */
final readonly class TextTemplates extends AbstractModel implements Listing
{
    public int $page;
    public int $pages;
    public int $limit;
    public int $total;
    /** @var list<TextTemplate> */
    public array $items;

    /**
     * @param list<TextTemplate> $items
     */
    public function __construct(
        int $page = 1,
        int $pages = 1,
        int $limit = 0,
        int $total = 0,
        array $items = [],
    ) {
        $this->page = $page;
        $this->pages = $pages;
        $this->limit = $limit;
        $this->total = $total;
        $this->items = $items;
    }

    public static function fromArray(array $data): static
    {
        return new self(
            page: self::asInt($data['page'] ?? null) ?? 1,
            pages: self::asInt($data['pages'] ?? null) ?? 1,
            limit: self::asInt($data['limit'] ?? null) ?? 0,
            total: self::asInt($data['total'] ?? null) ?? 0,
            items: self::asModelList(TextTemplate::class, $data['items'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
