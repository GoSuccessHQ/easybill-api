<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentAddress
 */
final readonly class DocumentAddress extends AbstractModel
{
    public ?int $salutation;
    public ?bool $personal;
    public ?string $title;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $suffix1;
    public ?string $suffix2;
    public ?string $companyName;
    public ?string $street;
    public ?string $zipCode;
    public ?string $city;
    public ?string $state;
    public ?string $country;

    public function __construct(
        ?int $salutation = null,
        ?bool $personal = null,
        ?string $title = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $suffix1 = null,
        ?string $suffix2 = null,
        ?string $companyName = null,
        ?string $street = null,
        ?string $zipCode = null,
        ?string $city = null,
        ?string $state = null,
        ?string $country = null,
    ) {
        $this->salutation = $salutation;
        $this->personal = $personal;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->suffix1 = $suffix1;
        $this->suffix2 = $suffix2;
        $this->companyName = $companyName;
        $this->street = $street;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

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
