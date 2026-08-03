<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json TimeTracking
 */
final readonly class TimeTracking extends AbstractModel
{
    public ?string $clearedAt;
    public ?string $createdAt;
    public ?string $dateFromAt;
    public ?string $dateThruAt;
    public ?string $description;
    public ?float $hourlyRate;
    public ?int $id;
    public ?string $note;
    public ?string $number;
    public ?int $positionId;
    public ?int $projectId;
    public ?int $loginId;
    public ?int $timerValue;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $clearedAt = Undefined::Value,
        ?string $createdAt = null,
        string|Undefined|null $dateFromAt = Undefined::Value,
        string|Undefined|null $dateThruAt = Undefined::Value,
        string|Undefined|null $description = Undefined::Value,
        float|Undefined|null $hourlyRate = Undefined::Value,
        ?int $id = null,
        string|Undefined|null $note = Undefined::Value,
        string|Undefined|null $number = Undefined::Value,
        int|Undefined|null $positionId = Undefined::Value,
        int|Undefined|null $projectId = Undefined::Value,
        int|Undefined|null $loginId = Undefined::Value,
        int|Undefined|null $timerValue = Undefined::Value,
    ) {
        $this->clearedAt = $clearedAt instanceof Undefined ? null : $clearedAt;
        $this->createdAt = $createdAt;
        $this->dateFromAt = $dateFromAt instanceof Undefined ? null : $dateFromAt;
        $this->dateThruAt = $dateThruAt instanceof Undefined ? null : $dateThruAt;
        $this->description = $description instanceof Undefined ? null : $description;
        $this->hourlyRate = $hourlyRate instanceof Undefined ? null : $hourlyRate;
        $this->id = $id;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->number = $number instanceof Undefined ? null : $number;
        $this->positionId = $positionId instanceof Undefined ? null : $positionId;
        $this->projectId = $projectId instanceof Undefined ? null : $projectId;
        $this->loginId = $loginId instanceof Undefined ? null : $loginId;
        $this->timerValue = $timerValue instanceof Undefined ? null : $timerValue;
        $this->explicit = self::explicitFields([
            'cleared_at' => $clearedAt,
            'date_from_at' => $dateFromAt,
            'date_thru_at' => $dateThruAt,
            'description' => $description,
            'hourly_rate' => $hourlyRate,
            'note' => $note,
            'number' => $number,
            'position_id' => $positionId,
            'project_id' => $projectId,
            'login_id' => $loginId,
            'timer_value' => $timerValue,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            clearedAt: self::asString($data['cleared_at'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            dateFromAt: self::asString($data['date_from_at'] ?? null) ?? Undefined::Value,
            dateThruAt: self::asString($data['date_thru_at'] ?? null) ?? Undefined::Value,
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            hourlyRate: self::asFloat($data['hourly_rate'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            positionId: self::asInt($data['position_id'] ?? null) ?? Undefined::Value,
            projectId: self::asInt($data['project_id'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null) ?? Undefined::Value,
            timerValue: self::asInt($data['timer_value'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->clearedAt !== null) {
            $data['cleared_at'] = $this->clearedAt;
        } elseif (isset($this->explicit['cleared_at'])) {
            $data['cleared_at'] = null;
        }
        if ($this->dateFromAt !== null) {
            $data['date_from_at'] = $this->dateFromAt;
        } elseif (isset($this->explicit['date_from_at'])) {
            $data['date_from_at'] = null;
        }
        if ($this->dateThruAt !== null) {
            $data['date_thru_at'] = $this->dateThruAt;
        } elseif (isset($this->explicit['date_thru_at'])) {
            $data['date_thru_at'] = null;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        } elseif (isset($this->explicit['description'])) {
            $data['description'] = null;
        }
        if ($this->hourlyRate !== null) {
            $data['hourly_rate'] = $this->hourlyRate;
        } elseif (isset($this->explicit['hourly_rate'])) {
            $data['hourly_rate'] = null;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        } elseif (isset($this->explicit['number'])) {
            $data['number'] = null;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        } elseif (isset($this->explicit['position_id'])) {
            $data['position_id'] = null;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        } elseif (isset($this->explicit['project_id'])) {
            $data['project_id'] = null;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        } elseif (isset($this->explicit['login_id'])) {
            $data['login_id'] = null;
        }
        if ($this->timerValue !== null) {
            $data['timer_value'] = $this->timerValue;
        } elseif (isset($this->explicit['timer_value'])) {
            $data['timer_value'] = null;
        }

        return $data;
    }
}
