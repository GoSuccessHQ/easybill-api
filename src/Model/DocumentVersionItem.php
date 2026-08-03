<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\FileFormatConfigType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentVersionItem
 */
final readonly class DocumentVersionItem extends AbstractModel
{
    public ?FileFormatConfigType $documentVersionItemType;
    public ?int $id;

    public function __construct(
        ?FileFormatConfigType $documentVersionItemType = null,
        ?int $id = null,
    ) {
        $this->documentVersionItemType = $documentVersionItemType;
        $this->id = $id;
    }

    public static function fromArray(array $data): static
    {
        return new self(
            documentVersionItemType: self::asEnum(FileFormatConfigType::class, $data['document_version_item_type'] ?? null),
            id: self::asInt($data['id'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];


        return $data;
    }
}
