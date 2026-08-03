<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplateSettings
 */
final readonly class PDFTemplateSettings extends AbstractModel
{
    public ?string $textPrefix;
    public ?string $text;
    public ?PDFTemplateSettingsEmail $email;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $textPrefix = Undefined::Value,
        string|Undefined|null $text = Undefined::Value,
        PDFTemplateSettingsEmail|Undefined|null $email = Undefined::Value,
    ) {
        $this->textPrefix = $textPrefix instanceof Undefined ? null : $textPrefix;
        $this->text = $text instanceof Undefined ? null : $text;
        $this->email = $email instanceof Undefined ? null : $email;
        $this->explicit = self::explicitFields([
            'text_prefix' => $textPrefix,
            'text' => $text,
            'email' => $email,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            textPrefix: self::asString($data['text_prefix'] ?? null) ?? Undefined::Value,
            text: self::asString($data['text'] ?? null) ?? Undefined::Value,
            email: self::asModel(PDFTemplateSettingsEmail::class, $data['email'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->textPrefix !== null) {
            $data['text_prefix'] = $this->textPrefix;
        } elseif (isset($this->explicit['text_prefix'])) {
            $data['text_prefix'] = null;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        } elseif (isset($this->explicit['text'])) {
            $data['text'] = null;
        }
        if ($this->email !== null) {
            $nested = $this->email->toArray();

            if ($nested !== []) {
                $data['email'] = $nested;
            }
        } elseif (isset($this->explicit['email'])) {
            $data['email'] = null;
        }

        return $data;
    }
}
