<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\ContentType;
use GoSuccess\Easybill\Enum\WebHookEvent;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json WebHook
 */
final readonly class WebHook extends AbstractModel
{
    public function __construct(
        public ?ContentType $contentType = null,
        public ?string $description = null,
        /** @var list<WebHookEvent> */
        public array $events = [],
        public ?int $id = null,
        public ?bool $isActive = null,
        public ?WebHookLastResponse $lastResponse = null,
        public ?string $secret = null,
        public ?string $url = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            contentType: self::asEnum(ContentType::class, $data['content_type'] ?? null),
            description: self::asString($data['description'] ?? null),
            events: self::asEnumList(WebHookEvent::class, $data['events'] ?? null),
            id: self::asInt($data['id'] ?? null),
            isActive: self::asBool($data['is_active'] ?? null),
            lastResponse: self::asModel(WebHookLastResponse::class, $data['last_response'] ?? null),
            secret: self::asString($data['secret'] ?? null),
            url: self::asString($data['url'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->contentType !== null) {
            $data['content_type'] = $this->contentType->value;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->events !== []) {
            $data['events'] = array_map(static fn(WebHookEvent $item) => $item->value, $this->events);
        }
        if ($this->isActive !== null) {
            $data['is_active'] = $this->isActive;
        }
        if ($this->lastResponse !== null) {
            $data['last_response'] = $this->lastResponse->toArray();
        }
        if ($this->secret !== null) {
            $data['secret'] = $this->secret;
        }
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }

        return $data;
    }
}
