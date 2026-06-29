<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Contact
 */
final readonly class Contact extends AbstractModel
{
    public function __construct(
        public ?string $city = null,
        public ?string $state = null,
        public ?string $companyName = null,
        public ?string $country = null,
        public ?string $department = null,
        /** @var list<string> */
        public array $emails = [],
        public ?string $fax = null,
        public ?string $firstName = null,
        public ?int $id = null,
        public ?string $lastName = null,
        public ?int $loginId = null,
        public ?string $mobile = null,
        public ?string $note = null,
        public ?bool $personal = null,
        public ?string $phone1 = null,
        public ?string $phone2 = null,
        public ?int $salutation = null,
        public ?string $street = null,
        public ?string $suffix1 = null,
        public ?string $suffix2 = null,
        public ?string $title = null,
        public ?string $zipCode = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            city: self::asString($data['city'] ?? null),
            state: self::asString($data['state'] ?? null),
            companyName: self::asString($data['company_name'] ?? null),
            country: self::asString($data['country'] ?? null),
            department: self::asString($data['department'] ?? null),
            emails: self::asStringList($data['emails'] ?? null),
            fax: self::asString($data['fax'] ?? null),
            firstName: self::asString($data['first_name'] ?? null),
            id: self::asInt($data['id'] ?? null),
            lastName: self::asString($data['last_name'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            mobile: self::asString($data['mobile'] ?? null),
            note: self::asString($data['note'] ?? null),
            personal: self::asBool($data['personal'] ?? null),
            phone1: self::asString($data['phone_1'] ?? null),
            phone2: self::asString($data['phone_2'] ?? null),
            salutation: self::asInt($data['salutation'] ?? null),
            street: self::asString($data['street'] ?? null),
            suffix1: self::asString($data['suffix_1'] ?? null),
            suffix2: self::asString($data['suffix_2'] ?? null),
            title: self::asString($data['title'] ?? null),
            zipCode: self::asString($data['zip_code'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->city !== null) {
            $data['city'] = $this->city;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        }
        if ($this->companyName !== null) {
            $data['company_name'] = $this->companyName;
        }
        if ($this->country !== null) {
            $data['country'] = $this->country;
        }
        if ($this->department !== null) {
            $data['department'] = $this->department;
        }
        if ($this->emails !== []) {
            $data['emails'] = $this->emails;
        }
        if ($this->fax !== null) {
            $data['fax'] = $this->fax;
        }
        if ($this->firstName !== null) {
            $data['first_name'] = $this->firstName;
        }
        if ($this->lastName !== null) {
            $data['last_name'] = $this->lastName;
        }
        if ($this->mobile !== null) {
            $data['mobile'] = $this->mobile;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->personal !== null) {
            $data['personal'] = $this->personal;
        }
        if ($this->phone1 !== null) {
            $data['phone_1'] = $this->phone1;
        }
        if ($this->phone2 !== null) {
            $data['phone_2'] = $this->phone2;
        }
        if ($this->salutation !== null) {
            $data['salutation'] = $this->salutation;
        }
        if ($this->street !== null) {
            $data['street'] = $this->street;
        }
        if ($this->suffix1 !== null) {
            $data['suffix_1'] = $this->suffix1;
        }
        if ($this->suffix2 !== null) {
            $data['suffix_2'] = $this->suffix2;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->zipCode !== null) {
            $data['zip_code'] = $this->zipCode;
        }

        return $data;
    }
}
