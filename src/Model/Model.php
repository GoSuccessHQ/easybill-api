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
     * Read-only fields are always omitted, and so is every field the caller did
     * not provide — the result is therefore suitable as a create or partial
     * update body. A field explicitly passed as `null` (or `[]` for a list) is
     * serialized as such to clear it server-side; see {@see Undefined}.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
