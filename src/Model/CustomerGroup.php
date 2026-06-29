<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json CustomerGroup
 */
final readonly class CustomerGroup extends AbstractModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?string $number = null,
        public ?string $displayName = null,
        public ?int $id = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            name: self::asString($data['name'] ?? null),
            description: self::asString($data['description'] ?? null),
            number: self::asString($data['number'] ?? null),
            displayName: self::asString($data['display_name'] ?? null),
            id: self::asInt($data['id'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }

        return $data;
    }
}
