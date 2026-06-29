<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class CustomerFilter
{
    public function __construct(
        public ?string $groupId = null,
        public ?string $additionalGroupId = null,
        public ?string $number = null,
        public ?string $country = null,
        public ?string $zipCode = null,
        public ?string $emails = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $companyName = null,
        public ?string $createdAt = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->groupId !== null) {
            $query['group_id'] = $this->groupId;
        }
        if ($this->additionalGroupId !== null) {
            $query['additional_group_id'] = $this->additionalGroupId;
        }
        if ($this->number !== null) {
            $query['number'] = $this->number;
        }
        if ($this->country !== null) {
            $query['country'] = $this->country;
        }
        if ($this->zipCode !== null) {
            $query['zip_code'] = $this->zipCode;
        }
        if ($this->emails !== null) {
            $query['emails'] = $this->emails;
        }
        if ($this->firstName !== null) {
            $query['first_name'] = $this->firstName;
        }
        if ($this->lastName !== null) {
            $query['last_name'] = $this->lastName;
        }
        if ($this->companyName !== null) {
            $query['company_name'] = $this->companyName;
        }
        if ($this->createdAt !== null) {
            $query['created_at'] = $this->createdAt;
        }

        return $query;
    }
}
