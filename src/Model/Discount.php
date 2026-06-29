<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\DiscountType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Discount
 */
final readonly class Discount extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public ?int $customerId = null,
        public ?int $discount = null,
        public ?DiscountType $discountType = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            id: self::asInt($data['id'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null),
            discount: self::asInt($data['discount'] ?? null),
            discountType: self::asEnum(DiscountType::class, $data['discount_type'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->discount !== null) {
            $data['discount'] = $this->discount;
        }
        if ($this->discountType !== null) {
            $data['discount_type'] = $this->discountType->value;
        }

        return $data;
    }
}
