<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplateSettingsEmail
 */
final readonly class PDFTemplateSettingsEmail extends AbstractModel
{
    public ?string $subject;
    public ?string $message;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $subject = Undefined::Value,
        string|Undefined|null $message = Undefined::Value,
    ) {
        $this->subject = $subject instanceof Undefined ? null : $subject;
        $this->message = $message instanceof Undefined ? null : $message;
        $this->explicit = self::explicitFields([
            'subject' => $subject,
            'message' => $message,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            subject: self::asString($data['subject'] ?? null) ?? Undefined::Value,
            message: self::asString($data['message'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        } elseif (isset($this->explicit['subject'])) {
            $data['subject'] = null;
        }
        if ($this->message !== null) {
            $data['message'] = $this->message;
        } elseif (isset($this->explicit['message'])) {
            $data['message'] = null;
        }

        return $data;
    }
}
