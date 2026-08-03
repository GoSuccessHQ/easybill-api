<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json TextTemplate
 */
final readonly class TextTemplate extends AbstractModel
{
    public ?bool $canModify;
    public ?int $id;
    public ?string $text;
    public ?string $title;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?bool $canModify = null,
        ?int $id = null,
        string|Undefined|null $text = Undefined::Value,
        string|Undefined|null $title = Undefined::Value,
    ) {
        $this->canModify = $canModify;
        $this->id = $id;
        $this->text = $text instanceof Undefined ? null : $text;
        $this->title = $title instanceof Undefined ? null : $title;
        $this->explicit = self::explicitFields([
            'text' => $text,
            'title' => $title,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            canModify: self::asBool($data['can_modify'] ?? null),
            id: self::asInt($data['id'] ?? null),
            text: self::asString($data['text'] ?? null) ?? Undefined::Value,
            title: self::asString($data['title'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->text !== null) {
            $data['text'] = $this->text;
        } elseif (isset($this->explicit['text'])) {
            $data['text'] = null;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        } elseif (isset($this->explicit['title'])) {
            $data['title'] = null;
        }

        return $data;
    }
}
