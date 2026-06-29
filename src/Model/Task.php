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
    public function __construct(
        public ?TaskCategory $category = null,
        public ?string $categoryCustom = null,
        public ?string $createdAt = null,
        public ?int $customerId = null,
        public ?string $description = null,
        public ?int $documentId = null,
        public ?string $endAt = null,
        public ?string $finishAt = null,
        public ?int $id = null,
        public ?int $loginId = null,
        public ?string $name = null,
        public ?int $positionId = null,
        public ?TaskPriority $priority = null,
        public ?int $projectId = null,
        public ?string $startAt = null,
        public ?TaskStatus $status = null,
        public ?int $statusPercent = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            category: self::asEnum(TaskCategory::class, $data['category'] ?? null),
            categoryCustom: self::asString($data['category_custom'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null),
            description: self::asString($data['description'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            endAt: self::asString($data['end_at'] ?? null),
            finishAt: self::asString($data['finish_at'] ?? null),
            id: self::asInt($data['id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            name: self::asString($data['name'] ?? null),
            positionId: self::asInt($data['position_id'] ?? null),
            priority: self::asEnum(TaskPriority::class, $data['priority'] ?? null),
            projectId: self::asInt($data['project_id'] ?? null),
            startAt: self::asString($data['start_at'] ?? null),
            status: self::asEnum(TaskStatus::class, $data['status'] ?? null),
            statusPercent: self::asInt($data['status_percent'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->category !== null) {
            $data['category'] = $this->category->value;
        }
        if ($this->categoryCustom !== null) {
            $data['category_custom'] = $this->categoryCustom;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        }
        if ($this->endAt !== null) {
            $data['end_at'] = $this->endAt;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        }
        if ($this->priority !== null) {
            $data['priority'] = $this->priority->value;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        }
        if ($this->startAt !== null) {
            $data['start_at'] = $this->startAt;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        }
        if ($this->statusPercent !== null) {
            $data['status_percent'] = $this->statusPercent;
        }

        return $data;
    }
}
