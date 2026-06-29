<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

use GoSuccess\Easybill\Enum\PositionType;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class PositionFilter
{
    public function __construct(
        public ?PositionType $type = null,
        public ?string $number = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->type !== null) {
            $query['type'] = $this->type->value;
        }
        if ($this->number !== null) {
            $query['number'] = $this->number;
        }

        return $query;
    }
}
