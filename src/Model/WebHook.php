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
    public ?ContentType $contentType;
    public ?string $description;
    /** @var list<WebHookEvent> */
    public array $events;
    public ?int $id;
    public ?bool $isActive;
    public ?WebHookLastResponse $lastResponse;
    public ?string $secret;
    public ?string $url;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<WebHookEvent>|Undefined $events
     */
    public function __construct(
        ContentType|Undefined|null $contentType = Undefined::Value,
        string|Undefined|null $description = Undefined::Value,
        array|Undefined $events = Undefined::Value,
        ?int $id = null,
        bool|Undefined|null $isActive = Undefined::Value,
        WebHookLastResponse|Undefined|null $lastResponse = Undefined::Value,
        string|Undefined|null $secret = Undefined::Value,
        string|Undefined|null $url = Undefined::Value,
    ) {
        $this->contentType = $contentType instanceof Undefined ? null : $contentType;
        $this->description = $description instanceof Undefined ? null : $description;
        $this->events = $events instanceof Undefined ? [] : $events;
        $this->id = $id;
        $this->isActive = $isActive instanceof Undefined ? null : $isActive;
        $this->lastResponse = $lastResponse instanceof Undefined ? null : $lastResponse;
        $this->secret = $secret instanceof Undefined ? null : $secret;
        $this->url = $url instanceof Undefined ? null : $url;
        $this->explicit = self::explicitFields([
            'content_type' => $contentType,
            'description' => $description,
            'events' => $events,
            'is_active' => $isActive,
            'last_response' => $lastResponse,
            'secret' => $secret,
            'url' => $url,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            contentType: self::asEnum(ContentType::class, $data['content_type'] ?? null) ?? Undefined::Value,
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            events: self::asEnumList(WebHookEvent::class, $data['events'] ?? null) ?: Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            isActive: self::asBool($data['is_active'] ?? null) ?? Undefined::Value,
            lastResponse: self::asModel(WebHookLastResponse::class, $data['last_response'] ?? null) ?? Undefined::Value,
            secret: self::asString($data['secret'] ?? null) ?? Undefined::Value,
            url: self::asString($data['url'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->contentType !== null) {
            $data['content_type'] = $this->contentType->value;
        } elseif (isset($this->explicit['content_type'])) {
            $data['content_type'] = null;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        } elseif (isset($this->explicit['description'])) {
            $data['description'] = null;
        }
        if ($this->events !== []) {
            $data['events'] = array_map(static fn(WebHookEvent $item) => $item->value, $this->events);
        } elseif (isset($this->explicit['events'])) {
            $data['events'] = [];
        }
        if ($this->isActive !== null) {
            $data['is_active'] = $this->isActive;
        } elseif (isset($this->explicit['is_active'])) {
            $data['is_active'] = null;
        }
        if ($this->lastResponse !== null) {
            $nested = $this->lastResponse->toArray();

            if ($nested !== []) {
                $data['last_response'] = $nested;
            }
        } elseif (isset($this->explicit['last_response'])) {
            $data['last_response'] = null;
        }
        if ($this->secret !== null) {
            $data['secret'] = $this->secret;
        } elseif (isset($this->explicit['secret'])) {
            $data['secret'] = null;
        }
        if ($this->url !== null) {
            $data['url'] = $this->url;
        } elseif (isset($this->explicit['url'])) {
            $data['url'] = null;
        }

        return $data;
    }
}
