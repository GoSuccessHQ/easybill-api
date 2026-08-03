<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PositionGroup
 */
final readonly class PositionGroup extends AbstractModel
{
    public ?string $description;
    public ?int $loginId;
    public ?string $name;
    public ?string $number;
    public ?string $displayName;
    public ?int $id;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $description = Undefined::Value,
        ?int $loginId = null,
        string|Undefined|null $name = Undefined::Value,
        string|Undefined|null $number = Undefined::Value,
        ?string $displayName = null,
        ?int $id = null,
    ) {
        $this->description = $description instanceof Undefined ? null : $description;
        $this->loginId = $loginId;
        $this->name = $name instanceof Undefined ? null : $name;
        $this->number = $number instanceof Undefined ? null : $number;
        $this->displayName = $displayName;
        $this->id = $id;
        $this->explicit = self::explicitFields([
            'description' => $description,
            'name' => $name,
            'number' => $number,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null),
            name: self::asString($data['name'] ?? null) ?? Undefined::Value,
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            displayName: self::asString($data['display_name'] ?? null),
            id: self::asInt($data['id'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->description !== null) {
            $data['description'] = $this->description;
        } elseif (isset($this->explicit['description'])) {
            $data['description'] = null;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        } elseif (isset($this->explicit['name'])) {
            $data['name'] = null;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        } elseif (isset($this->explicit['number'])) {
            $data['number'] = null;
        }

        return $data;
    }
}
