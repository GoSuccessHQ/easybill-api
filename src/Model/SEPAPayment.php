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
    public ?int $amount;
    public ?string $createdAt;
    public ?string $creditorBic;
    public ?string $creditorIban;
    public ?string $creditorName;
    public ?string $debitorBic;
    public ?string $debitorIban;
    public ?string $debitorName;
    public ?string $debitorAddressLine1;
    public ?string $debitorAddressLine2;
    public ?string $debitorCountry;
    public ?int $documentId;
    public ?string $exportAt;
    public ?string $exportError;
    public ?int $id;
    public ?SepaLocalInstrument $localInstrument;
    public ?string $mandateDateOfSignature;
    public ?string $mandateId;
    public ?string $reference;
    public ?string $remittanceInformation;
    public ?string $requestedAt;
    public ?SepaSequenceType $sequenceType;
    public ?string $updatedAt;
    public ?SepapaymentType $type;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        int|Undefined|null $amount = Undefined::Value,
        ?string $createdAt = null,
        string|Undefined|null $creditorBic = Undefined::Value,
        string|Undefined|null $creditorIban = Undefined::Value,
        string|Undefined|null $creditorName = Undefined::Value,
        string|Undefined|null $debitorBic = Undefined::Value,
        string|Undefined|null $debitorIban = Undefined::Value,
        string|Undefined|null $debitorName = Undefined::Value,
        string|Undefined|null $debitorAddressLine1 = Undefined::Value,
        string|Undefined|null $debitorAddressLine2 = Undefined::Value,
        string|Undefined|null $debitorCountry = Undefined::Value,
        int|Undefined|null $documentId = Undefined::Value,
        string|Undefined|null $exportAt = Undefined::Value,
        ?string $exportError = null,
        ?int $id = null,
        SepaLocalInstrument|Undefined|null $localInstrument = Undefined::Value,
        string|Undefined|null $mandateDateOfSignature = Undefined::Value,
        string|Undefined|null $mandateId = Undefined::Value,
        string|Undefined|null $reference = Undefined::Value,
        string|Undefined|null $remittanceInformation = Undefined::Value,
        string|Undefined|null $requestedAt = Undefined::Value,
        SepaSequenceType|Undefined|null $sequenceType = Undefined::Value,
        ?string $updatedAt = null,
        SepapaymentType|Undefined|null $type = Undefined::Value,
    ) {
        $this->amount = $amount instanceof Undefined ? null : $amount;
        $this->createdAt = $createdAt;
        $this->creditorBic = $creditorBic instanceof Undefined ? null : $creditorBic;
        $this->creditorIban = $creditorIban instanceof Undefined ? null : $creditorIban;
        $this->creditorName = $creditorName instanceof Undefined ? null : $creditorName;
        $this->debitorBic = $debitorBic instanceof Undefined ? null : $debitorBic;
        $this->debitorIban = $debitorIban instanceof Undefined ? null : $debitorIban;
        $this->debitorName = $debitorName instanceof Undefined ? null : $debitorName;
        $this->debitorAddressLine1 = $debitorAddressLine1 instanceof Undefined ? null : $debitorAddressLine1;
        $this->debitorAddressLine2 = $debitorAddressLine2 instanceof Undefined ? null : $debitorAddressLine2;
        $this->debitorCountry = $debitorCountry instanceof Undefined ? null : $debitorCountry;
        $this->documentId = $documentId instanceof Undefined ? null : $documentId;
        $this->exportAt = $exportAt instanceof Undefined ? null : $exportAt;
        $this->exportError = $exportError;
        $this->id = $id;
        $this->localInstrument = $localInstrument instanceof Undefined ? null : $localInstrument;
        $this->mandateDateOfSignature = $mandateDateOfSignature instanceof Undefined ? null : $mandateDateOfSignature;
        $this->mandateId = $mandateId instanceof Undefined ? null : $mandateId;
        $this->reference = $reference instanceof Undefined ? null : $reference;
        $this->remittanceInformation = $remittanceInformation instanceof Undefined ? null : $remittanceInformation;
        $this->requestedAt = $requestedAt instanceof Undefined ? null : $requestedAt;
        $this->sequenceType = $sequenceType instanceof Undefined ? null : $sequenceType;
        $this->updatedAt = $updatedAt;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->explicit = self::explicitFields([
            'amount' => $amount,
            'creditor_bic' => $creditorBic,
            'creditor_iban' => $creditorIban,
            'creditor_name' => $creditorName,
            'debitor_bic' => $debitorBic,
            'debitor_iban' => $debitorIban,
            'debitor_name' => $debitorName,
            'debitor_address_line_1' => $debitorAddressLine1,
            'debitor_address_line_2' => $debitorAddressLine2,
            'debitor_country' => $debitorCountry,
            'document_id' => $documentId,
            'export_at' => $exportAt,
            'local_instrument' => $localInstrument,
            'mandate_date_of_signature' => $mandateDateOfSignature,
            'mandate_id' => $mandateId,
            'reference' => $reference,
            'remittance_information' => $remittanceInformation,
            'requested_at' => $requestedAt,
            'sequence_type' => $sequenceType,
            'type' => $type,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::asInt($data['amount'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            creditorBic: self::asString($data['creditor_bic'] ?? null) ?? Undefined::Value,
            creditorIban: self::asString($data['creditor_iban'] ?? null) ?? Undefined::Value,
            creditorName: self::asString($data['creditor_name'] ?? null) ?? Undefined::Value,
            debitorBic: self::asString($data['debitor_bic'] ?? null) ?? Undefined::Value,
            debitorIban: self::asString($data['debitor_iban'] ?? null) ?? Undefined::Value,
            debitorName: self::asString($data['debitor_name'] ?? null) ?? Undefined::Value,
            debitorAddressLine1: self::asString($data['debitor_address_line_1'] ?? null) ?? Undefined::Value,
            debitorAddressLine2: self::asString($data['debitor_address_line_2'] ?? null) ?? Undefined::Value,
            debitorCountry: self::asString($data['debitor_country'] ?? null) ?? Undefined::Value,
            documentId: self::asInt($data['document_id'] ?? null) ?? Undefined::Value,
            exportAt: self::asString($data['export_at'] ?? null) ?? Undefined::Value,
            exportError: self::asString($data['export_error'] ?? null),
            id: self::asInt($data['id'] ?? null),
            localInstrument: self::asEnum(SepaLocalInstrument::class, $data['local_instrument'] ?? null) ?? Undefined::Value,
            mandateDateOfSignature: self::asString($data['mandate_date_of_signature'] ?? null) ?? Undefined::Value,
            mandateId: self::asString($data['mandate_id'] ?? null) ?? Undefined::Value,
            reference: self::asString($data['reference'] ?? null) ?? Undefined::Value,
            remittanceInformation: self::asString($data['remittance_information'] ?? null) ?? Undefined::Value,
            requestedAt: self::asString($data['requested_at'] ?? null) ?? Undefined::Value,
            sequenceType: self::asEnum(SepaSequenceType::class, $data['sequence_type'] ?? null) ?? Undefined::Value,
            updatedAt: self::asString($data['updated_at'] ?? null),
            type: self::asEnum(SepapaymentType::class, $data['type'] ?? null) ?? Undefined::Value,
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
        if ($this->creditorBic !== null) {
            $data['creditor_bic'] = $this->creditorBic;
        } elseif (isset($this->explicit['creditor_bic'])) {
            $data['creditor_bic'] = null;
        }
        if ($this->creditorIban !== null) {
            $data['creditor_iban'] = $this->creditorIban;
        } elseif (isset($this->explicit['creditor_iban'])) {
            $data['creditor_iban'] = null;
        }
        if ($this->creditorName !== null) {
            $data['creditor_name'] = $this->creditorName;
        } elseif (isset($this->explicit['creditor_name'])) {
            $data['creditor_name'] = null;
        }
        if ($this->debitorBic !== null) {
            $data['debitor_bic'] = $this->debitorBic;
        } elseif (isset($this->explicit['debitor_bic'])) {
            $data['debitor_bic'] = null;
        }
        if ($this->debitorIban !== null) {
            $data['debitor_iban'] = $this->debitorIban;
        } elseif (isset($this->explicit['debitor_iban'])) {
            $data['debitor_iban'] = null;
        }
        if ($this->debitorName !== null) {
            $data['debitor_name'] = $this->debitorName;
        } elseif (isset($this->explicit['debitor_name'])) {
            $data['debitor_name'] = null;
        }
        if ($this->debitorAddressLine1 !== null) {
            $data['debitor_address_line_1'] = $this->debitorAddressLine1;
        } elseif (isset($this->explicit['debitor_address_line_1'])) {
            $data['debitor_address_line_1'] = null;
        }
        if ($this->debitorAddressLine2 !== null) {
            $data['debitor_address_line_2'] = $this->debitorAddressLine2;
        } elseif (isset($this->explicit['debitor_address_line_2'])) {
            $data['debitor_address_line_2'] = null;
        }
        if ($this->debitorCountry !== null) {
            $data['debitor_country'] = $this->debitorCountry;
        } elseif (isset($this->explicit['debitor_country'])) {
            $data['debitor_country'] = null;
        }
        if ($this->documentId !== null) {
            $data['document_id'] = $this->documentId;
        } elseif (isset($this->explicit['document_id'])) {
            $data['document_id'] = null;
        }
        if ($this->exportAt !== null) {
            $data['export_at'] = $this->exportAt;
        } elseif (isset($this->explicit['export_at'])) {
            $data['export_at'] = null;
        }
        if ($this->localInstrument !== null) {
            $data['local_instrument'] = $this->localInstrument->value;
        } elseif (isset($this->explicit['local_instrument'])) {
            $data['local_instrument'] = null;
        }
        if ($this->mandateDateOfSignature !== null) {
            $data['mandate_date_of_signature'] = $this->mandateDateOfSignature;
        } elseif (isset($this->explicit['mandate_date_of_signature'])) {
            $data['mandate_date_of_signature'] = null;
        }
        if ($this->mandateId !== null) {
            $data['mandate_id'] = $this->mandateId;
        } elseif (isset($this->explicit['mandate_id'])) {
            $data['mandate_id'] = null;
        }
        if ($this->reference !== null) {
            $data['reference'] = $this->reference;
        } elseif (isset($this->explicit['reference'])) {
            $data['reference'] = null;
        }
        if ($this->remittanceInformation !== null) {
            $data['remittance_information'] = $this->remittanceInformation;
        } elseif (isset($this->explicit['remittance_information'])) {
            $data['remittance_information'] = null;
        }
        if ($this->requestedAt !== null) {
            $data['requested_at'] = $this->requestedAt;
        } elseif (isset($this->explicit['requested_at'])) {
            $data['requested_at'] = null;
        }
        if ($this->sequenceType !== null) {
            $data['sequence_type'] = $this->sequenceType->value;
        } elseif (isset($this->explicit['sequence_type'])) {
            $data['sequence_type'] = null;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }

        return $data;
    }
}
