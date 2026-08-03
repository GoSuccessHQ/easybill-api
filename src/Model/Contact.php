<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Contact
 */
final readonly class Contact extends AbstractModel
{
    public ?string $city;
    public ?string $state;
    public ?string $companyName;
    public ?string $country;
    public ?string $department;
    /** @var list<string> */
    public array $emails;
    public ?string $fax;
    public ?string $firstName;
    public ?int $id;
    public ?string $lastName;
    public ?int $loginId;
    public ?string $mobile;
    public ?string $note;
    public ?bool $personal;
    public ?string $phone1;
    public ?string $phone2;
    public ?int $salutation;
    public ?string $street;
    public ?string $suffix1;
    public ?string $suffix2;
    public ?string $title;
    public ?string $zipCode;
    public ?string $createdAt;
    public ?string $updatedAt;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<string>|Undefined $emails
     */
    public function __construct(
        string|Undefined|null $city = Undefined::Value,
        string|Undefined|null $state = Undefined::Value,
        string|Undefined|null $companyName = Undefined::Value,
        string|Undefined|null $country = Undefined::Value,
        string|Undefined|null $department = Undefined::Value,
        array|Undefined $emails = Undefined::Value,
        string|Undefined|null $fax = Undefined::Value,
        string|Undefined|null $firstName = Undefined::Value,
        ?int $id = null,
        string|Undefined|null $lastName = Undefined::Value,
        ?int $loginId = null,
        string|Undefined|null $mobile = Undefined::Value,
        string|Undefined|null $note = Undefined::Value,
        bool|Undefined|null $personal = Undefined::Value,
        string|Undefined|null $phone1 = Undefined::Value,
        string|Undefined|null $phone2 = Undefined::Value,
        int|Undefined|null $salutation = Undefined::Value,
        string|Undefined|null $street = Undefined::Value,
        string|Undefined|null $suffix1 = Undefined::Value,
        string|Undefined|null $suffix2 = Undefined::Value,
        string|Undefined|null $title = Undefined::Value,
        string|Undefined|null $zipCode = Undefined::Value,
        ?string $createdAt = null,
        ?string $updatedAt = null,
    ) {
        $this->city = $city instanceof Undefined ? null : $city;
        $this->state = $state instanceof Undefined ? null : $state;
        $this->companyName = $companyName instanceof Undefined ? null : $companyName;
        $this->country = $country instanceof Undefined ? null : $country;
        $this->department = $department instanceof Undefined ? null : $department;
        $this->emails = $emails instanceof Undefined ? [] : $emails;
        $this->fax = $fax instanceof Undefined ? null : $fax;
        $this->firstName = $firstName instanceof Undefined ? null : $firstName;
        $this->id = $id;
        $this->lastName = $lastName instanceof Undefined ? null : $lastName;
        $this->loginId = $loginId;
        $this->mobile = $mobile instanceof Undefined ? null : $mobile;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->personal = $personal instanceof Undefined ? null : $personal;
        $this->phone1 = $phone1 instanceof Undefined ? null : $phone1;
        $this->phone2 = $phone2 instanceof Undefined ? null : $phone2;
        $this->salutation = $salutation instanceof Undefined ? null : $salutation;
        $this->street = $street instanceof Undefined ? null : $street;
        $this->suffix1 = $suffix1 instanceof Undefined ? null : $suffix1;
        $this->suffix2 = $suffix2 instanceof Undefined ? null : $suffix2;
        $this->title = $title instanceof Undefined ? null : $title;
        $this->zipCode = $zipCode instanceof Undefined ? null : $zipCode;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->explicit = self::explicitFields([
            'city' => $city,
            'state' => $state,
            'company_name' => $companyName,
            'country' => $country,
            'department' => $department,
            'emails' => $emails,
            'fax' => $fax,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'mobile' => $mobile,
            'note' => $note,
            'personal' => $personal,
            'phone_1' => $phone1,
            'phone_2' => $phone2,
            'salutation' => $salutation,
            'street' => $street,
            'suffix_1' => $suffix1,
            'suffix_2' => $suffix2,
            'title' => $title,
            'zip_code' => $zipCode,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            city: self::asString($data['city'] ?? null) ?? Undefined::Value,
            state: self::asString($data['state'] ?? null) ?? Undefined::Value,
            companyName: self::asString($data['company_name'] ?? null) ?? Undefined::Value,
            country: self::asString($data['country'] ?? null) ?? Undefined::Value,
            department: self::asString($data['department'] ?? null) ?? Undefined::Value,
            emails: self::asStringList($data['emails'] ?? null) ?: Undefined::Value,
            fax: self::asString($data['fax'] ?? null) ?? Undefined::Value,
            firstName: self::asString($data['first_name'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            lastName: self::asString($data['last_name'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null),
            mobile: self::asString($data['mobile'] ?? null) ?? Undefined::Value,
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            personal: self::asBool($data['personal'] ?? null) ?? Undefined::Value,
            phone1: self::asString($data['phone_1'] ?? null) ?? Undefined::Value,
            phone2: self::asString($data['phone_2'] ?? null) ?? Undefined::Value,
            salutation: self::asInt($data['salutation'] ?? null) ?? Undefined::Value,
            street: self::asString($data['street'] ?? null) ?? Undefined::Value,
            suffix1: self::asString($data['suffix_1'] ?? null) ?? Undefined::Value,
            suffix2: self::asString($data['suffix_2'] ?? null) ?? Undefined::Value,
            title: self::asString($data['title'] ?? null) ?? Undefined::Value,
            zipCode: self::asString($data['zip_code'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->city !== null) {
            $data['city'] = $this->city;
        } elseif (isset($this->explicit['city'])) {
            $data['city'] = null;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        } elseif (isset($this->explicit['state'])) {
            $data['state'] = null;
        }
        if ($this->companyName !== null) {
            $data['company_name'] = $this->companyName;
        } elseif (isset($this->explicit['company_name'])) {
            $data['company_name'] = null;
        }
        if ($this->country !== null) {
            $data['country'] = $this->country;
        } elseif (isset($this->explicit['country'])) {
            $data['country'] = null;
        }
        if ($this->department !== null) {
            $data['department'] = $this->department;
        } elseif (isset($this->explicit['department'])) {
            $data['department'] = null;
        }
        if ($this->emails !== []) {
            $data['emails'] = $this->emails;
        } elseif (isset($this->explicit['emails'])) {
            $data['emails'] = [];
        }
        if ($this->fax !== null) {
            $data['fax'] = $this->fax;
        } elseif (isset($this->explicit['fax'])) {
            $data['fax'] = null;
        }
        if ($this->firstName !== null) {
            $data['first_name'] = $this->firstName;
        } elseif (isset($this->explicit['first_name'])) {
            $data['first_name'] = null;
        }
        if ($this->lastName !== null) {
            $data['last_name'] = $this->lastName;
        } elseif (isset($this->explicit['last_name'])) {
            $data['last_name'] = null;
        }
        if ($this->mobile !== null) {
            $data['mobile'] = $this->mobile;
        } elseif (isset($this->explicit['mobile'])) {
            $data['mobile'] = null;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->personal !== null) {
            $data['personal'] = $this->personal;
        } elseif (isset($this->explicit['personal'])) {
            $data['personal'] = null;
        }
        if ($this->phone1 !== null) {
            $data['phone_1'] = $this->phone1;
        } elseif (isset($this->explicit['phone_1'])) {
            $data['phone_1'] = null;
        }
        if ($this->phone2 !== null) {
            $data['phone_2'] = $this->phone2;
        } elseif (isset($this->explicit['phone_2'])) {
            $data['phone_2'] = null;
        }
        if ($this->salutation !== null) {
            $data['salutation'] = $this->salutation;
        } elseif (isset($this->explicit['salutation'])) {
            $data['salutation'] = null;
        }
        if ($this->street !== null) {
            $data['street'] = $this->street;
        } elseif (isset($this->explicit['street'])) {
            $data['street'] = null;
        }
        if ($this->suffix1 !== null) {
            $data['suffix_1'] = $this->suffix1;
        } elseif (isset($this->explicit['suffix_1'])) {
            $data['suffix_1'] = null;
        }
        if ($this->suffix2 !== null) {
            $data['suffix_2'] = $this->suffix2;
        } elseif (isset($this->explicit['suffix_2'])) {
            $data['suffix_2'] = null;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        } elseif (isset($this->explicit['title'])) {
            $data['title'] = null;
        }
        if ($this->zipCode !== null) {
            $data['zip_code'] = $this->zipCode;
        } elseif (isset($this->explicit['zip_code'])) {
            $data['zip_code'] = null;
        }

        return $data;
    }
}
