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
    public function __construct(
        public ?string $nextDate = null,
        public ?DocumentRecurringFrequency $frequency = null,
        public ?FrequencySpecial $frequencySpecial = null,
        public ?int $interval = null,
        public ?string $endDateOrCount = null,
        public ?DocumentRecurringStatus $status = null,
        public ?bool $asDraft = null,
        public ?bool $isNotify = null,
        public ?DocumentRecurringSendAs $sendAs = null,
        public ?bool $isSign = null,
        public ?bool $isPaid = null,
        public ?PaidDateOption $paidDateOption = null,
        public ?bool $isSepa = null,
        public ?SepaLocalInstrument $sepaLocalInstrument = null,
        public ?SepaSequenceType $sepaSequenceType = null,
        public ?string $sepaReference = null,
        public ?string $sepaRemittanceInformation = null,
        public ?TargetType $targetType = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            nextDate: self::asString($data['next_date'] ?? null),
            frequency: self::asEnum(DocumentRecurringFrequency::class, $data['frequency'] ?? null),
            frequencySpecial: self::asEnum(FrequencySpecial::class, $data['frequency_special'] ?? null),
            interval: self::asInt($data['interval'] ?? null),
            endDateOrCount: self::asString($data['end_date_or_count'] ?? null),
            status: self::asEnum(DocumentRecurringStatus::class, $data['status'] ?? null),
            asDraft: self::asBool($data['as_draft'] ?? null),
            isNotify: self::asBool($data['is_notify'] ?? null),
            sendAs: self::asEnum(DocumentRecurringSendAs::class, $data['send_as'] ?? null),
            isSign: self::asBool($data['is_sign'] ?? null),
            isPaid: self::asBool($data['is_paid'] ?? null),
            paidDateOption: self::asEnum(PaidDateOption::class, $data['paid_date_option'] ?? null),
            isSepa: self::asBool($data['is_sepa'] ?? null),
            sepaLocalInstrument: self::asEnum(SepaLocalInstrument::class, $data['sepa_local_instrument'] ?? null),
            sepaSequenceType: self::asEnum(SepaSequenceType::class, $data['sepa_sequence_type'] ?? null),
            sepaReference: self::asString($data['sepa_reference'] ?? null),
            sepaRemittanceInformation: self::asString($data['sepa_remittance_information'] ?? null),
            targetType: self::asEnum(TargetType::class, $data['target_type'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->nextDate !== null) {
            $data['next_date'] = $this->nextDate;
        }
        if ($this->frequency !== null) {
            $data['frequency'] = $this->frequency->value;
        }
        if ($this->frequencySpecial !== null) {
            $data['frequency_special'] = $this->frequencySpecial->value;
        }
        if ($this->interval !== null) {
            $data['interval'] = $this->interval;
        }
        if ($this->endDateOrCount !== null) {
            $data['end_date_or_count'] = $this->endDateOrCount;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        }
        if ($this->asDraft !== null) {
            $data['as_draft'] = $this->asDraft;
        }
        if ($this->isNotify !== null) {
            $data['is_notify'] = $this->isNotify;
        }
        if ($this->sendAs !== null) {
            $data['send_as'] = $this->sendAs->value;
        }
        if ($this->isSign !== null) {
            $data['is_sign'] = $this->isSign;
        }
        if ($this->isPaid !== null) {
            $data['is_paid'] = $this->isPaid;
        }
        if ($this->paidDateOption !== null) {
            $data['paid_date_option'] = $this->paidDateOption->value;
        }
        if ($this->isSepa !== null) {
            $data['is_sepa'] = $this->isSepa;
        }
        if ($this->sepaLocalInstrument !== null) {
            $data['sepa_local_instrument'] = $this->sepaLocalInstrument->value;
        }
        if ($this->sepaSequenceType !== null) {
            $data['sepa_sequence_type'] = $this->sepaSequenceType->value;
        }
        if ($this->sepaReference !== null) {
            $data['sepa_reference'] = $this->sepaReference;
        }
        if ($this->sepaRemittanceInformation !== null) {
            $data['sepa_remittance_information'] = $this->sepaRemittanceInformation;
        }
        if ($this->targetType !== null) {
            $data['target_type'] = $this->targetType->value;
        }

        return $data;
    }
}
