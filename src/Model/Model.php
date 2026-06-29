<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * Contract implemented by every API data model.
 */
interface Model
{
    /**
     * Build the model from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static;

    /**
     * Convert the model into a JSON-serializable payload.
     *
     * Read-only fields are omitted and `null` values are skipped, so the result
     * is suitable as a create or (partial) update request body.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
