<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class SerialNumberFilter
{
    public function __construct(
        public ?string $positionId = null,
        public ?string $documentId = null,
        public ?bool $inUse = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->positionId !== null) {
            $query['position_id'] = $this->positionId;
        }
        if ($this->documentId !== null) {
            $query['document_id'] = $this->documentId;
        }
        if ($this->inUse !== null) {
            $query['in_use'] = $this->inUse;
        }

        return $query;
    }
}
