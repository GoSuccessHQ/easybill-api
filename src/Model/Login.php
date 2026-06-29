<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\LoginType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Login
 */
final readonly class Login extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $displayName = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $emailSignature = null,
        public ?LoginType $loginType = null,
        public ?string $locale = null,
        public ?string $timeZone = null,
        public ?LoginSecurity $security = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            firstName: self::asString($data['first_name'] ?? null),
            lastName: self::asString($data['last_name'] ?? null),
            displayName: self::asString($data['display_name'] ?? null),
            phone: self::asString($data['phone'] ?? null),
            email: self::asString($data['email'] ?? null),
            emailSignature: self::asString($data['email_signature'] ?? null),
            loginType: self::asEnum(LoginType::class, $data['login_type'] ?? null),
            locale: self::asString($data['locale'] ?? null),
            timeZone: self::asString($data['time_zone'] ?? null),
            security: self::asModel(LoginSecurity::class, $data['security'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->firstName !== null) {
            $data['first_name'] = $this->firstName;
        }
        if ($this->lastName !== null) {
            $data['last_name'] = $this->lastName;
        }
        if ($this->phone !== null) {
            $data['phone'] = $this->phone;
        }
        if ($this->email !== null) {
            $data['email'] = $this->email;
        }
        if ($this->emailSignature !== null) {
            $data['email_signature'] = $this->emailSignature;
        }
        if ($this->loginType !== null) {
            $data['login_type'] = $this->loginType->value;
        }
        if ($this->locale !== null) {
            $data['locale'] = $this->locale;
        }
        if ($this->timeZone !== null) {
            $data['time_zone'] = $this->timeZone;
        }
        if ($this->security !== null) {
            $nested = $this->security->toArray();

            if ($nested !== []) {
                $data['security'] = $nested;
            }
        }

        return $data;
    }
}
