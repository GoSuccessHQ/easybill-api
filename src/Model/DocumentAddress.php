<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentAddress
 */
final readonly class DocumentAddress extends AbstractModel
{
    public function __construct(
        public ?int $salutation = null,
        public ?bool $personal = null,
        public ?string $title = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $suffix1 = null,
        public ?string $suffix2 = null,
        public ?string $companyName = null,
        public ?string $street = null,
        public ?string $zipCode = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $country = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            salutation: self::asInt($data['salutation'] ?? null),
            personal: self::asBool($data['personal'] ?? null),
            title: self::asString($data['title'] ?? null),
            firstName: self::asString($data['first_name'] ?? null),
            lastName: self::asString($data['last_name'] ?? null),
            suffix1: self::asString($data['suffix_1'] ?? null),
            suffix2: self::asString($data['suffix_2'] ?? null),
            companyName: self::asString($data['company_name'] ?? null),
            street: self::asString($data['street'] ?? null),
            zipCode: self::asString($data['zip_code'] ?? null),
            city: self::asString($data['city'] ?? null),
            state: self::asString($data['state'] ?? null),
            country: self::asString($data['country'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
