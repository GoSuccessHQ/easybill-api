<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

use GoSuccess\Easybill\Enum\DocumentType;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class DocumentFilter
{
    public function __construct(
        public ?DocumentType $type = null,
        public ?bool $isDraft = null,
        public ?bool $isArchive = null,
        public ?string $customerId = null,
        public ?string $projectId = null,
        public ?string $refId = null,
        public ?string $documentDate = null,
        public ?string $paidAt = null,
        public ?string $title = null,
        public ?string $number = null,
        public ?string $cancelId = null,
        public ?string $fulfillmentCountry = null,
        public ?string $vatCountry = null,
        public ?string $shippingCountry = null,
        public ?string $status = null,
        public ?string $editedAt = null,
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
        if ($this->isDraft !== null) {
            $query['is_draft'] = $this->isDraft ? '1' : '0';
        }
        if ($this->isArchive !== null) {
            $query['is_archive'] = $this->isArchive ? '1' : '0';
        }
        if ($this->customerId !== null) {
            $query['customer_id'] = $this->customerId;
        }
        if ($this->projectId !== null) {
            $query['project_id'] = $this->projectId;
        }
        if ($this->refId !== null) {
            $query['ref_id'] = $this->refId;
        }
        if ($this->documentDate !== null) {
            $query['document_date'] = $this->documentDate;
        }
        if ($this->paidAt !== null) {
            $query['paid_at'] = $this->paidAt;
        }
        if ($this->title !== null) {
            $query['title'] = $this->title;
        }
        if ($this->number !== null) {
            $query['number'] = $this->number;
        }
        if ($this->cancelId !== null) {
            $query['cancel_id'] = $this->cancelId;
        }
        if ($this->fulfillmentCountry !== null) {
            $query['fulfillment_country'] = $this->fulfillmentCountry;
        }
        if ($this->vatCountry !== null) {
            $query['vat_country'] = $this->vatCountry;
        }
        if ($this->shippingCountry !== null) {
            $query['shipping_country'] = $this->shippingCountry;
        }
        if ($this->status !== null) {
            $query['status'] = $this->status;
        }
        if ($this->editedAt !== null) {
            $query['edited_at'] = $this->editedAt;
        }

        return $query;
    }
}
