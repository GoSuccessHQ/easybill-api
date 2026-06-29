<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\ServiceDateType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json ServiceDate
 */
final readonly class ServiceDate extends AbstractModel
{
    public function __construct(
        public ?ServiceDateType $type = null,
        public ?string $date = null,
        public ?string $dateFrom = null,
        public ?string $dateTo = null,
        public ?string $text = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            type: self::asEnum(ServiceDateType::class, $data['type'] ?? null),
            date: self::asString($data['date'] ?? null),
            dateFrom: self::asString($data['date_from'] ?? null),
            dateTo: self::asString($data['date_to'] ?? null),
            text: self::asString($data['text'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }
        if ($this->date !== null) {
            $data['date'] = $this->date;
        }
        if ($this->dateFrom !== null) {
            $data['date_from'] = $this->dateFrom;
        }
        if ($this->dateTo !== null) {
            $data['date_to'] = $this->dateTo;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        }

        return $data;
    }
}
