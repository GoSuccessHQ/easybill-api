<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentPayment
 */
final readonly class DocumentPayment extends AbstractModel
{
    public ?int $amount;
    public ?int $documentId;
    public ?int $id;
    public ?bool $isOverdueFee;
    public ?int $loginId;
    public ?string $notice;
    public ?string $paymentAt;
    public ?string $type;
    public ?string $provider;
    public ?string $reference;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        int|Undefined|null $amount = Undefined::Value,
        int|Undefined|null $documentId = Undefined::Value,
        ?int $id = null,
        bool|Undefined|null $isOverdueFee = Undefined::Value,
        ?int $loginId = null,
        string|Undefined|null $notice = Undefined::Value,
        string|Undefined|null $paymentAt = Undefined::Value,
        string|Undefined|null $type = Undefined::Value,
        string|Undefined|null $provider = Undefined::Value,
        string|Undefined|null $reference = Undefined::Value,
    ) {
        $this->amount = $amount instanceof Undefined ? null : $amount;
        $this->documentId = $documentId instanceof Undefined ? null : $documentId;
        $this->id = $id;
        $this->isOverdueFee = $isOverdueFee instanceof Undefined ? null : $isOverdueFee;
        $this->loginId = $loginId;
        $this->notice = $notice instanceof Undefined ? null : $notice;
        $this->paymentAt = $paymentAt instanceof Undefined ? null : $paymentAt;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->provider = $provider instanceof Undefined ? null : $provider;
        $this->reference = $reference instanceof Undefined ? null : $reference;
        $this->explicit = self::explicitFields([
            'amount' => $amount,
            'document_id' => $documentId,
            'is_overdue_fee' => $isOverdueFee,
            'notice' => $notice,
            'payment_at' => $paymentAt,
            'type' => $type,
            'provider' => $provider,
            'reference' => $reference,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::asInt($data['amount'] ?? null) ?? Undefined::Value,
            documentId: self::asInt($data['document_id'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            isOverdueFee: self::asBool($data['is_overdue_fee'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null),
            notice: self::asString($data['notice'] ?? null) ?? Undefined::Value,
            paymentAt: self::asString($data['payment_at'] ?? null) ?? Undefined::Value,
            type: self::asString($data['type'] ?? null) ?? Undefined::Value,
            provider: self::asString($data['provider'] ?? null) ?? Undefined::Value,
            reference: self::asString($data['reference'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        } elseif (isset($this->explicit['amount'])) {
            $data['amount'] = null;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        } elseif (isset($this->explicit['document_id'])) {
            $data['document_id'] = null;
        }
        if ($this->isOverdueFee !== null) {
            $data['is_overdue_fee'] = $this->isOverdueFee;
        } elseif (isset($this->explicit['is_overdue_fee'])) {
            $data['is_overdue_fee'] = null;
        }
        if ($this->notice !== null) {
            $data['notice'] = $this->notice;
        } elseif (isset($this->explicit['notice'])) {
            $data['notice'] = null;
        }
        if ($this->paymentAt !== null) {
            $data['payment_at'] = $this->paymentAt;
        } elseif (isset($this->explicit['payment_at'])) {
            $data['payment_at'] = null;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }
        if ($this->provider !== null) {
            $data['provider'] = $this->provider;
        } elseif (isset($this->explicit['provider'])) {
            $data['provider'] = null;
        }
        if ($this->reference !== null) {
            $data['reference'] = $this->reference;
        } elseif (isset($this->explicit['reference'])) {
            $data['reference'] = null;
        }

        return $data;
    }
}
