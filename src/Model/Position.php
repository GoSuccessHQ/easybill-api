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
    public function __construct(
        public ?int $id = null,
        public ?PositionType $type = null,
        public ?string $number = null,
        public ?string $description = null,
        public ?string $documentNote = null,
        public ?string $note = null,
        public ?string $unit = null,
        public ?string $exportIdentifier = null,
        public ?PositionExportIdentifierExtended $exportIdentifierExtended = null,
        public ?int $loginId = null,
        public ?PriceType $priceType = null,
        public ?float $vatPercent = null,
        public ?float $salePrice = null,
        public ?float $salePrice2 = null,
        public ?float $salePrice3 = null,
        public ?float $salePrice4 = null,
        public ?float $salePrice5 = null,
        public ?float $salePrice6 = null,
        public ?float $salePrice7 = null,
        public ?float $salePrice8 = null,
        public ?float $salePrice9 = null,
        public ?float $salePrice10 = null,
        public ?float $costPrice = null,
        public ?string $exportCost1 = null,
        public ?string $exportCost2 = null,
        public ?int $groupId = null,
        public ?PositionStock $stock = null,
        public ?int $stockCount = null,
        public ?bool $stockLimitNotify = null,
        public ?StockLimitNotifyFrequency $stockLimitNotifyFrequency = null,
        public ?int $stockLimit = null,
        public ?float $quantity = null,
        public ?bool $archived = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            type: self::asEnum(PositionType::class, $data['type'] ?? null),
            number: self::asString($data['number'] ?? null),
            description: self::asString($data['description'] ?? null),
            documentNote: self::asString($data['document_note'] ?? null),
            note: self::asString($data['note'] ?? null),
            unit: self::asString($data['unit'] ?? null),
            exportIdentifier: self::asString($data['export_identifier'] ?? null),
            exportIdentifierExtended: self::asModel(PositionExportIdentifierExtended::class, $data['export_identifier_extended'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            priceType: self::asEnum(PriceType::class, $data['price_type'] ?? null),
            vatPercent: self::asFloat($data['vat_percent'] ?? null),
            salePrice: self::asFloat($data['sale_price'] ?? null),
            salePrice2: self::asFloat($data['sale_price2'] ?? null),
            salePrice3: self::asFloat($data['sale_price3'] ?? null),
            salePrice4: self::asFloat($data['sale_price4'] ?? null),
            salePrice5: self::asFloat($data['sale_price5'] ?? null),
            salePrice6: self::asFloat($data['sale_price6'] ?? null),
            salePrice7: self::asFloat($data['sale_price7'] ?? null),
            salePrice8: self::asFloat($data['sale_price8'] ?? null),
            salePrice9: self::asFloat($data['sale_price9'] ?? null),
            salePrice10: self::asFloat($data['sale_price10'] ?? null),
            costPrice: self::asFloat($data['cost_price'] ?? null),
            exportCost1: self::asString($data['export_cost1'] ?? null),
            exportCost2: self::asString($data['export_cost2'] ?? null),
            groupId: self::asInt($data['group_id'] ?? null),
            stock: self::asEnum(PositionStock::class, $data['stock'] ?? null),
            stockCount: self::asInt($data['stock_count'] ?? null),
            stockLimitNotify: self::asBool($data['stock_limit_notify'] ?? null),
            stockLimitNotifyFrequency: self::asEnum(StockLimitNotifyFrequency::class, $data['stock_limit_notify_frequency'] ?? null),
            stockLimit: self::asInt($data['stock_limit'] ?? null),
            quantity: self::asFloat($data['quantity'] ?? null),
            archived: self::asBool($data['archived'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->documentNote !== null) {
            $data['document_note'] = $this->documentNote;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->unit !== null) {
            $data['unit'] = $this->unit;
        }
        if ($this->exportIdentifier !== null) {
            $data['export_identifier'] = $this->exportIdentifier;
        }
        if ($this->exportIdentifierExtended !== null) {
            $data['export_identifier_extended'] = $this->exportIdentifierExtended->toArray();
        }
        if ($this->priceType !== null) {
            $data['price_type'] = $this->priceType->value;
        }
        if ($this->vatPercent !== null) {
            $data['vat_percent'] = $this->vatPercent;
        }
        if ($this->salePrice !== null) {
            $data['sale_price'] = $this->salePrice;
        }
        if ($this->salePrice2 !== null) {
            $data['sale_price2'] = $this->salePrice2;
        }
        if ($this->salePrice3 !== null) {
            $data['sale_price3'] = $this->salePrice3;
        }
        if ($this->salePrice4 !== null) {
            $data['sale_price4'] = $this->salePrice4;
        }
        if ($this->salePrice5 !== null) {
            $data['sale_price5'] = $this->salePrice5;
        }
        if ($this->salePrice6 !== null) {
            $data['sale_price6'] = $this->salePrice6;
        }
        if ($this->salePrice7 !== null) {
            $data['sale_price7'] = $this->salePrice7;
        }
        if ($this->salePrice8 !== null) {
            $data['sale_price8'] = $this->salePrice8;
        }
        if ($this->salePrice9 !== null) {
            $data['sale_price9'] = $this->salePrice9;
        }
        if ($this->salePrice10 !== null) {
            $data['sale_price10'] = $this->salePrice10;
        }
        if ($this->costPrice !== null) {
            $data['cost_price'] = $this->costPrice;
        }
        if ($this->exportCost1 !== null) {
            $data['export_cost1'] = $this->exportCost1;
        }
        if ($this->exportCost2 !== null) {
            $data['export_cost2'] = $this->exportCost2;
        }
        if ($this->groupId !== null) {
            $data['group_id'] = $this->groupId;
        }
        if ($this->stock !== null) {
            $data['stock'] = $this->stock->value;
        }
        if ($this->stockLimitNotify !== null) {
            $data['stock_limit_notify'] = $this->stockLimitNotify;
        }
        if ($this->stockLimitNotifyFrequency !== null) {
            $data['stock_limit_notify_frequency'] = $this->stockLimitNotifyFrequency->value;
        }
        if ($this->stockLimit !== null) {
            $data['stock_limit'] = $this->stockLimit;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->archived !== null) {
            $data['archived'] = $this->archived;
        }

        return $data;
    }
}
