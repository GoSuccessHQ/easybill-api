<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\AnonymizeStatus;
use GoSuccess\Easybill\Enum\CalcVatFrom;
use GoSuccess\Easybill\Enum\CashDiscountType;
use GoSuccess\Easybill\Enum\DocumentStatus;
use GoSuccess\Easybill\Enum\DocumentType;
use GoSuccess\Easybill\Enum\PaymentLinkLocale;
use GoSuccess\Easybill\Enum\VatOption;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json Document
 */
final readonly class Document extends AbstractModel
{
    public function __construct(
        public ?DocumentAddress $address = null,
        /** @var list<AdvancedDataField> */
        public array $advancedDataFields = [],
        /** @var list<int> */
        public array $attachmentIds = [],
        public ?DocumentAddress $labelAddress = null,
        public ?int $amount = null,
        public ?int $amountNet = null,
        public ?string $anonymizeDueDate = null,
        public ?AnonymizeStatus $anonymizeStatus = null,
        public ?string $anonymizedAt = null,
        public ?string $bankDebitForm = null,
        public ?string $billingCountry = null,
        public ?CalcVatFrom $calcVatFrom = null,
        public ?int $cancelId = null,
        public ?float $cashAllowance = null,
        public ?int $cashAllowanceDays = null,
        public ?string $cashAllowanceText = null,
        public ?int $contactId = null,
        public ?string $contactLabel = null,
        public ?string $contactText = null,
        public ?string $createdAt = null,
        public ?string $currency = null,
        public ?int $customerId = null,
        public ?CustomerSnapshot $customerSnapshot = null,
        public ?string $discount = null,
        public ?CashDiscountType $discountType = null,
        public ?string $documentDate = null,
        public ?string $dueDate = null,
        public ?string $editedAt = null,
        public ?string $externalId = null,
        public ?string $replicaUrl = null,
        public ?int $gracePeriod = null,
        public ?int $dueInDays = null,
        public ?int $id = null,
        public ?bool $isAcceptableOnPublicDomain = null,
        public ?bool $isArchive = null,
        public ?bool $isDraft = null,
        public ?bool $isReplica = null,
        public ?bool $isOss = null,
        /** @var list<string> */
        public array $itemNotes = [],
        /** @var list<DocumentPosition> */
        public array $items = [],
        public ?int $lastPostboxId = null,
        public ?int $loginId = null,
        public ?string $number = null,
        public ?string $orderNumber = null,
        public ?string $buyerReference = null,
        public ?int $paidAmount = null,
        public ?string $paidAt = null,
        public ?int $pdfPages = null,
        public ?string $pdfTemplate = null,
        public ?bool $paymentLinkEnabled = null,
        public ?PaymentLinkLocale $paymentLinkLocale = null,
        public ?int $projectId = null,
        public ?DocumentRecurring $recurringOptions = null,
        public ?int $refId = null,
        public ?int $rootId = null,
        public ?ServiceDate $serviceDate = null,
        public ?string $shippingCountry = null,
        public ?DocumentStatus $status = null,
        public ?string $text = null,
        public ?string $textPrefix = null,
        public ?string $textTax = null,
        public ?string $title = null,
        public ?DocumentType $type = null,
        public ?bool $useShippingAddress = null,
        public ?string $vatCountry = null,
        public ?string $vatId = null,
        public ?string $fulfillmentCountry = null,
        public ?VatOption $vatOption = null,
        /** @var list<FileFormatConfig> */
        public array $fileFormatConfig = [],
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            address: self::asModel(DocumentAddress::class, $data['address'] ?? null),
            advancedDataFields: self::asModelList(AdvancedDataField::class, $data['advanced_data_fields'] ?? null),
            attachmentIds: self::asIntList($data['attachment_ids'] ?? null),
            labelAddress: self::asModel(DocumentAddress::class, $data['label_address'] ?? null),
            amount: self::asInt($data['amount'] ?? null),
            amountNet: self::asInt($data['amount_net'] ?? null),
            anonymizeDueDate: self::asString($data['anonymize_due_date'] ?? null),
            anonymizeStatus: self::asEnum(AnonymizeStatus::class, $data['anonymize_status'] ?? null),
            anonymizedAt: self::asString($data['anonymized_at'] ?? null),
            bankDebitForm: self::asString($data['bank_debit_form'] ?? null),
            billingCountry: self::asString($data['billing_country'] ?? null),
            calcVatFrom: self::asEnum(CalcVatFrom::class, $data['calc_vat_from'] ?? null),
            cancelId: self::asInt($data['cancel_id'] ?? null),
            cashAllowance: self::asFloat($data['cash_allowance'] ?? null),
            cashAllowanceDays: self::asInt($data['cash_allowance_days'] ?? null),
            cashAllowanceText: self::asString($data['cash_allowance_text'] ?? null),
            contactId: self::asInt($data['contact_id'] ?? null),
            contactLabel: self::asString($data['contact_label'] ?? null),
            contactText: self::asString($data['contact_text'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            currency: self::asString($data['currency'] ?? null),
            customerId: self::asInt($data['customer_id'] ?? null),
            customerSnapshot: self::asModel(CustomerSnapshot::class, $data['customer_snapshot'] ?? null),
            discount: self::asString($data['discount'] ?? null),
            discountType: self::asEnum(CashDiscountType::class, $data['discount_type'] ?? null),
            documentDate: self::asString($data['document_date'] ?? null),
            dueDate: self::asString($data['due_date'] ?? null),
            editedAt: self::asString($data['edited_at'] ?? null),
            externalId: self::asString($data['external_id'] ?? null),
            replicaUrl: self::asString($data['replica_url'] ?? null),
            gracePeriod: self::asInt($data['grace_period'] ?? null),
            dueInDays: self::asInt($data['due_in_days'] ?? null),
            id: self::asInt($data['id'] ?? null),
            isAcceptableOnPublicDomain: self::asBool($data['is_acceptable_on_public_domain'] ?? null),
            isArchive: self::asBool($data['is_archive'] ?? null),
            isDraft: self::asBool($data['is_draft'] ?? null),
            isReplica: self::asBool($data['is_replica'] ?? null),
            isOss: self::asBool($data['is_oss'] ?? null),
            itemNotes: self::asStringList($data['item_notes'] ?? null),
            items: self::asModelList(DocumentPosition::class, $data['items'] ?? null),
            lastPostboxId: self::asInt($data['last_postbox_id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            number: self::asString($data['number'] ?? null),
            orderNumber: self::asString($data['order_number'] ?? null),
            buyerReference: self::asString($data['buyer_reference'] ?? null),
            paidAmount: self::asInt($data['paid_amount'] ?? null),
            paidAt: self::asString($data['paid_at'] ?? null),
            pdfPages: self::asInt($data['pdf_pages'] ?? null),
            pdfTemplate: self::asString($data['pdf_template'] ?? null),
            paymentLinkEnabled: self::asBool($data['payment_link_enabled'] ?? null),
            paymentLinkLocale: self::asEnum(PaymentLinkLocale::class, $data['payment_link_locale'] ?? null),
            projectId: self::asInt($data['project_id'] ?? null),
            recurringOptions: self::asModel(DocumentRecurring::class, $data['recurring_options'] ?? null),
            refId: self::asInt($data['ref_id'] ?? null),
            rootId: self::asInt($data['root_id'] ?? null),
            serviceDate: self::asModel(ServiceDate::class, $data['service_date'] ?? null),
            shippingCountry: self::asString($data['shipping_country'] ?? null),
            status: self::asEnum(DocumentStatus::class, $data['status'] ?? null),
            text: self::asString($data['text'] ?? null),
            textPrefix: self::asString($data['text_prefix'] ?? null),
            textTax: self::asString($data['text_tax'] ?? null),
            title: self::asString($data['title'] ?? null),
            type: self::asEnum(DocumentType::class, $data['type'] ?? null),
            useShippingAddress: self::asBool($data['use_shipping_address'] ?? null),
            vatCountry: self::asString($data['vat_country'] ?? null),
            vatId: self::asString($data['vat_id'] ?? null),
            fulfillmentCountry: self::asString($data['fulfillment_country'] ?? null),
            vatOption: self::asEnum(VatOption::class, $data['vat_option'] ?? null),
            fileFormatConfig: self::asModelList(FileFormatConfig::class, $data['file_format_config'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->address !== null) {
            $nested = $this->address->toArray();

            if ($nested !== []) {
                $data['address'] = $nested;
            }
        }
        if ($this->advancedDataFields !== []) {
            $data['advanced_data_fields'] = array_map(static fn(AdvancedDataField $item): array => $item->toArray(), $this->advancedDataFields);
        }
        if ($this->labelAddress !== null) {
            $nested = $this->labelAddress->toArray();

            if ($nested !== []) {
                $data['label_address'] = $nested;
            }
        }
        if ($this->anonymizeDueDate !== null) {
            $data['anonymize_due_date'] = $this->anonymizeDueDate;
        }
        if ($this->bankDebitForm !== null) {
            $data['bank_debit_form'] = $this->bankDebitForm;
        }
        if ($this->calcVatFrom !== null) {
            $data['calc_vat_from'] = $this->calcVatFrom->value;
        }
        if ($this->cashAllowance !== null) {
            $data['cash_allowance'] = $this->cashAllowance;
        }
        if ($this->cashAllowanceDays !== null) {
            $data['cash_allowance_days'] = $this->cashAllowanceDays;
        }
        if ($this->cashAllowanceText !== null) {
            $data['cash_allowance_text'] = $this->cashAllowanceText;
        }
        if ($this->contactId !== null) {
            $data['contact_id'] = $this->contactId;
        }
        if ($this->contactLabel !== null) {
            $data['contact_label'] = $this->contactLabel;
        }
        if ($this->contactText !== null) {
            $data['contact_text'] = $this->contactText;
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->customerSnapshot !== null) {
            $nested = $this->customerSnapshot->toArray();

            if ($nested !== []) {
                $data['customer_snapshot'] = $nested;
            }
        }
        if ($this->discount !== null) {
            $data['discount'] = $this->discount;
        }
        if ($this->discountType !== null) {
            $data['discount_type'] = $this->discountType->value;
        }
        if ($this->documentDate !== null) {
            $data['document_date'] = $this->documentDate;
        }
        if ($this->externalId !== null) {
            $data['external_id'] = $this->externalId;
        }
        if ($this->replicaUrl !== null) {
            $data['replica_url'] = $this->replicaUrl;
        }
        if ($this->gracePeriod !== null) {
            $data['grace_period'] = $this->gracePeriod;
        }
        if ($this->dueInDays !== null) {
            $data['due_in_days'] = $this->dueInDays;
        }
        if ($this->isAcceptableOnPublicDomain !== null) {
            $data['is_acceptable_on_public_domain'] = $this->isAcceptableOnPublicDomain;
        }
        if ($this->isArchive !== null) {
            $data['is_archive'] = $this->isArchive;
        }
        if ($this->isReplica !== null) {
            $data['is_replica'] = $this->isReplica;
        }
        if ($this->isOss !== null) {
            $data['is_oss'] = $this->isOss;
        }
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(DocumentPosition $item): array => $item->toArray(), $this->items);
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }
        if ($this->orderNumber !== null) {
            $data['order_number'] = $this->orderNumber;
        }
        if ($this->buyerReference !== null) {
            $data['buyer_reference'] = $this->buyerReference;
        }
        if ($this->pdfTemplate !== null) {
            $data['pdf_template'] = $this->pdfTemplate;
        }
        if ($this->paymentLinkEnabled !== null) {
            $data['payment_link_enabled'] = $this->paymentLinkEnabled;
        }
        if ($this->paymentLinkLocale !== null) {
            $data['payment_link_locale'] = $this->paymentLinkLocale->value;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        }
        if ($this->recurringOptions !== null) {
            $nested = $this->recurringOptions->toArray();

            if ($nested !== []) {
                $data['recurring_options'] = $nested;
            }
        }
        if ($this->refId !== null) {
            $data['ref_id'] = $this->refId;
        }
        if ($this->serviceDate !== null) {
            $nested = $this->serviceDate->toArray();

            if ($nested !== []) {
                $data['service_date'] = $nested;
            }
        }
        if ($this->shippingCountry !== null) {
            $data['shipping_country'] = $this->shippingCountry;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        }
        if ($this->textPrefix !== null) {
            $data['text_prefix'] = $this->textPrefix;
        }
        if ($this->textTax !== null) {
            $data['text_tax'] = $this->textTax;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        }
        if ($this->useShippingAddress !== null) {
            $data['use_shipping_address'] = $this->useShippingAddress;
        }
        if ($this->vatCountry !== null) {
            $data['vat_country'] = $this->vatCountry;
        }
        if ($this->fulfillmentCountry !== null) {
            $data['fulfillment_country'] = $this->fulfillmentCountry;
        }
        if ($this->vatOption !== null) {
            $data['vat_option'] = $this->vatOption->value;
        }
        if ($this->fileFormatConfig !== []) {
            $data['file_format_config'] = array_map(static fn(FileFormatConfig $item): array => $item->toArray(), $this->fileFormatConfig);
        }

        return $data;
    }
}
