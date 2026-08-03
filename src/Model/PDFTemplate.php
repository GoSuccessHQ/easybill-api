<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PDFTemplate
 */
final readonly class PDFTemplate extends AbstractModel
{
    public ?string $id;
    public ?string $name;
    public ?string $pdfTemplate;
    public ?string $documentType;
    public ?PDFTemplateSettings $settings;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $id = Undefined::Value,
        string|Undefined|null $name = Undefined::Value,
        string|Undefined|null $pdfTemplate = Undefined::Value,
        string|Undefined|null $documentType = Undefined::Value,
        PDFTemplateSettings|Undefined|null $settings = Undefined::Value,
    ) {
        $this->id = $id instanceof Undefined ? null : $id;
        $this->name = $name instanceof Undefined ? null : $name;
        $this->pdfTemplate = $pdfTemplate instanceof Undefined ? null : $pdfTemplate;
        $this->documentType = $documentType instanceof Undefined ? null : $documentType;
        $this->settings = $settings instanceof Undefined ? null : $settings;
        $this->explicit = self::explicitFields([
            'id' => $id,
            'name' => $name,
            'pdf_template' => $pdfTemplate,
            'document_type' => $documentType,
            'settings' => $settings,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asString($data['id'] ?? null) ?? Undefined::Value,
            name: self::asString($data['name'] ?? null) ?? Undefined::Value,
            pdfTemplate: self::asString($data['pdf_template'] ?? null) ?? Undefined::Value,
            documentType: self::asString($data['document_type'] ?? null) ?? Undefined::Value,
            settings: self::asModel(PDFTemplateSettings::class, $data['settings'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->id !== null) {
            $data['id'] = $this->id;
        } elseif (isset($this->explicit['id'])) {
            $data['id'] = null;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        } elseif (isset($this->explicit['name'])) {
            $data['name'] = null;
        }
        if ($this->pdfTemplate !== null) {
            $data['pdf_template'] = $this->pdfTemplate;
        } elseif (isset($this->explicit['pdf_template'])) {
            $data['pdf_template'] = null;
        }
        if ($this->documentType !== null) {
            $data['document_type'] = $this->documentType;
        } elseif (isset($this->explicit['document_type'])) {
            $data['document_type'] = null;
        }
        if ($this->settings !== null) {
            $nested = $this->settings->toArray();

            if ($nested !== []) {
                $data['settings'] = $nested;
            }
        } elseif (isset($this->explicit['settings'])) {
            $data['settings'] = null;
        }

        return $data;
    }
}
