<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentPayment
 */
final readonly class DocumentPayment extends AbstractModel
{
    public function __construct(
        public ?int $amount = null,
        public ?int $documentId = null,
        public ?int $id = null,
        public ?bool $isOverdueFee = null,
        public ?int $loginId = null,
        public ?string $notice = null,
        public ?string $paymentAt = null,
        public ?string $type = null,
        public ?string $provider = null,
        public ?string $reference = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::asInt($data['amount'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            id: self::asInt($data['id'] ?? null),
            isOverdueFee: self::asBool($data['is_overdue_fee'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            notice: self::asString($data['notice'] ?? null),
            paymentAt: self::asString($data['payment_at'] ?? null),
            type: self::asString($data['type'] ?? null),
            provider: self::asString($data['provider'] ?? null),
            reference: self::asString($data['reference'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        }
        if ($this->isOverdueFee !== null) {
            $data['is_overdue_fee'] = $this->isOverdueFee;
        }
        if ($this->notice !== null) {
            $data['notice'] = $this->notice;
        }
        if ($this->paymentAt !== null) {
            $data['payment_at'] = $this->paymentAt;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type;
        }
        if ($this->provider !== null) {
            $data['provider'] = $this->provider;
        }
        if ($this->reference !== null) {
            $data['reference'] = $this->reference;
        }

        return $data;
    }
}
