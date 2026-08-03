<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\DiscountType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DiscountPosition
 */
final readonly class DiscountPosition extends AbstractModel
{
    public ?int $id;
    public ?int $customerId;
    public ?int $discount;
    public ?DiscountType $discountType;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        ?int $id = null,
        int|Undefined|null $customerId = Undefined::Value,
        int|Undefined|null $discount = Undefined::Value,
        DiscountType|Undefined|null $discountType = Undefined::Value,
    ) {
        $this->id = $id;
        $this->customerId = $customerId instanceof Undefined ? null : $customerId;
        $this->discount = $discount instanceof Undefined ? null : $discount;
        $this->discountType = $discountType instanceof Undefined ? null : $discountType;
        $this->explicit = self::explicitFields([
            'customer_id' => $customerId,
            'discount' => $discount,
            'discount_type' => $discountType,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null) ?? Undefined::Value,
            discount: self::asInt($data['discount'] ?? null) ?? Undefined::Value,
            discountType: self::asEnum(DiscountType::class, $data['discount_type'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        } elseif (isset($this->explicit['customer_id'])) {
            $data['customer_id'] = null;
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

        return $data;
    }
}
