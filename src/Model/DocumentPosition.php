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
    public ?string $number;
    public ?string $description;
    public ?string $documentNote;
    public ?float $quantity;
    public ?string $quantityStr;
    public ?string $unit;
    public ?DocumentPositionType $type;
    public ?int $position;
    public ?float $singlePriceNet;
    public ?float $singlePriceGross;
    public ?float $vatPercent;
    public ?float $discount;
    public ?DiscountType $discountType;
    public ?int $positionId;
    public ?float $totalPriceNet;
    public ?float $totalPriceGross;
    public ?float $totalVat;
    public ?string $serialNumberId;
    public ?string $serialNumber;
    public ?string $bookingAccount;
    public ?string $exportCost1;
    public ?string $exportCost2;
    public ?float $costPriceNet;
    public ?float $costPriceTotal;
    public ?float $costPriceCharge;
    public ?CashDiscountType $costPriceChargeType;
    public ?ItemType $itemType;
    public ?int $id;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $number = Undefined::Value,
        string|Undefined|null $description = Undefined::Value,
        string|Undefined|null $documentNote = Undefined::Value,
        float|Undefined|null $quantity = Undefined::Value,
        string|Undefined|null $quantityStr = Undefined::Value,
        string|Undefined|null $unit = Undefined::Value,
        DocumentPositionType|Undefined|null $type = Undefined::Value,
        int|Undefined|null $position = Undefined::Value,
        float|Undefined|null $singlePriceNet = Undefined::Value,
        float|Undefined|null $singlePriceGross = Undefined::Value,
        float|Undefined|null $vatPercent = Undefined::Value,
        float|Undefined|null $discount = Undefined::Value,
        DiscountType|Undefined|null $discountType = Undefined::Value,
        int|Undefined|null $positionId = Undefined::Value,
        ?float $totalPriceNet = null,
        ?float $totalPriceGross = null,
        ?float $totalVat = null,
        ?string $serialNumberId = null,
        ?string $serialNumber = null,
        string|Undefined|null $bookingAccount = Undefined::Value,
        string|Undefined|null $exportCost1 = Undefined::Value,
        string|Undefined|null $exportCost2 = Undefined::Value,
        float|Undefined|null $costPriceNet = Undefined::Value,
        ?float $costPriceTotal = null,
        ?float $costPriceCharge = null,
        ?CashDiscountType $costPriceChargeType = null,
        ItemType|Undefined|null $itemType = Undefined::Value,
        ?int $id = null,
    ) {
        $this->number = $number instanceof Undefined ? null : $number;
        $this->description = $description instanceof Undefined ? null : $description;
        $this->documentNote = $documentNote instanceof Undefined ? null : $documentNote;
        $this->quantity = $quantity instanceof Undefined ? null : $quantity;
        $this->quantityStr = $quantityStr instanceof Undefined ? null : $quantityStr;
        $this->unit = $unit instanceof Undefined ? null : $unit;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->position = $position instanceof Undefined ? null : $position;
        $this->singlePriceNet = $singlePriceNet instanceof Undefined ? null : $singlePriceNet;
        $this->singlePriceGross = $singlePriceGross instanceof Undefined ? null : $singlePriceGross;
        $this->vatPercent = $vatPercent instanceof Undefined ? null : $vatPercent;
        $this->discount = $discount instanceof Undefined ? null : $discount;
        $this->discountType = $discountType instanceof Undefined ? null : $discountType;
        $this->positionId = $positionId instanceof Undefined ? null : $positionId;
        $this->totalPriceNet = $totalPriceNet;
        $this->totalPriceGross = $totalPriceGross;
        $this->totalVat = $totalVat;
        $this->serialNumberId = $serialNumberId;
        $this->serialNumber = $serialNumber;
        $this->bookingAccount = $bookingAccount instanceof Undefined ? null : $bookingAccount;
        $this->exportCost1 = $exportCost1 instanceof Undefined ? null : $exportCost1;
        $this->exportCost2 = $exportCost2 instanceof Undefined ? null : $exportCost2;
        $this->costPriceNet = $costPriceNet instanceof Undefined ? null : $costPriceNet;
        $this->costPriceTotal = $costPriceTotal;
        $this->costPriceCharge = $costPriceCharge;
        $this->costPriceChargeType = $costPriceChargeType;
        $this->itemType = $itemType instanceof Undefined ? null : $itemType;
        $this->id = $id;
        $this->explicit = self::explicitFields([
            'number' => $number,
            'description' => $description,
            'document_note' => $documentNote,
            'quantity' => $quantity,
            'quantity_str' => $quantityStr,
            'unit' => $unit,
            'type' => $type,
            'position' => $position,
            'single_price_net' => $singlePriceNet,
            'single_price_gross' => $singlePriceGross,
            'vat_percent' => $vatPercent,
            'discount' => $discount,
            'discount_type' => $discountType,
            'position_id' => $positionId,
            'booking_account' => $bookingAccount,
            'export_cost_1' => $exportCost1,
            'export_cost_2' => $exportCost2,
            'cost_price_net' => $costPriceNet,
            'itemType' => $itemType,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            description: self::asString($data['description'] ?? null) ?? Undefined::Value,
            documentNote: self::asString($data['document_note'] ?? null) ?? Undefined::Value,
            quantity: self::asFloat($data['quantity'] ?? null) ?? Undefined::Value,
            quantityStr: self::asString($data['quantity_str'] ?? null) ?? Undefined::Value,
            unit: self::asString($data['unit'] ?? null) ?? Undefined::Value,
            type: self::asEnum(DocumentPositionType::class, $data['type'] ?? null) ?? Undefined::Value,
            position: self::asInt($data['position'] ?? null) ?? Undefined::Value,
            singlePriceNet: self::asFloat($data['single_price_net'] ?? null) ?? Undefined::Value,
            singlePriceGross: self::asFloat($data['single_price_gross'] ?? null) ?? Undefined::Value,
            vatPercent: self::asFloat($data['vat_percent'] ?? null) ?? Undefined::Value,
            discount: self::asFloat($data['discount'] ?? null) ?? Undefined::Value,
            discountType: self::asEnum(DiscountType::class, $data['discount_type'] ?? null) ?? Undefined::Value,
            positionId: self::asInt($data['position_id'] ?? null) ?? Undefined::Value,
            totalPriceNet: self::asFloat($data['total_price_net'] ?? null),
            totalPriceGross: self::asFloat($data['total_price_gross'] ?? null),
            totalVat: self::asFloat($data['total_vat'] ?? null),
            serialNumberId: self::asString($data['serial_number_id'] ?? null),
            serialNumber: self::asString($data['serial_number'] ?? null),
            bookingAccount: self::asString($data['booking_account'] ?? null) ?? Undefined::Value,
            exportCost1: self::asString($data['export_cost_1'] ?? null) ?? Undefined::Value,
            exportCost2: self::asString($data['export_cost_2'] ?? null) ?? Undefined::Value,
            costPriceNet: self::asFloat($data['cost_price_net'] ?? null) ?? Undefined::Value,
            costPriceTotal: self::asFloat($data['cost_price_total'] ?? null),
            costPriceCharge: self::asFloat($data['cost_price_charge'] ?? null),
            costPriceChargeType: self::asEnum(CashDiscountType::class, $data['cost_price_charge_type'] ?? null),
            itemType: self::asEnum(ItemType::class, $data['itemType'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
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
        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        } elseif (isset($this->explicit['quantity'])) {
            $data['quantity'] = null;
        }
        if ($this->quantityStr !== null) {
            $data['quantity_str'] = $this->quantityStr;
        } elseif (isset($this->explicit['quantity_str'])) {
            $data['quantity_str'] = null;
        }
        if ($this->unit !== null) {
            $data['unit'] = $this->unit;
        } elseif (isset($this->explicit['unit'])) {
            $data['unit'] = null;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }
        if ($this->position !== null) {
            $data['position'] = $this->position;
        } elseif (isset($this->explicit['position'])) {
            $data['position'] = null;
        }
        if ($this->singlePriceNet !== null) {
            $data['single_price_net'] = $this->singlePriceNet;
        } elseif (isset($this->explicit['single_price_net'])) {
            $data['single_price_net'] = null;
        }
        if ($this->singlePriceGross !== null) {
            $data['single_price_gross'] = $this->singlePriceGross;
        } elseif (isset($this->explicit['single_price_gross'])) {
            $data['single_price_gross'] = null;
        }
        if ($this->vatPercent !== null) {
            $data['vat_percent'] = $this->vatPercent;
        } elseif (isset($this->explicit['vat_percent'])) {
            $data['vat_percent'] = null;
        }
        if ($this->discount !== null) {
            $data['discount'] = $this->discount;
        } elseif (isset($this->explicit['discount'])) {
            $data['discount'] = null;
        }
        if ($this->discountType !== null) {
            $data['discount_type'] = $this->discountType->value;
        } elseif (isset($this->explicit['discount_type'])) {
            $data['discount_type'] = null;
        }
        if ($this->positionId !== null) {
            $data['position_id'] = $this->positionId;
        } elseif (isset($this->explicit['position_id'])) {
            $data['position_id'] = null;
        }
        if ($this->bookingAccount !== null) {
            $data['booking_account'] = $this->bookingAccount;
        } elseif (isset($this->explicit['booking_account'])) {
            $data['booking_account'] = null;
        }
        if ($this->exportCost1 !== null) {
            $data['export_cost_1'] = $this->exportCost1;
        } elseif (isset($this->explicit['export_cost_1'])) {
            $data['export_cost_1'] = null;
        }
        if ($this->exportCost2 !== null) {
            $data['export_cost_2'] = $this->exportCost2;
        } elseif (isset($this->explicit['export_cost_2'])) {
            $data['export_cost_2'] = null;
        }
        if ($this->costPriceNet !== null) {
            $data['cost_price_net'] = $this->costPriceNet;
        } elseif (isset($this->explicit['cost_price_net'])) {
            $data['cost_price_net'] = null;
        }
        if ($this->itemType !== null) {
            $data['itemType'] = $this->itemType->value;
        } elseif (isset($this->explicit['itemType'])) {
            $data['itemType'] = null;
        }

        return $data;
    }
}
