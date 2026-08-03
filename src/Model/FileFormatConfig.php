<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\FileFormatConfigType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json FileFormatConfig
 */
final readonly class FileFormatConfig extends AbstractModel
{
    public ?FileFormatConfigType $type;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        FileFormatConfigType|Undefined|null $type = Undefined::Value,
    ) {
        $this->type = $type instanceof Undefined ? null : $type;
        $this->explicit = self::explicitFields([
            'type' => $type,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            type: self::asEnum(FileFormatConfigType::class, $data['type'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }

        return $data;
    }
}
