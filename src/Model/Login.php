<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\LoginType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Login
 */
final readonly class Login extends AbstractModel
{
    public ?int $id;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $displayName;
    public ?string $phone;
    public ?string $email;
    public ?string $emailSignature;
    public ?LoginType $loginType;
    public ?string $locale;
    public ?string $timeZone;
    public ?LoginSecurity $security;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        string|Undefined|null $firstName = Undefined::Value,
        string|Undefined|null $lastName = Undefined::Value,
        ?string $displayName = null,
        string|Undefined|null $phone = Undefined::Value,
        string|Undefined|null $email = Undefined::Value,
        string|Undefined|null $emailSignature = Undefined::Value,
        LoginType|Undefined|null $loginType = Undefined::Value,
        string|Undefined|null $locale = Undefined::Value,
        string|Undefined|null $timeZone = Undefined::Value,
        LoginSecurity|Undefined|null $security = Undefined::Value,
    ) {
        $this->id = $id;
        $this->firstName = $firstName instanceof Undefined ? null : $firstName;
        $this->lastName = $lastName instanceof Undefined ? null : $lastName;
        $this->displayName = $displayName;
        $this->phone = $phone instanceof Undefined ? null : $phone;
        $this->email = $email instanceof Undefined ? null : $email;
        $this->emailSignature = $emailSignature instanceof Undefined ? null : $emailSignature;
        $this->loginType = $loginType instanceof Undefined ? null : $loginType;
        $this->locale = $locale instanceof Undefined ? null : $locale;
        $this->timeZone = $timeZone instanceof Undefined ? null : $timeZone;
        $this->security = $security instanceof Undefined ? null : $security;
        $this->explicit = self::explicitFields([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone' => $phone,
            'email' => $email,
            'email_signature' => $emailSignature,
            'login_type' => $loginType,
            'locale' => $locale,
            'time_zone' => $timeZone,
            'security' => $security,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            firstName: self::asString($data['first_name'] ?? null) ?? Undefined::Value,
            lastName: self::asString($data['last_name'] ?? null) ?? Undefined::Value,
            displayName: self::asString($data['display_name'] ?? null),
            phone: self::asString($data['phone'] ?? null) ?? Undefined::Value,
            email: self::asString($data['email'] ?? null) ?? Undefined::Value,
            emailSignature: self::asString($data['email_signature'] ?? null) ?? Undefined::Value,
            loginType: self::asEnum(LoginType::class, $data['login_type'] ?? null) ?? Undefined::Value,
            locale: self::asString($data['locale'] ?? null) ?? Undefined::Value,
            timeZone: self::asString($data['time_zone'] ?? null) ?? Undefined::Value,
            security: self::asModel(LoginSecurity::class, $data['security'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
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
        if ($this->phone !== null) {
            $data['phone'] = $this->phone;
        } elseif (isset($this->explicit['phone'])) {
            $data['phone'] = null;
        }
        if ($this->email !== null) {
            $data['email'] = $this->email;
        } elseif (isset($this->explicit['email'])) {
            $data['email'] = null;
        }
        if ($this->emailSignature !== null) {
            $data['email_signature'] = $this->emailSignature;
        } elseif (isset($this->explicit['email_signature'])) {
            $data['email_signature'] = null;
        }
        if ($this->loginType !== null) {
            $data['login_type'] = $this->loginType->value;
        } elseif (isset($this->explicit['login_type'])) {
            $data['login_type'] = null;
        }
        if ($this->locale !== null) {
            $data['locale'] = $this->locale;
        } elseif (isset($this->explicit['locale'])) {
            $data['locale'] = null;
        }
        if ($this->timeZone !== null) {
            $data['time_zone'] = $this->timeZone;
        } elseif (isset($this->explicit['time_zone'])) {
            $data['time_zone'] = null;
        }
        if ($this->security !== null) {
            $nested = $this->security->toArray();

            if ($nested !== []) {
                $data['security'] = $nested;
            }
        } elseif (isset($this->explicit['security'])) {
            $data['security'] = null;
        }

        return $data;
    }
}
