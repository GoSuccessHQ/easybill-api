<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

use GoSuccess\Easybill\Enum\DocumentRecurringSendAs;
use GoSuccess\Easybill\Enum\PostBoxStatus;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class PostBoxFilter
{
    public function __construct(
        public ?DocumentRecurringSendAs $type = null,
        public ?PostBoxStatus $status = null,
        public ?string $documentId = null,
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
        if ($this->status !== null) {
            $query['status'] = $this->status->value;
        }
        if ($this->documentId !== null) {
            $query['document_id'] = $this->documentId;
        }

        return $query;
    }
}
