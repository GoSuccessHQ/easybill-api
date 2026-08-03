<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\TaskCategory;
use GoSuccess\Easybill\Enum\TaskPriority;
use GoSuccess\Easybill\Enum\TaskStatus;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Task
 */
final readonly class Task extends AbstractModel
{
    public ?TaskCategory $category;
    public ?string $categoryCustom;
    public ?string $createdAt;
    public ?int $customerId;
    public ?string $description;
    public ?int $documentId;
    public ?string $endAt;
    public ?string $finishAt;
    public ?int $id;
    public ?int $loginId;
    public ?string $name;
    public ?int $positionId;
    public ?TaskPriority $priority;
    public ?int $projectId;
    public ?string $startAt;
    public ?TaskStatus $status;
    public ?int $statusPercent;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        TaskCategory|Undefined|null $category = Undefined::Value,
        string|Undefined|null $categoryCustom = Undefined::Value,
        ?string $createdAt = null,
        int|Undefined|null $customerId = Undefined::Value,
        string|Undefined|null $description = Undefined::Value,
        int|Undefined|null $documentId = Undefined::Value,
        string|Undefined|null $endAt = Undefined::Value,
        ?string $finishAt = null,
        ?int $id = null,
        int|Undefined|null $loginId = Undefined::Value,
        string|Undefined|null $name = Undefined::Value,
        int|Undefined|null $positionId = Undefined::Value,
        TaskPriority|Undefined|null $priority = Undefined::Value,
        int|Undefined|null $projectId = Undefined::Value,
        string|Undefined|null $startAt = Undefined::Value,
        TaskStatus|Undefined|null $status = Undefined::Value,
        int|Undefined|null $statusPercent = Undefined::Value,
    ) {
        $this->category = $category instanceof Undefined ? null : $category;
        $this->categoryCustom = $categoryCustom instanceof Undefined ? null : $categoryCustom;
        $this->createdAt = $createdAt;
        $this->customerId = $customerId instanceof Undefined ? null : $customerId;
        $this->description = $description instanceof Undefined ? null : $description;
        $this->documentId = $documentId instanceof Undefined ? null : $documentId;
        $this->endAt = $endAt instanceof Undefined ? null : $endAt;
        $this->finishAt = $finishAt;
        $this->id = $id;
        $this->loginId = $loginId instanceof Undefined ? null : $loginId;
        $this->name = $name instanceof Undefined ? null : $name;
        $this->positionId = $positionId instanceof Undefined ? null : $positionId;
        $this->priority = $priority instanceof Undefined ? null : $priority;
        $this->projectId = $projectId instanceof Undefined ? null : $projectId;
        $this->startAt = $startAt instanceof Undefined ? null : $startAt;
        $this->status = $status instanceof Undefined ? null : $status;
        $this->statusPercent = $statusPercent instanceof Undefined ? null : $statusPercent;
        $this->explicit = self::explicitFields([
            'category' => $category,
            'category_custom' => $categoryCustom,
            'customer_id' => $customerId,
            'description' => $description,
            'document_id' => $documentId,
            'end_at' => $endAt,
            'login_id' => $loginId,
            'name' => $name,
            'position_id' => $positionId,
            'priority' => $priority,
            'project_id' => $projectId,
            'start_at' => $startAt,
            'status' => $status,
            'status_percent' => $statusPercent,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            category: self::asEnum(TaskCategory::class, $data['category'] ?? null) ?? Undefined::Value,
            categoryCustom: self::asString($data['category_custom'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null) ?? Undefined::Value,
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            documentId: self::asInt($data['document_id'] ?? null) ?? Undefined::Value,
            endAt: self::asString($data['end_at'] ?? null) ?? Undefined::Value,
            finishAt: self::asString($data['finish_at'] ?? null),
            id: self::asInt($data['id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null) ?? Undefined::Value,
            name: self::asString($data['name'] ?? null) ?? Undefined::Value,
            positionId: self::asInt($data['position_id'] ?? null) ?? Undefined::Value,
            priority: self::asEnum(TaskPriority::class, $data['priority'] ?? null) ?? Undefined::Value,
            projectId: self::asInt($data['project_id'] ?? null) ?? Undefined::Value,
            startAt: self::asString($data['start_at'] ?? null) ?? Undefined::Value,
            status: self::asEnum(TaskStatus::class, $data['status'] ?? null) ?? Undefined::Value,
            statusPercent: self::asInt($data['status_percent'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->category !== null) {
            $data['category'] = $this->category->value;
        } elseif (isset($this->explicit['category'])) {
            $data['category'] = null;
        }
        if ($this->categoryCustom !== null) {
            $data['category_custom'] = $this->categoryCustom;
        } elseif (isset($this->explicit['category_custom'])) {
            $data['category_custom'] = null;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        } elseif (isset($this->explicit['customer_id'])) {
            $data['customer_id'] = null;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        } elseif (isset($this->explicit['description'])) {
            $data['description'] = null;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        } elseif (isset($this->explicit['document_id'])) {
            $data['document_id'] = null;
        }
        if ($this->endAt !== null) {
            $data['end_at'] = $this->endAt;
        } elseif (isset($this->explicit['end_at'])) {
            $data['end_at'] = null;
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
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        } elseif (isset($this->explicit['position_id'])) {
            $data['position_id'] = null;
        }
        if ($this->priority !== null) {
            $data['priority'] = $this->priority->value;
        } elseif (isset($this->explicit['priority'])) {
            $data['priority'] = null;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        } elseif (isset($this->explicit['project_id'])) {
            $data['project_id'] = null;
        }
        if ($this->startAt !== null) {
            $data['start_at'] = $this->startAt;
        } elseif (isset($this->explicit['start_at'])) {
            $data['start_at'] = null;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        } elseif (isset($this->explicit['status'])) {
            $data['status'] = null;
        }
        if ($this->statusPercent !== null) {
            $data['status_percent'] = $this->statusPercent;
        } elseif (isset($this->explicit['status_percent'])) {
            $data['status_percent'] = null;
        }

        return $data;
    }
}
