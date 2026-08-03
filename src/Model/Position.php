<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\PositionStock;
use GoSuccess\Easybill\Enum\PositionType;
use GoSuccess\Easybill\Enum\PriceType;
use GoSuccess\Easybill\Enum\StockLimitNotifyFrequency;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Position
 */
final readonly class Position extends AbstractModel
{
    public ?int $id;
    public ?PositionType $type;
    public ?string $number;
    public ?string $description;
    public ?string $documentNote;
    public ?string $note;
    public ?string $unit;
    public ?string $exportIdentifier;
    public ?PositionExportIdentifierExtended $exportIdentifierExtended;
    public ?int $loginId;
    public ?PriceType $priceType;
    public ?float $vatPercent;
    public ?float $salePrice;
    public ?float $salePrice2;
    public ?float $salePrice3;
    public ?float $salePrice4;
    public ?float $salePrice5;
    public ?float $salePrice6;
    public ?float $salePrice7;
    public ?float $salePrice8;
    public ?float $salePrice9;
    public ?float $salePrice10;
    public ?float $costPrice;
    public ?string $exportCost1;
    public ?string $exportCost2;
    public ?int $groupId;
    public ?PositionStock $stock;
    public ?int $stockCount;
    public ?bool $stockLimitNotify;
    public ?StockLimitNotifyFrequency $stockLimitNotifyFrequency;
    public ?int $stockLimit;
    public ?float $quantity;
    public ?bool $archived;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        PositionType|Undefined|null $type = Undefined::Value,
        string|Undefined|null $number = Undefined::Value,
        string|Undefined|null $description = Undefined::Value,
        string|Undefined|null $documentNote = Undefined::Value,
        string|Undefined|null $note = Undefined::Value,
        string|Undefined|null $unit = Undefined::Value,
        string|Undefined|null $exportIdentifier = Undefined::Value,
        PositionExportIdentifierExtended|Undefined|null $exportIdentifierExtended = Undefined::Value,
        ?int $loginId = null,
        PriceType|Undefined|null $priceType = Undefined::Value,
        float|Undefined|null $vatPercent = Undefined::Value,
        float|Undefined|null $salePrice = Undefined::Value,
        float|Undefined|null $salePrice2 = Undefined::Value,
        float|Undefined|null $salePrice3 = Undefined::Value,
        float|Undefined|null $salePrice4 = Undefined::Value,
        float|Undefined|null $salePrice5 = Undefined::Value,
        float|Undefined|null $salePrice6 = Undefined::Value,
        float|Undefined|null $salePrice7 = Undefined::Value,
        float|Undefined|null $salePrice8 = Undefined::Value,
        float|Undefined|null $salePrice9 = Undefined::Value,
        float|Undefined|null $salePrice10 = Undefined::Value,
        float|Undefined|null $costPrice = Undefined::Value,
        string|Undefined|null $exportCost1 = Undefined::Value,
        string|Undefined|null $exportCost2 = Undefined::Value,
        int|Undefined|null $groupId = Undefined::Value,
        PositionStock|Undefined|null $stock = Undefined::Value,
        ?int $stockCount = null,
        bool|Undefined|null $stockLimitNotify = Undefined::Value,
        StockLimitNotifyFrequency|Undefined|null $stockLimitNotifyFrequency = Undefined::Value,
        int|Undefined|null $stockLimit = Undefined::Value,
        float|Undefined|null $quantity = Undefined::Value,
        bool|Undefined|null $archived = Undefined::Value,
    ) {
        $this->id = $id;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->number = $number instanceof Undefined ? null : $number;
        $this->description = $description instanceof Undefined ? null : $description;
        $this->documentNote = $documentNote instanceof Undefined ? null : $documentNote;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->unit = $unit instanceof Undefined ? null : $unit;
        $this->exportIdentifier = $exportIdentifier instanceof Undefined ? null : $exportIdentifier;
        $this->exportIdentifierExtended = $exportIdentifierExtended instanceof Undefined ? null : $exportIdentifierExtended;
        $this->loginId = $loginId;
        $this->priceType = $priceType instanceof Undefined ? null : $priceType;
        $this->vatPercent = $vatPercent instanceof Undefined ? null : $vatPercent;
        $this->salePrice = $salePrice instanceof Undefined ? null : $salePrice;
        $this->salePrice2 = $salePrice2 instanceof Undefined ? null : $salePrice2;
        $this->salePrice3 = $salePrice3 instanceof Undefined ? null : $salePrice3;
        $this->salePrice4 = $salePrice4 instanceof Undefined ? null : $salePrice4;
        $this->salePrice5 = $salePrice5 instanceof Undefined ? null : $salePrice5;
        $this->salePrice6 = $salePrice6 instanceof Undefined ? null : $salePrice6;
        $this->salePrice7 = $salePrice7 instanceof Undefined ? null : $salePrice7;
        $this->salePrice8 = $salePrice8 instanceof Undefined ? null : $salePrice8;
        $this->salePrice9 = $salePrice9 instanceof Undefined ? null : $salePrice9;
        $this->salePrice10 = $salePrice10 instanceof Undefined ? null : $salePrice10;
        $this->costPrice = $costPrice instanceof Undefined ? null : $costPrice;
        $this->exportCost1 = $exportCost1 instanceof Undefined ? null : $exportCost1;
        $this->exportCost2 = $exportCost2 instanceof Undefined ? null : $exportCost2;
        $this->groupId = $groupId instanceof Undefined ? null : $groupId;
        $this->stock = $stock instanceof Undefined ? null : $stock;
        $this->stockCount = $stockCount;
        $this->stockLimitNotify = $stockLimitNotify instanceof Undefined ? null : $stockLimitNotify;
        $this->stockLimitNotifyFrequency = $stockLimitNotifyFrequency instanceof Undefined ? null : $stockLimitNotifyFrequency;
        $this->stockLimit = $stockLimit instanceof Undefined ? null : $stockLimit;
        $this->quantity = $quantity instanceof Undefined ? null : $quantity;
        $this->archived = $archived instanceof Undefined ? null : $archived;
        $this->explicit = self::explicitFields([
            'type' => $type,
            'number' => $number,
            'description' => $description,
            'document_note' => $documentNote,
            'note' => $note,
            'unit' => $unit,
            'export_identifier' => $exportIdentifier,
            'export_identifier_extended' => $exportIdentifierExtended,
            'price_type' => $priceType,
            'vat_percent' => $vatPercent,
            'sale_price' => $salePrice,
            'sale_price2' => $salePrice2,
            'sale_price3' => $salePrice3,
            'sale_price4' => $salePrice4,
            'sale_price5' => $salePrice5,
            'sale_price6' => $salePrice6,
            'sale_price7' => $salePrice7,
            'sale_price8' => $salePrice8,
            'sale_price9' => $salePrice9,
            'sale_price10' => $salePrice10,
            'cost_price' => $costPrice,
            'export_cost1' => $exportCost1,
            'export_cost2' => $exportCost2,
            'group_id' => $groupId,
            'stock' => $stock,
            'stock_limit_notify' => $stockLimitNotify,
            'stock_limit_notify_frequency' => $stockLimitNotifyFrequency,
            'stock_limit' => $stockLimit,
            'quantity' => $quantity,
            'archived' => $archived,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            type: self::asEnum(PositionType::class, $data['type'] ?? null) ?? Undefined::Value,
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            documentNote: self::asString($data['document_note'] ?? null) ?? Undefined::Value,
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            unit: self::asString($data['unit'] ?? null) ?? Undefined::Value,
            exportIdentifier: self::asString($data['export_identifier'] ?? null) ?? Undefined::Value,
            exportIdentifierExtended: self::asModel(PositionExportIdentifierExtended::class, $data['export_identifier_extended'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null),
            priceType: self::asEnum(PriceType::class, $data['price_type'] ?? null) ?? Undefined::Value,
            vatPercent: self::asFloat($data['vat_percent'] ?? null) ?? Undefined::Value,
            salePrice: self::asFloat($data['sale_price'] ?? null) ?? Undefined::Value,
            salePrice2: self::asFloat($data['sale_price2'] ?? null) ?? Undefined::Value,
            salePrice3: self::asFloat($data['sale_price3'] ?? null) ?? Undefined::Value,
            salePrice4: self::asFloat($data['sale_price4'] ?? null) ?? Undefined::Value,
            salePrice5: self::asFloat($data['sale_price5'] ?? null) ?? Undefined::Value,
            salePrice6: self::asFloat($data['sale_price6'] ?? null) ?? Undefined::Value,
            salePrice7: self::asFloat($data['sale_price7'] ?? null) ?? Undefined::Value,
            salePrice8: self::asFloat($data['sale_price8'] ?? null) ?? Undefined::Value,
            salePrice9: self::asFloat($data['sale_price9'] ?? null) ?? Undefined::Value,
            salePrice10: self::asFloat($data['sale_price10'] ?? null) ?? Undefined::Value,
            costPrice: self::asFloat($data['cost_price'] ?? null) ?? Undefined::Value,
            exportCost1: self::asString($data['export_cost1'] ?? null) ?? Undefined::Value,
            exportCost2: self::asString($data['export_cost2'] ?? null) ?? Undefined::Value,
            groupId: self::asInt($data['group_id'] ?? null) ?? Undefined::Value,
            stock: self::asEnum(PositionStock::class, $data['stock'] ?? null) ?? Undefined::Value,
            stockCount: self::asInt($data['stock_count'] ?? null),
            stockLimitNotify: self::asBool($data['stock_limit_notify'] ?? null) ?? Undefined::Value,
            stockLimitNotifyFrequency: self::asEnum(StockLimitNotifyFrequency::class, $data['stock_limit_notify_frequency'] ?? null) ?? Undefined::Value,
            stockLimit: self::asInt($data['stock_limit'] ?? null) ?? Undefined::Value,
            quantity: self::asFloat($data['quantity'] ?? null) ?? Undefined::Value,
            archived: self::asBool($data['archived'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        } elseif (isset($this->explicit['number'])) {
            $data['number'] = null;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        } elseif (isset($this->explicit['description'])) {
            $data['description'] = null;
        }
        if ($this->documentNote !== null) {
            $data['document_note'] = $this->documentNote;
        } elseif (isset($this->explicit['document_note'])) {
            $data['document_note'] = null;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->unit !== null) {
            $data['unit'] = $this->unit;
        } elseif (isset($this->explicit['unit'])) {
            $data['unit'] = null;
        }
        if ($this->exportIdentifier !== null) {
            $data['export_identifier'] = $this->exportIdentifier;
        } elseif (isset($this->explicit['export_identifier'])) {
            $data['export_identifier'] = null;
        }
        if ($this->exportIdentifierExtended !== null) {
            $nested = $this->exportIdentifierExtended->toArray();

            if ($nested !== []) {
                $data['export_identifier_extended'] = $nested;
            }
        } elseif (isset($this->explicit['export_identifier_extended'])) {
            $data['export_identifier_extended'] = null;
        }
        if ($this->priceType !== null) {
            $data['price_type'] = $this->priceType->value;
        } elseif (isset($this->explicit['price_type'])) {
            $data['price_type'] = null;
        }
        if ($this->vatPercent !== null) {
            $data['vat_percent'] = $this->vatPercent;
        } elseif (isset($this->explicit['vat_percent'])) {
            $data['vat_percent'] = null;
        }
        if ($this->salePrice !== null) {
            $data['sale_price'] = $this->salePrice;
        } elseif (isset($this->explicit['sale_price'])) {
            $data['sale_price'] = null;
        }
        if ($this->salePrice2 !== null) {
            $data['sale_price2'] = $this->salePrice2;
        } elseif (isset($this->explicit['sale_price2'])) {
            $data['sale_price2'] = null;
        }
        if ($this->salePrice3 !== null) {
            $data['sale_price3'] = $this->salePrice3;
        } elseif (isset($this->explicit['sale_price3'])) {
            $data['sale_price3'] = null;
        }
        if ($this->salePrice4 !== null) {
            $data['sale_price4'] = $this->salePrice4;
        } elseif (isset($this->explicit['sale_price4'])) {
            $data['sale_price4'] = null;
        }
        if ($this->salePrice5 !== null) {
            $data['sale_price5'] = $this->salePrice5;
        } elseif (isset($this->explicit['sale_price5'])) {
            $data['sale_price5'] = null;
        }
        if ($this->salePrice6 !== null) {
            $data['sale_price6'] = $this->salePrice6;
        } elseif (isset($this->explicit['sale_price6'])) {
            $data['sale_price6'] = null;
        }
        if ($this->salePrice7 !== null) {
            $data['sale_price7'] = $this->salePrice7;
        } elseif (isset($this->explicit['sale_price7'])) {
            $data['sale_price7'] = null;
        }
        if ($this->salePrice8 !== null) {
            $data['sale_price8'] = $this->salePrice8;
        } elseif (isset($this->explicit['sale_price8'])) {
            $data['sale_price8'] = null;
        }
        if ($this->salePrice9 !== null) {
            $data['sale_price9'] = $this->salePrice9;
        } elseif (isset($this->explicit['sale_price9'])) {
            $data['sale_price9'] = null;
        }
        if ($this->salePrice10 !== null) {
            $data['sale_price10'] = $this->salePrice10;
        } elseif (isset($this->explicit['sale_price10'])) {
            $data['sale_price10'] = null;
        }
        if ($this->costPrice !== null) {
            $data['cost_price'] = $this->costPrice;
        } elseif (isset($this->explicit['cost_price'])) {
            $data['cost_price'] = null;
        }
        if ($this->exportCost1 !== null) {
            $data['export_cost1'] = $this->exportCost1;
        } elseif (isset($this->explicit['export_cost1'])) {
            $data['export_cost1'] = null;
        }
        if ($this->exportCost2 !== null) {
            $data['export_cost2'] = $this->exportCost2;
        } elseif (isset($this->explicit['export_cost2'])) {
            $data['export_cost2'] = null;
        }
        if ($this->groupId !== null) {
            $data['group_id'] = $this->groupId;
        } elseif (isset($this->explicit['group_id'])) {
            $data['group_id'] = null;
        }
        if ($this->stock !== null) {
            $data['stock'] = $this->stock->value;
        } elseif (isset($this->explicit['stock'])) {
            $data['stock'] = null;
        }
        if ($this->stockLimitNotify !== null) {
            $data['stock_limit_notify'] = $this->stockLimitNotify;
        } elseif (isset($this->explicit['stock_limit_notify'])) {
            $data['stock_limit_notify'] = null;
        }
        if ($this->stockLimitNotifyFrequency !== null) {
            $data['stock_limit_notify_frequency'] = $this->stockLimitNotifyFrequency->value;
        } elseif (isset($this->explicit['stock_limit_notify_frequency'])) {
            $data['stock_limit_notify_frequency'] = null;
        }
        if ($this->stockLimit !== null) {
            $data['stock_limit'] = $this->stockLimit;
        } elseif (isset($this->explicit['stock_limit'])) {
            $data['stock_limit'] = null;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        } elseif (isset($this->explicit['quantity'])) {
            $data['quantity'] = null;
        }
        if ($this->archived !== null) {
            $data['archived'] = $this->archived;
        } elseif (isset($this->explicit['archived'])) {
            $data['archived'] = null;
        }

        return $data;
    }
}
