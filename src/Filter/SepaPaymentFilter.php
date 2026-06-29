<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class SepaPaymentFilter
{
    public function __construct(
        public ?string $documentId = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->documentId !== null) {
            $query['document_id'] = $this->documentId;
        }

        return $query;
    }
}
