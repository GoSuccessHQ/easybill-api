<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json AdvancedDataField
 */
final readonly class AdvancedDataField extends AbstractModel
{
    public function __construct(
        public ?string $identifier = null,
        public ?string $value = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            identifier: self::asString($data['identifier'] ?? null),
            value: self::asString($data['value'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->identifier !== null) {
            $data['identifier'] = $this->identifier;
        }
        if ($this->value !== null) {
            $data['value'] = $this->value;
        }

        return $data;
    }
}
