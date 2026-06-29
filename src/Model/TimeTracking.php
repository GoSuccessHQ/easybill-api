<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json TimeTracking
 */
final readonly class TimeTracking extends AbstractModel
{
    public function __construct(
        public ?string $clearedAt = null,
        public ?string $createdAt = null,
        public ?string $dateFromAt = null,
        public ?string $dateThruAt = null,
        public ?string $description = null,
        public ?float $hourlyRate = null,
        public ?int $id = null,
        public ?string $note = null,
        public ?string $number = null,
        public ?int $positionId = null,
        public ?int $projectId = null,
        public ?int $loginId = null,
        public ?int $timerValue = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            clearedAt: self::asString($data['cleared_at'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            dateFromAt: self::asString($data['date_from_at'] ?? null),
            dateThruAt: self::asString($data['date_thru_at'] ?? null),
            description: self::asString($data['description'] ?? null),
            hourlyRate: self::asFloat($data['hourly_rate'] ?? null),
            id: self::asInt($data['id'] ?? null),
            note: self::asString($data['note'] ?? null),
            number: self::asString($data['number'] ?? null),
            positionId: self::asInt($data['position_id'] ?? null),
            projectId: self::asInt($data['project_id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            timerValue: self::asInt($data['timer_value'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->clearedAt !== null) {
            $data['cleared_at'] = $this->clearedAt;
        }
        if ($this->dateFromAt !== null) {
            $data['date_from_at'] = $this->dateFromAt;
        }
        if ($this->dateThruAt !== null) {
            $data['date_thru_at'] = $this->dateThruAt;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->hourlyRate !== null) {
            $data['hourly_rate'] = $this->hourlyRate;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        }
        if ($this->timerValue !== null) {
            $data['timer_value'] = $this->timerValue;
        }

        return $data;
    }
}
