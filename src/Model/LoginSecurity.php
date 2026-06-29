<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json LoginSecurity
 */
final readonly class LoginSecurity extends AbstractModel
{
    public function __construct(
        public ?bool $twoFactorEnabled = null,
        public ?bool $recoveryCodesEnabled = null,
        public ?bool $notifyOnNewLoginEnabled = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            twoFactorEnabled: self::asBool($data['two_factor_enabled'] ?? null),
            recoveryCodesEnabled: self::asBool($data['recovery_codes_enabled'] ?? null),
            notifyOnNewLoginEnabled: self::asBool($data['notify_on_new_login_enabled'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
