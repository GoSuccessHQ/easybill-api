<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplateSettingsEmail
 */
final readonly class PDFTemplateSettingsEmail extends AbstractModel
{
    public function __construct(
        public ?string $subject = null,
        public ?string $message = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            subject: self::asString($data['subject'] ?? null),
            message: self::asString($data['message'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        }
        if ($this->message !== null) {
            $data['message'] = $this->message;
        }

        return $data;
    }
}
