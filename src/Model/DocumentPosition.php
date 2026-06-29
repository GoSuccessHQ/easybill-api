<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\CashDiscountType;
use GoSuccess\Easybill\Enum\DiscountType;
use GoSuccess\Easybill\Enum\DocumentPositionType;
use GoSuccess\Easybill\Enum\ItemType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentPosition
 */
final readonly class DocumentPosition extends AbstractModel
{
    public function __construct(
        public ?string $number = null,
        public ?string $description = null,
        public ?string $documentNote = null,
        public ?float $quantity = null,
        public ?string $quantityStr = null,
        public ?string $unit = null,
        public ?DocumentPositionType $type = null,
        public ?int $position = null,
        public ?float $singlePriceNet = null,
        public ?float $singlePriceGross = null,
        public ?float $vatPercent = null,
        public ?float $discount = null,
        public ?DiscountType $discountType = null,
        public ?int $positionId = null,
        public ?float $totalPriceNet = null,
        public ?float $totalPriceGross = null,
        public ?float $totalVat = null,
        public ?string $serialNumberId = null,
        public ?string $serialNumber = null,
        public ?string $bookingAccount = null,
        public ?string $exportCost1 = null,
        public ?string $exportCost2 = null,
        public ?float $costPriceNet = null,
        public ?float $costPriceTotal = null,
        public ?float $costPriceCharge = null,
        public ?CashDiscountType $costPriceChargeType = null,
        public ?ItemType $itemType = null,
        public ?int $id = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            number: self::asString($data['number'] ?? null),
            description: self::asString($data['description'] ?? null),
            documentNote: self::asString($data['document_note'] ?? null),
            quantity: self::asFloat($data['quantity'] ?? null),
            quantityStr: self::asString($data['quantity_str'] ?? null),
            unit: self::asString($data['unit'] ?? null),
            type: self::asEnum(DocumentPositionType::class, $data['type'] ?? null),
            position: self::asInt($data['position'] ?? null),
            singlePriceNet: self::asFloat($data['single_price_net'] ?? null),
            singlePriceGross: self::asFloat($data['single_price_gross'] ?? null),
            vatPercent: self::asFloat($data['vat_percent'] ?? null),
            discount: self::asFloat($data['discount'] ?? null),
            discountType: self::asEnum(DiscountType::class, $data['discount_type'] ?? null),
            positionId: self::asInt($data['position_id'] ?? null),
            totalPriceNet: self::asFloat($data['total_price_net'] ?? null),
            totalPriceGross: self::asFloat($data['total_price_gross'] ?? null),
            totalVat: self::asFloat($data['total_vat'] ?? null),
            serialNumberId: self::asString($data['serial_number_id'] ?? null),
            serialNumber: self::asString($data['serial_number'] ?? null),
            bookingAccount: self::asString($data['booking_account'] ?? null),
            exportCost1: self::asString($data['export_cost_1'] ?? null),
            exportCost2: self::asString($data['export_cost_2'] ?? null),
            costPriceNet: self::asFloat($data['cost_price_net'] ?? null),
            costPriceTotal: self::asFloat($data['cost_price_total'] ?? null),
            costPriceCharge: self::asFloat($data['cost_price_charge'] ?? null),
            costPriceChargeType: self::asEnum(CashDiscountType::class, $data['cost_price_charge_type'] ?? null),
            itemType: self::asEnum(ItemType::class, $data['itemType'] ?? null),
            id: self::asInt($data['id'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }
        if ($this->documentNote !== null) {
            $data['document_note'] = $this->documentNote;
        }
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }
        if ($this->quantityStr !== null) {
            $data['quantity_str'] = $this->quantityStr;
        }
        if ($this->unit !== null) {
            $data['unit'] = $this->unit;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }
        if ($this->position !== null) {
            $data['position'] = $this->position;
        }
        if ($this->singlePriceNet !== null) {
            $data['single_price_net'] = $this->singlePriceNet;
        }
        if ($this->singlePriceGross !== null) {
            $data['single_price_gross'] = $this->singlePriceGross;
        }
        if ($this->vatPercent !== null) {
            $data['vat_percent'] = $this->vatPercent;
        }
        if ($this->discount !== null) {
            $data['discount'] = $this->discount;
        }
        if ($this->discountType !== null) {
            $data['discount_type'] = $this->discountType->value;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        }
        if ($this->bookingAccount !== null) {
            $data['booking_account'] = $this->bookingAccount;
        }
        if ($this->exportCost1 !== null) {
            $data['export_cost_1'] = $this->exportCost1;
        }
        if ($this->exportCost2 !== null) {
            $data['export_cost_2'] = $this->exportCost2;
        }
        if ($this->costPriceNet !== null) {
            $data['cost_price_net'] = $this->costPriceNet;
        }
        if ($this->itemType !== null) {
            $data['itemType'] = $this->itemType->value;
        }

        return $data;
    }
}
