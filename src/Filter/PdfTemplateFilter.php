<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class PdfTemplateFilter
{
    public function __construct(
        /** @var list<string>|null */
        public ?array $type = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->type !== null) {
            $query['type'] = implode(',', $this->type);
        }

        return $query;
    }
}
