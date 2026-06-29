<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json TextTemplate
 */
final readonly class TextTemplate extends AbstractModel
{
    public function __construct(
        public ?bool $canModify = null,
        public ?int $id = null,
        public ?string $text = null,
        public ?string $title = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            canModify: self::asBool($data['can_modify'] ?? null),
            id: self::asInt($data['id'] ?? null),
            text: self::asString($data['text'] ?? null),
            title: self::asString($data['title'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->text !== null) {
            $data['text'] = $this->text;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }

        return $data;
    }
}
