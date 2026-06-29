<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

use GoSuccess\Easybill\Enum\ProjectStatus;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class ProjectFilter
{
    public function __construct(
        public ?string $customerId = null,
        public ?ProjectStatus $status = null,
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
        if ($this->status !== null) {
            $query['status'] = $this->status->value;
        }

        return $query;
    }
}
