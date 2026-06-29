<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class DocumentPaymentFilter
{
    public function __construct(
        public ?string $documentId = null,
        public ?string $paymentAt = null,
        public ?string $reference = null,
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
        if ($this->paymentAt !== null) {
            $query['payment_at'] = $this->paymentAt;
        }
        if ($this->reference !== null) {
            $query['reference'] = $this->reference;
        }

        return $query;
    }
}
