<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\BudgetNotifyFrequency;
use GoSuccess\Easybill\Enum\ProjectStatus;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Project
 */
final readonly class Project extends AbstractModel
{
    public function __construct(
        public ?int $budgetAmount = null,
        public ?int $budgetTime = null,
        public ?int $customerId = null,
        public ?float $hourlyRate = null,
        public ?int $id = null,
        public ?int $loginId = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?ProjectStatus $status = null,
        public ?string $dueAt = null,
        public ?BudgetNotifyFrequency $budgetNotifyFrequency = null,
        public ?int $consumedTime = null,
        public ?int $consumedAmount = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            budgetAmount: self::asInt($data['budget_amount'] ?? null),
            budgetTime: self::asInt($data['budget_time'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null),
            hourlyRate: self::asFloat($data['hourly_rate'] ?? null),
            id: self::asInt($data['id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            name: self::asString($data['name'] ?? null),
            note: self::asString($data['note'] ?? null),
            status: self::asEnum(ProjectStatus::class, $data['status'] ?? null),
            dueAt: self::asString($data['due_at'] ?? null),
            budgetNotifyFrequency: self::asEnum(BudgetNotifyFrequency::class, $data['budget_notify_frequency'] ?? null),
            consumedTime: self::asInt($data['consumed_time'] ?? null),
            consumedAmount: self::asInt($data['consumed_amount'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->budgetAmount !== null) {
            $data['budget_amount'] = $this->budgetAmount;
        }
        if ($this->budgetTime !== null) {
            $data['budget_time'] = $this->budgetTime;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->hourlyRate !== null) {
            $data['hourly_rate'] = $this->hourlyRate;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        }
        if ($this->dueAt !== null) {
            $data['due_at'] = $this->dueAt;
        }
        if ($this->budgetNotifyFrequency !== null) {
            $data['budget_notify_frequency'] = $this->budgetNotifyFrequency->value;
        }

        return $data;
    }
}
