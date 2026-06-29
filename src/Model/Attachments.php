<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Attachments
 */
final readonly class Attachments extends AbstractModel implements Listing
{
    public function __construct(
        public int $page = 1,
        public int $pages = 1,
        public int $limit = 0,
        public int $total = 0,
        /** @var list<Attachment> */
        public array $items = [],
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            page: self::asInt($data['page'] ?? null) ?? 1,
            pages: self::asInt($data['pages'] ?? null) ?? 1,
            limit: self::asInt($data['limit'] ?? null) ?? 0,
            total: self::asInt($data['total'] ?? null) ?? 0,
            items: self::asModelList(Attachment::class, $data['items'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
