<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\ServiceDateType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json ServiceDate
 */
final readonly class ServiceDate extends AbstractModel
{
    public ?ServiceDateType $type;
    public ?string $date;
    public ?string $dateFrom;
    public ?string $dateTo;
    public ?string $text;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ServiceDateType|Undefined|null $type = Undefined::Value,
        string|Undefined|null $date = Undefined::Value,
        string|Undefined|null $dateFrom = Undefined::Value,
        string|Undefined|null $dateTo = Undefined::Value,
        string|Undefined|null $text = Undefined::Value,
    ) {
        $this->type = $type instanceof Undefined ? null : $type;
        $this->date = $date instanceof Undefined ? null : $date;
        $this->dateFrom = $dateFrom instanceof Undefined ? null : $dateFrom;
        $this->dateTo = $dateTo instanceof Undefined ? null : $dateTo;
        $this->text = $text instanceof Undefined ? null : $text;
        $this->explicit = self::explicitFields([
            'type' => $type,
            'date' => $date,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'text' => $text,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            type: self::asEnum(ServiceDateType::class, $data['type'] ?? null) ?? Undefined::Value,
            date: self::asString($data['date'] ?? null) ?? Undefined::Value,
            dateFrom: self::asString($data['date_from'] ?? null) ?? Undefined::Value,
            dateTo: self::asString($data['date_to'] ?? null) ?? Undefined::Value,
            text: self::asString($data['text'] ?? null) ?? Undefined::Value,
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
        if ($this->date !== null) {
            $data['date'] = $this->date;
        } elseif (isset($this->explicit['date'])) {
            $data['date'] = null;
        }
        if ($this->dateFrom !== null) {
            $data['date_from'] = $this->dateFrom;
        } elseif (isset($this->explicit['date_from'])) {
            $data['date_from'] = null;
        }
        if ($this->dateTo !== null) {
            $data['date_to'] = $this->dateTo;
        } elseif (isset($this->explicit['date_to'])) {
            $data['date_to'] = null;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        } elseif (isset($this->explicit['text'])) {
            $data['text'] = null;
        }

        return $data;
    }
}
