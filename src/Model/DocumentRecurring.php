<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\DocumentRecurringFrequency;
use GoSuccess\Easybill\Enum\DocumentRecurringSendAs;
use GoSuccess\Easybill\Enum\DocumentRecurringStatus;
use GoSuccess\Easybill\Enum\FrequencySpecial;
use GoSuccess\Easybill\Enum\PaidDateOption;
use GoSuccess\Easybill\Enum\SepaLocalInstrument;
use GoSuccess\Easybill\Enum\SepaSequenceType;
use GoSuccess\Easybill\Enum\TargetType;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json DocumentRecurring
 */
final readonly class DocumentRecurring extends AbstractModel
{
    public ?string $nextDate;
    public ?DocumentRecurringFrequency $frequency;
    public ?FrequencySpecial $frequencySpecial;
    public ?int $interval;
    public ?string $endDateOrCount;
    public ?DocumentRecurringStatus $status;
    public ?bool $asDraft;
    public ?bool $isNotify;
    public ?DocumentRecurringSendAs $sendAs;
    public ?bool $isSign;
    public ?bool $isPaid;
    public ?PaidDateOption $paidDateOption;
    public ?bool $isSepa;
    public ?SepaLocalInstrument $sepaLocalInstrument;
    public ?SepaSequenceType $sepaSequenceType;
    public ?string $sepaReference;
    public ?string $sepaRemittanceInformation;
    public ?TargetType $targetType;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $nextDate = Undefined::Value,
        DocumentRecurringFrequency|Undefined|null $frequency = Undefined::Value,
        FrequencySpecial|Undefined|null $frequencySpecial = Undefined::Value,
        int|Undefined|null $interval = Undefined::Value,
        string|Undefined|null $endDateOrCount = Undefined::Value,
        DocumentRecurringStatus|Undefined|null $status = Undefined::Value,
        bool|Undefined|null $asDraft = Undefined::Value,
        bool|Undefined|null $isNotify = Undefined::Value,
        DocumentRecurringSendAs|Undefined|null $sendAs = Undefined::Value,
        bool|Undefined|null $isSign = Undefined::Value,
        bool|Undefined|null $isPaid = Undefined::Value,
        PaidDateOption|Undefined|null $paidDateOption = Undefined::Value,
        bool|Undefined|null $isSepa = Undefined::Value,
        SepaLocalInstrument|Undefined|null $sepaLocalInstrument = Undefined::Value,
        SepaSequenceType|Undefined|null $sepaSequenceType = Undefined::Value,
        string|Undefined|null $sepaReference = Undefined::Value,
        string|Undefined|null $sepaRemittanceInformation = Undefined::Value,
        TargetType|Undefined|null $targetType = Undefined::Value,
    ) {
        $this->nextDate = $nextDate instanceof Undefined ? null : $nextDate;
        $this->frequency = $frequency instanceof Undefined ? null : $frequency;
        $this->frequencySpecial = $frequencySpecial instanceof Undefined ? null : $frequencySpecial;
        $this->interval = $interval instanceof Undefined ? null : $interval;
        $this->endDateOrCount = $endDateOrCount instanceof Undefined ? null : $endDateOrCount;
        $this->status = $status instanceof Undefined ? null : $status;
        $this->asDraft = $asDraft instanceof Undefined ? null : $asDraft;
        $this->isNotify = $isNotify instanceof Undefined ? null : $isNotify;
        $this->sendAs = $sendAs instanceof Undefined ? null : $sendAs;
        $this->isSign = $isSign instanceof Undefined ? null : $isSign;
        $this->isPaid = $isPaid instanceof Undefined ? null : $isPaid;
        $this->paidDateOption = $paidDateOption instanceof Undefined ? null : $paidDateOption;
        $this->isSepa = $isSepa instanceof Undefined ? null : $isSepa;
        $this->sepaLocalInstrument = $sepaLocalInstrument instanceof Undefined ? null : $sepaLocalInstrument;
        $this->sepaSequenceType = $sepaSequenceType instanceof Undefined ? null : $sepaSequenceType;
        $this->sepaReference = $sepaReference instanceof Undefined ? null : $sepaReference;
        $this->sepaRemittanceInformation = $sepaRemittanceInformation instanceof Undefined ? null : $sepaRemittanceInformation;
        $this->targetType = $targetType instanceof Undefined ? null : $targetType;
        $this->explicit = self::explicitFields([
            'next_date' => $nextDate,
            'frequency' => $frequency,
            'frequency_special' => $frequencySpecial,
            'interval' => $interval,
            'end_date_or_count' => $endDateOrCount,
            'status' => $status,
            'as_draft' => $asDraft,
            'is_notify' => $isNotify,
            'send_as' => $sendAs,
            'is_sign' => $isSign,
            'is_paid' => $isPaid,
            'paid_date_option' => $paidDateOption,
            'is_sepa' => $isSepa,
            'sepa_local_instrument' => $sepaLocalInstrument,
            'sepa_sequence_type' => $sepaSequenceType,
            'sepa_reference' => $sepaReference,
            'sepa_remittance_information' => $sepaRemittanceInformation,
            'target_type' => $targetType,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            nextDate: self::asString($data['next_date'] ?? null) ?? Undefined::Value,
            frequency: self::asEnum(DocumentRecurringFrequency::class, $data['frequency'] ?? null) ?? Undefined::Value,
            frequencySpecial: self::asEnum(FrequencySpecial::class, $data['frequency_special'] ?? null) ?? Undefined::Value,
            interval: self::asInt($data['interval'] ?? null) ?? Undefined::Value,
            endDateOrCount: self::asString($data['end_date_or_count'] ?? null) ?? Undefined::Value,
            status: self::asEnum(DocumentRecurringStatus::class, $data['status'] ?? null) ?? Undefined::Value,
            asDraft: self::asBool($data['as_draft'] ?? null) ?? Undefined::Value,
            isNotify: self::asBool($data['is_notify'] ?? null) ?? Undefined::Value,
            sendAs: self::asEnum(DocumentRecurringSendAs::class, $data['send_as'] ?? null) ?? Undefined::Value,
            isSign: self::asBool($data['is_sign'] ?? null) ?? Undefined::Value,
            isPaid: self::asBool($data['is_paid'] ?? null) ?? Undefined::Value,
            paidDateOption: self::asEnum(PaidDateOption::class, $data['paid_date_option'] ?? null) ?? Undefined::Value,
            isSepa: self::asBool($data['is_sepa'] ?? null) ?? Undefined::Value,
            sepaLocalInstrument: self::asEnum(SepaLocalInstrument::class, $data['sepa_local_instrument'] ?? null) ?? Undefined::Value,
            sepaSequenceType: self::asEnum(SepaSequenceType::class, $data['sepa_sequence_type'] ?? null) ?? Undefined::Value,
            sepaReference: self::asString($data['sepa_reference'] ?? null) ?? Undefined::Value,
            sepaRemittanceInformation: self::asString($data['sepa_remittance_information'] ?? null) ?? Undefined::Value,
            targetType: self::asEnum(TargetType::class, $data['target_type'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->nextDate !== null) {
            $data['next_date'] = $this->nextDate;
        } elseif (isset($this->explicit['next_date'])) {
            $data['next_date'] = null;
        }
        if ($this->frequency !== null) {
            $data['frequency'] = $this->frequency->value;
        } elseif (isset($this->explicit['frequency'])) {
            $data['frequency'] = null;
        }
        if ($this->frequencySpecial !== null) {
            $data['frequency_special'] = $this->frequencySpecial->value;
        } elseif (isset($this->explicit['frequency_special'])) {
            $data['frequency_special'] = null;
        }
        if ($this->interval !== null) {
            $data['interval'] = $this->interval;
        } elseif (isset($this->explicit['interval'])) {
            $data['interval'] = null;
        }
        if ($this->endDateOrCount !== null) {
            $data['end_date_or_count'] = $this->endDateOrCount;
        } elseif (isset($this->explicit['end_date_or_count'])) {
            $data['end_date_or_count'] = null;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        } elseif (isset($this->explicit['status'])) {
            $data['status'] = null;
        }
        if ($this->asDraft !== null) {
            $data['as_draft'] = $this->asDraft;
        } elseif (isset($this->explicit['as_draft'])) {
            $data['as_draft'] = null;
        }
        if ($this->isNotify !== null) {
            $data['is_notify'] = $this->isNotify;
        } elseif (isset($this->explicit['is_notify'])) {
            $data['is_notify'] = null;
        }
        if ($this->sendAs !== null) {
            $data['send_as'] = $this->sendAs->value;
        } elseif (isset($this->explicit['send_as'])) {
            $data['send_as'] = null;
        }
        if ($this->isSign !== null) {
            $data['is_sign'] = $this->isSign;
        } elseif (isset($this->explicit['is_sign'])) {
            $data['is_sign'] = null;
        }
        if ($this->isPaid !== null) {
            $data['is_paid'] = $this->isPaid;
        } elseif (isset($this->explicit['is_paid'])) {
            $data['is_paid'] = null;
        }
        if ($this->paidDateOption !== null) {
            $data['paid_date_option'] = $this->paidDateOption->value;
        } elseif (isset($this->explicit['paid_date_option'])) {
            $data['paid_date_option'] = null;
        }
        if ($this->isSepa !== null) {
            $data['is_sepa'] = $this->isSepa;
        } elseif (isset($this->explicit['is_sepa'])) {
            $data['is_sepa'] = null;
        }
        if ($this->sepaLocalInstrument !== null) {
            $data['sepa_local_instrument'] = $this->sepaLocalInstrument->value;
        } elseif (isset($this->explicit['sepa_local_instrument'])) {
            $data['sepa_local_instrument'] = null;
        }
        if ($this->sepaSequenceType !== null) {
            $data['sepa_sequence_type'] = $this->sepaSequenceType->value;
        } elseif (isset($this->explicit['sepa_sequence_type'])) {
            $data['sepa_sequence_type'] = null;
        }
        if ($this->sepaReference !== null) {
            $data['sepa_reference'] = $this->sepaReference;
        } elseif (isset($this->explicit['sepa_reference'])) {
            $data['sepa_reference'] = null;
        }
        if ($this->sepaRemittanceInformation !== null) {
            $data['sepa_remittance_information'] = $this->sepaRemittanceInformation;
        } elseif (isset($this->explicit['sepa_remittance_information'])) {
            $data['sepa_remittance_information'] = null;
        }
        if ($this->targetType !== null) {
            $data['target_type'] = $this->targetType->value;
        } elseif (isset($this->explicit['target_type'])) {
            $data['target_type'] = null;
        }

        return $data;
    }
}
