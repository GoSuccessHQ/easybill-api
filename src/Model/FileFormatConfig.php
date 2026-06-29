<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\FileFormatConfigType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json FileFormatConfig
 */
final readonly class FileFormatConfig extends AbstractModel
{
    public function __construct(
        public ?FileFormatConfigType $type = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            type: self::asEnum(FileFormatConfigType::class, $data['type'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }

        return $data;
    }
}
