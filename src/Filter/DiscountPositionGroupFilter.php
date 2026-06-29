<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class DiscountPositionGroupFilter
{
    public function __construct(
        public ?string $customerId = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->customerId !== null) {
            $query['customer_id'] = $this->customerId;
        }

        return $query;
    }
}
