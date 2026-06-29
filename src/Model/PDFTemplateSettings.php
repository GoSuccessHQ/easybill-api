<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplateSettings
 */
final readonly class PDFTemplateSettings extends AbstractModel
{
    public function __construct(
        public ?string $textPrefix = null,
        public ?string $text = null,
        public ?PDFTemplateSettingsEmail $email = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            textPrefix: self::asString($data['text_prefix'] ?? null),
            text: self::asString($data['text'] ?? null),
            email: self::asModel(PDFTemplateSettingsEmail::class, $data['email'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->textPrefix !== null) {
            $data['text_prefix'] = $this->textPrefix;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        }
        if ($this->email !== null) {
            $nested = $this->email->toArray();

            if ($nested !== []) {
                $data['email'] = $nested;
            }
        }

        return $data;
    }
}
