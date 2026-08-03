<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\SepaLocalInstrument;
use GoSuccess\Easybill\Enum\SepapaymentType;
use GoSuccess\Easybill\Enum\SepaSequenceType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json SEPAPayment
 */
final readonly class SEPAPayment extends AbstractModel
{
    public function __construct(
        public ?int $amount = null,
        public ?string $createdAt = null,
        public ?string $creditorBic = null,
        public ?string $creditorIban = null,
        public ?string $creditorName = null,
        public ?string $debitorBic = null,
        public ?string $debitorIban = null,
        public ?string $debitorName = null,
        public ?string $debitorAddressLine1 = null,
        public ?string $debitorAddressLine2 = null,
        public ?string $debitorCountry = null,
        public ?int $documentId = null,
        public ?string $exportAt = null,
        public ?string $exportError = null,
        public ?int $id = null,
        public ?SepaLocalInstrument $localInstrument = null,
        public ?string $mandateDateOfSignature = null,
        public ?string $mandateId = null,
        public ?string $reference = null,
        public ?string $remittanceInformation = null,
        public ?string $requestedAt = null,
        public ?SepaSequenceType $sequenceType = null,
        public ?string $updatedAt = null,
        public ?SepapaymentType $type = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::asInt($data['amount'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            creditorBic: self::asString($data['creditor_bic'] ?? null),
            creditorIban: self::asString($data['creditor_iban'] ?? null),
            creditorName: self::asString($data['creditor_name'] ?? null),
            debitorBic: self::asString($data['debitor_bic'] ?? null),
            debitorIban: self::asString($data['debitor_iban'] ?? null),
            debitorName: self::asString($data['debitor_name'] ?? null),
            debitorAddressLine1: self::asString($data['debitor_address_line_1'] ?? null),
            debitorAddressLine2: self::asString($data['debitor_address_line_2'] ?? null),
            debitorCountry: self::asString($data['debitor_country'] ?? null),
            documentId: self::asInt($data['document_id'] ?? null),
            exportAt: self::asString($data['export_at'] ?? null),
            exportError: self::asString($data['export_error'] ?? null),
            id: self::asInt($data['id'] ?? null),
            localInstrument: self::asEnum(SepaLocalInstrument::class, $data['local_instrument'] ?? null),
            mandateDateOfSignature: self::asString($data['mandate_date_of_signature'] ?? null),
            mandateId: self::asString($data['mandate_id'] ?? null),
            reference: self::asString($data['reference'] ?? null),
            remittanceInformation: self::asString($data['remittance_information'] ?? null),
            requestedAt: self::asString($data['requested_at'] ?? null),
            sequenceType: self::asEnum(SepaSequenceType::class, $data['sequence_type'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
            type: self::asEnum(SepapaymentType::class, $data['type'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->amount !== null) {
            $data['amount'] = $this->amount;
        }
        if ($this->creditorBic !== null) {
            $data['creditor_bic'] = $this->creditorBic;
        }
        if ($this->creditorIban !== null) {
            $data['creditor_iban'] = $this->creditorIban;
        }
        if ($this->creditorName !== null) {
            $data['creditor_name'] = $this->creditorName;
        }
        if ($this->debitorBic !== null) {
            $data['debitor_bic'] = $this->debitorBic;
        }
        if ($this->debitorIban !== null) {
            $data['debitor_iban'] = $this->debitorIban;
        }
        if ($this->debitorName !== null) {
            $data['debitor_name'] = $this->debitorName;
        }
        if ($this->debitorAddressLine1 !== null) {
            $data['debitor_address_line_1'] = $this->debitorAddressLine1;
        }
        if ($this->debitorAddressLine2 !== null) {
            $data['debitor_address_line_2'] = $this->debitorAddressLine2;
        }
        if ($this->debitorCountry !== null) {
            $data['debitor_country'] = $this->debitorCountry;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        }
        if ($this->exportAt !== null) {
            $data['export_at'] = $this->exportAt;
        }
        if ($this->localInstrument !== null) {
            $data['local_instrument'] = $this->localInstrument->value;
        }
        if ($this->mandateDateOfSignature !== null) {
            $data['mandate_date_of_signature'] = $this->mandateDateOfSignature;
        }
        if ($this->mandateId !== null) {
            $data['mandate_id'] = $this->mandateId;
        }
        if ($this->reference !== null) {
            $data['reference'] = $this->reference;
        }
        if ($this->remittanceInformation !== null) {
            $data['remittance_information'] = $this->remittanceInformation;
        }
        if ($this->requestedAt !== null) {
            $data['requested_at'] = $this->requestedAt;
        }
        if ($this->sequenceType !== null) {
            $data['sequence_type'] = $this->sequenceType->value;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }

        return $data;
    }
}
