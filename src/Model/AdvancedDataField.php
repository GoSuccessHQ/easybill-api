<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json AdvancedDataField
 */
final readonly class AdvancedDataField extends AbstractModel
{
    public ?string $identifier;
    public ?string $value;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $identifier = Undefined::Value,
        string|Undefined|null $value = Undefined::Value,
    ) {
        $this->identifier = $identifier instanceof Undefined ? null : $identifier;
        $this->value = $value instanceof Undefined ? null : $value;
        $this->explicit = self::explicitFields([
            'identifier' => $identifier,
            'value' => $value,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            identifier: self::asString($data['identifier'] ?? null) ?? Undefined::Value,
            value: self::asString($data['value'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->identifier !== null) {
            $data['identifier'] = $this->identifier;
        } elseif (isset($this->explicit['identifier'])) {
            $data['identifier'] = null;
        }
        if ($this->value !== null) {
            $data['value'] = $this->value;
        } elseif (isset($this->explicit['value'])) {
            $data['value'] = null;
        }

        return $data;
    }
}
