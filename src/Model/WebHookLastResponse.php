<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json WebHookLastResponse
 */
final readonly class WebHookLastResponse extends AbstractModel
{
    public ?string $date;
    public ?int $code;
    public ?string $response;

    public function __construct(
        ?string $date = null,
        ?int $code = null,
        ?string $response = null,
    ) {
        $this->date = $date;
        $this->code = $code;
        $this->response = $response;
    }

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
