<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json WebHookLastResponse
 */
final readonly class WebHookLastResponse extends AbstractModel
{
    public function __construct(
        public ?string $date = null,
        public ?int $code = null,
        public ?string $response = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            date: self::asString($data['date'] ?? null),
            code: self::asInt($data['code'] ?? null),
            response: self::asString($data['response'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
