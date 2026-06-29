<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplate
 */
final readonly class PDFTemplate extends AbstractModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $pdfTemplate = null,
        public ?string $documentType = null,
        /** @var array<string, mixed>|null */
        public ?array $settings = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asString($data['id'] ?? null),
            name: self::asString($data['name'] ?? null),
            pdfTemplate: self::asString($data['pdf_template'] ?? null),
            documentType: self::asString($data['document_type'] ?? null),
            settings: self::asArray($data['settings'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->id !== null) {
            $data['id'] = $this->id;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->pdfTemplate !== null) {
            $data['pdf_template'] = $this->pdfTemplate;
        }
        if ($this->documentType !== null) {
            $data['document_type'] = $this->documentType;
        }
        if ($this->settings !== null) {
            $data['settings'] = $this->settings;
        }

        return $data;
    }
}
