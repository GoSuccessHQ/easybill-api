<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Filter;

/**
 * Typed query filters for the corresponding list endpoint.
 */
final readonly class TimeTrackingFilter
{
    public function __construct(
        public ?string $loginId = null,
        public ?string $projectId = null,
        public ?string $dateFromAt = null,
        public ?string $dateThruAt = null,
    ) {}

    /**
     * @return array<string, scalar|null>
     */
    public function toQuery(): array
    {
        $query = [];
        if ($this->loginId !== null) {
            $query['login_id'] = $this->loginId;
        }
        if ($this->projectId !== null) {
            $query['project_id'] = $this->projectId;
        }
        if ($this->dateFromAt !== null) {
            $query['date_from_at'] = $this->dateFromAt;
        }
        if ($this->dateThruAt !== null) {
            $query['date_thru_at'] = $this->dateThruAt;
        }

        return $query;
    }
}
