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
    public ?int $budgetAmount;
    public ?int $budgetTime;
    public ?int $customerId;
    public ?float $hourlyRate;
    public ?int $id;
    public ?int $loginId;
    public ?string $name;
    public ?string $note;
    public ?ProjectStatus $status;
    public ?string $dueAt;
    public ?BudgetNotifyFrequency $budgetNotifyFrequency;
    public ?int $consumedTime;
    public ?int $consumedAmount;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        int|Undefined|null $budgetAmount = Undefined::Value,
        int|Undefined|null $budgetTime = Undefined::Value,
        int|Undefined|null $customerId = Undefined::Value,
        float|Undefined|null $hourlyRate = Undefined::Value,
        ?int $id = null,
        int|Undefined|null $loginId = Undefined::Value,
        string|Undefined|null $name = Undefined::Value,
        string|Undefined|null $note = Undefined::Value,
        ProjectStatus|Undefined|null $status = Undefined::Value,
        string|Undefined|null $dueAt = Undefined::Value,
        BudgetNotifyFrequency|Undefined|null $budgetNotifyFrequency = Undefined::Value,
        ?int $consumedTime = null,
        ?int $consumedAmount = null,
    ) {
        $this->budgetAmount = $budgetAmount instanceof Undefined ? null : $budgetAmount;
        $this->budgetTime = $budgetTime instanceof Undefined ? null : $budgetTime;
        $this->customerId = $customerId instanceof Undefined ? null : $customerId;
        $this->hourlyRate = $hourlyRate instanceof Undefined ? null : $hourlyRate;
        $this->id = $id;
        $this->loginId = $loginId instanceof Undefined ? null : $loginId;
        $this->name = $name instanceof Undefined ? null : $name;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->status = $status instanceof Undefined ? null : $status;
        $this->dueAt = $dueAt instanceof Undefined ? null : $dueAt;
        $this->budgetNotifyFrequency = $budgetNotifyFrequency instanceof Undefined ? null : $budgetNotifyFrequency;
        $this->consumedTime = $consumedTime;
        $this->consumedAmount = $consumedAmount;
        $this->explicit = self::explicitFields([
            'budget_amount' => $budgetAmount,
            'budget_time' => $budgetTime,
            'customer_id' => $customerId,
            'hourly_rate' => $hourlyRate,
            'login_id' => $loginId,
            'name' => $name,
            'note' => $note,
            'status' => $status,
            'due_at' => $dueAt,
            'budget_notify_frequency' => $budgetNotifyFrequency,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            budgetAmount: self::asInt($data['budget_amount'] ?? null) ?? Undefined::Value,
            budgetTime: self::asInt($data['budget_time'] ?? null) ?? Undefined::Value,
            customerId: self::asInt($data['customer_id'] ?? null) ?? Undefined::Value,
            hourlyRate: self::asFloat($data['hourly_rate'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null) ?? Undefined::Value,
            name: self::asString($data['name'] ?? null) ?? Undefined::Value,
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            status: self::asEnum(ProjectStatus::class, $data['status'] ?? null) ?? Undefined::Value,
            dueAt: self::asString($data['due_at'] ?? null) ?? Undefined::Value,
            budgetNotifyFrequency: self::asEnum(BudgetNotifyFrequency::class, $data['budget_notify_frequency'] ?? null) ?? Undefined::Value,
            consumedTime: self::asInt($data['consumed_time'] ?? null),
            consumedAmount: self::asInt($data['consumed_amount'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->budgetAmount !== null) {
            $data['budget_amount'] = $this->budgetAmount;
        } elseif (isset($this->explicit['budget_amount'])) {
            $data['budget_amount'] = null;
        }
        if ($this->budgetTime !== null) {
            $data['budget_time'] = $this->budgetTime;
        } elseif (isset($this->explicit['budget_time'])) {
            $data['budget_time'] = null;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        } elseif (isset($this->explicit['customer_id'])) {
            $data['customer_id'] = null;
        }
        if ($this->hourlyRate !== null) {
            $data['hourly_rate'] = $this->hourlyRate;
        } elseif (isset($this->explicit['hourly_rate'])) {
            $data['hourly_rate'] = null;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        } elseif (isset($this->explicit['login_id'])) {
            $data['login_id'] = null;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        } elseif (isset($this->explicit['name'])) {
            $data['name'] = null;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        } elseif (isset($this->explicit['status'])) {
            $data['status'] = null;
        }
        if ($this->dueAt !== null) {
            $data['due_at'] = $this->dueAt;
        } elseif (isset($this->explicit['due_at'])) {
            $data['due_at'] = null;
        }
        if ($this->budgetNotifyFrequency !== null) {
            $data['budget_notify_frequency'] = $this->budgetNotifyFrequency->value;
        } elseif (isset($this->explicit['budget_notify_frequency'])) {
            $data['budget_notify_frequency'] = null;
        }

        return $data;
    }
}
