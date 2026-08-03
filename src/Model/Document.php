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
    public ?DocumentAddress $address;
    /** @var list<AdvancedDataField> */
    public array $advancedDataFields;
    /** @var list<int> */
    public array $attachmentIds;
    public ?DocumentAddress $labelAddress;
    public ?int $amount;
    public ?int $amountNet;
    public ?string $anonymizeDueDate;
    public ?AnonymizeStatus $anonymizeStatus;
    public ?string $anonymizedAt;
    public ?string $bankDebitForm;
    public ?string $billingCountry;
    public ?CalcVatFrom $calcVatFrom;
    public ?int $cancelId;
    public ?float $cashAllowance;
    public ?int $cashAllowanceDays;
    public ?string $cashAllowanceText;
    public ?int $contactId;
    public ?string $contactLabel;
    public ?string $contactText;
    public ?string $createdAt;
    public ?string $currency;
    public ?int $customerId;
    public ?CustomerSnapshot $customerSnapshot;
    public ?string $discount;
    public ?CashDiscountType $discountType;
    public ?string $documentDate;
    public ?string $dueDate;
    public ?string $editedAt;
    public ?string $externalId;
    public ?string $replicaUrl;
    public ?int $gracePeriod;
    public ?int $dueInDays;
    public ?int $id;
    public ?bool $isAcceptableOnPublicDomain;
    public ?bool $isArchive;
    public ?bool $isDraft;
    public ?bool $isReplica;
    public ?bool $isOss;
    /** @var list<string> */
    public array $itemNotes;
    /** @var list<DocumentPosition> */
    public array $items;
    public ?int $lastPostboxId;
    public ?int $loginId;
    public ?string $number;
    public ?string $orderNumber;
    public ?string $buyerReference;
    public ?int $paidAmount;
    public ?string $paidAt;
    public ?int $pdfPages;
    public ?string $pdfTemplate;
    public ?bool $paymentLinkEnabled;
    public ?PaymentLinkLocale $paymentLinkLocale;
    public ?int $projectId;
    public ?DocumentRecurring $recurringOptions;
    public ?int $refId;
    public ?int $rootId;
    public ?ServiceDate $serviceDate;
    public ?string $shippingCountry;
    public ?DocumentStatus $status;
    public ?string $text;
    public ?string $textPrefix;
    public ?string $textTax;
    public ?string $title;
    public ?DocumentType $type;
    public ?bool $useShippingAddress;
    public ?string $vatCountry;
    public ?string $vatId;
    public ?string $fulfillmentCountry;
    public ?VatOption $vatOption;
    /** @var list<FileFormatConfig> */
    public array $fileFormatConfig;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<AdvancedDataField>|Undefined $advancedDataFields
     * @param list<int> $attachmentIds
     * @param list<string> $itemNotes
     * @param list<DocumentPosition>|Undefined $items
     * @param list<FileFormatConfig>|Undefined $fileFormatConfig
     */
    public function __construct(
        DocumentAddress|Undefined|null $address = Undefined::Value,
        array|Undefined $advancedDataFields = Undefined::Value,
        array $attachmentIds = [],
        DocumentAddress|Undefined|null $labelAddress = Undefined::Value,
        ?int $amount = null,
        ?int $amountNet = null,
        string|Undefined|null $anonymizeDueDate = Undefined::Value,
        ?AnonymizeStatus $anonymizeStatus = null,
        ?string $anonymizedAt = null,
        string|Undefined|null $bankDebitForm = Undefined::Value,
        ?string $billingCountry = null,
        CalcVatFrom|Undefined|null $calcVatFrom = Undefined::Value,
        ?int $cancelId = null,
        float|Undefined|null $cashAllowance = Undefined::Value,
        int|Undefined|null $cashAllowanceDays = Undefined::Value,
        string|Undefined|null $cashAllowanceText = Undefined::Value,
        int|Undefined|null $contactId = Undefined::Value,
        string|Undefined|null $contactLabel = Undefined::Value,
        string|Undefined|null $contactText = Undefined::Value,
        ?string $createdAt = null,
        string|Undefined|null $currency = Undefined::Value,
        int|Undefined|null $customerId = Undefined::Value,
        CustomerSnapshot|Undefined|null $customerSnapshot = Undefined::Value,
        string|Undefined|null $discount = Undefined::Value,
        CashDiscountType|Undefined|null $discountType = Undefined::Value,
        string|Undefined|null $documentDate = Undefined::Value,
        ?string $dueDate = null,
        ?string $editedAt = null,
        string|Undefined|null $externalId = Undefined::Value,
        string|Undefined|null $replicaUrl = Undefined::Value,
        int|Undefined|null $gracePeriod = Undefined::Value,
        int|Undefined|null $dueInDays = Undefined::Value,
        ?int $id = null,
        bool|Undefined|null $isAcceptableOnPublicDomain = Undefined::Value,
        bool|Undefined|null $isArchive = Undefined::Value,
        ?bool $isDraft = null,
        bool|Undefined|null $isReplica = Undefined::Value,
        bool|Undefined|null $isOss = Undefined::Value,
        array $itemNotes = [],
        array|Undefined $items = Undefined::Value,
        ?int $lastPostboxId = null,
        int|Undefined|null $loginId = Undefined::Value,
        string|Undefined|null $number = Undefined::Value,
        string|Undefined|null $orderNumber = Undefined::Value,
        string|Undefined|null $buyerReference = Undefined::Value,
        ?int $paidAmount = null,
        ?string $paidAt = null,
        ?int $pdfPages = null,
        string|Undefined|null $pdfTemplate = Undefined::Value,
        bool|Undefined|null $paymentLinkEnabled = Undefined::Value,
        PaymentLinkLocale|Undefined|null $paymentLinkLocale = Undefined::Value,
        int|Undefined|null $projectId = Undefined::Value,
        DocumentRecurring|Undefined|null $recurringOptions = Undefined::Value,
        int|Undefined|null $refId = Undefined::Value,
        ?int $rootId = null,
        ServiceDate|Undefined|null $serviceDate = Undefined::Value,
        string|Undefined|null $shippingCountry = Undefined::Value,
        DocumentStatus|Undefined|null $status = Undefined::Value,
        string|Undefined|null $text = Undefined::Value,
        string|Undefined|null $textPrefix = Undefined::Value,
        string|Undefined|null $textTax = Undefined::Value,
        string|Undefined|null $title = Undefined::Value,
        DocumentType|Undefined|null $type = Undefined::Value,
        bool|Undefined|null $useShippingAddress = Undefined::Value,
        string|Undefined|null $vatCountry = Undefined::Value,
        ?string $vatId = null,
        string|Undefined|null $fulfillmentCountry = Undefined::Value,
        VatOption|Undefined|null $vatOption = Undefined::Value,
        array|Undefined $fileFormatConfig = Undefined::Value,
    ) {
        $this->address = $address instanceof Undefined ? null : $address;
        $this->advancedDataFields = $advancedDataFields instanceof Undefined ? [] : $advancedDataFields;
        $this->attachmentIds = $attachmentIds;
        $this->labelAddress = $labelAddress instanceof Undefined ? null : $labelAddress;
        $this->amount = $amount;
        $this->amountNet = $amountNet;
        $this->anonymizeDueDate = $anonymizeDueDate instanceof Undefined ? null : $anonymizeDueDate;
        $this->anonymizeStatus = $anonymizeStatus;
        $this->anonymizedAt = $anonymizedAt;
        $this->bankDebitForm = $bankDebitForm instanceof Undefined ? null : $bankDebitForm;
        $this->billingCountry = $billingCountry;
        $this->calcVatFrom = $calcVatFrom instanceof Undefined ? null : $calcVatFrom;
        $this->cancelId = $cancelId;
        $this->cashAllowance = $cashAllowance instanceof Undefined ? null : $cashAllowance;
        $this->cashAllowanceDays = $cashAllowanceDays instanceof Undefined ? null : $cashAllowanceDays;
        $this->cashAllowanceText = $cashAllowanceText instanceof Undefined ? null : $cashAllowanceText;
        $this->contactId = $contactId instanceof Undefined ? null : $contactId;
        $this->contactLabel = $contactLabel instanceof Undefined ? null : $contactLabel;
        $this->contactText = $contactText instanceof Undefined ? null : $contactText;
        $this->createdAt = $createdAt;
        $this->currency = $currency instanceof Undefined ? null : $currency;
        $this->customerId = $customerId instanceof Undefined ? null : $customerId;
        $this->customerSnapshot = $customerSnapshot instanceof Undefined ? null : $customerSnapshot;
        $this->discount = $discount instanceof Undefined ? null : $discount;
        $this->discountType = $discountType instanceof Undefined ? null : $discountType;
        $this->documentDate = $documentDate instanceof Undefined ? null : $documentDate;
        $this->dueDate = $dueDate;
        $this->editedAt = $editedAt;
        $this->externalId = $externalId instanceof Undefined ? null : $externalId;
        $this->replicaUrl = $replicaUrl instanceof Undefined ? null : $replicaUrl;
        $this->gracePeriod = $gracePeriod instanceof Undefined ? null : $gracePeriod;
        $this->dueInDays = $dueInDays instanceof Undefined ? null : $dueInDays;
        $this->id = $id;
        $this->isAcceptableOnPublicDomain = $isAcceptableOnPublicDomain instanceof Undefined ? null : $isAcceptableOnPublicDomain;
        $this->isArchive = $isArchive instanceof Undefined ? null : $isArchive;
        $this->isDraft = $isDraft;
        $this->isReplica = $isReplica instanceof Undefined ? null : $isReplica;
        $this->isOss = $isOss instanceof Undefined ? null : $isOss;
        $this->itemNotes = $itemNotes;
        $this->items = $items instanceof Undefined ? [] : $items;
        $this->lastPostboxId = $lastPostboxId;
        $this->loginId = $loginId instanceof Undefined ? null : $loginId;
        $this->number = $number instanceof Undefined ? null : $number;
        $this->orderNumber = $orderNumber instanceof Undefined ? null : $orderNumber;
        $this->buyerReference = $buyerReference instanceof Undefined ? null : $buyerReference;
        $this->paidAmount = $paidAmount;
        $this->paidAt = $paidAt;
        $this->pdfPages = $pdfPages;
        $this->pdfTemplate = $pdfTemplate instanceof Undefined ? null : $pdfTemplate;
        $this->paymentLinkEnabled = $paymentLinkEnabled instanceof Undefined ? null : $paymentLinkEnabled;
        $this->paymentLinkLocale = $paymentLinkLocale instanceof Undefined ? null : $paymentLinkLocale;
        $this->projectId = $projectId instanceof Undefined ? null : $projectId;
        $this->recurringOptions = $recurringOptions instanceof Undefined ? null : $recurringOptions;
        $this->refId = $refId instanceof Undefined ? null : $refId;
        $this->rootId = $rootId;
        $this->serviceDate = $serviceDate instanceof Undefined ? null : $serviceDate;
        $this->shippingCountry = $shippingCountry instanceof Undefined ? null : $shippingCountry;
        $this->status = $status instanceof Undefined ? null : $status;
        $this->text = $text instanceof Undefined ? null : $text;
        $this->textPrefix = $textPrefix instanceof Undefined ? null : $textPrefix;
        $this->textTax = $textTax instanceof Undefined ? null : $textTax;
        $this->title = $title instanceof Undefined ? null : $title;
        $this->type = $type instanceof Undefined ? null : $type;
        $this->useShippingAddress = $useShippingAddress instanceof Undefined ? null : $useShippingAddress;
        $this->vatCountry = $vatCountry instanceof Undefined ? null : $vatCountry;
        $this->vatId = $vatId;
        $this->fulfillmentCountry = $fulfillmentCountry instanceof Undefined ? null : $fulfillmentCountry;
        $this->vatOption = $vatOption instanceof Undefined ? null : $vatOption;
        $this->fileFormatConfig = $fileFormatConfig instanceof Undefined ? [] : $fileFormatConfig;
        $this->explicit = self::explicitFields([
            'address' => $address,
            'advanced_data_fields' => $advancedDataFields,
            'label_address' => $labelAddress,
            'anonymize_due_date' => $anonymizeDueDate,
            'bank_debit_form' => $bankDebitForm,
            'calc_vat_from' => $calcVatFrom,
            'cash_allowance' => $cashAllowance,
            'cash_allowance_days' => $cashAllowanceDays,
            'cash_allowance_text' => $cashAllowanceText,
            'contact_id' => $contactId,
            'contact_label' => $contactLabel,
            'contact_text' => $contactText,
            'currency' => $currency,
            'customer_id' => $customerId,
            'customer_snapshot' => $customerSnapshot,
            'discount' => $discount,
            'discount_type' => $discountType,
            'document_date' => $documentDate,
            'external_id' => $externalId,
            'replica_url' => $replicaUrl,
            'grace_period' => $gracePeriod,
            'due_in_days' => $dueInDays,
            'is_acceptable_on_public_domain' => $isAcceptableOnPublicDomain,
            'is_archive' => $isArchive,
            'is_replica' => $isReplica,
            'is_oss' => $isOss,
            'items' => $items,
            'login_id' => $loginId,
            'number' => $number,
            'order_number' => $orderNumber,
            'buyer_reference' => $buyerReference,
            'pdf_template' => $pdfTemplate,
            'payment_link_enabled' => $paymentLinkEnabled,
            'payment_link_locale' => $paymentLinkLocale,
            'project_id' => $projectId,
            'recurring_options' => $recurringOptions,
            'ref_id' => $refId,
            'service_date' => $serviceDate,
            'shipping_country' => $shippingCountry,
            'status' => $status,
            'text' => $text,
            'text_prefix' => $textPrefix,
            'text_tax' => $textTax,
            'title' => $title,
            'type' => $type,
            'use_shipping_address' => $useShippingAddress,
            'vat_country' => $vatCountry,
            'fulfillment_country' => $fulfillmentCountry,
            'vat_option' => $vatOption,
            'file_format_config' => $fileFormatConfig,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            address: self::asModel(DocumentAddress::class, $data['address'] ?? null) ?? Undefined::Value,
            advancedDataFields: self::asModelList(AdvancedDataField::class, $data['advanced_data_fields'] ?? null) ?: Undefined::Value,
            attachmentIds: self::asIntList($data['attachment_ids'] ?? null),
            labelAddress: self::asModel(DocumentAddress::class, $data['label_address'] ?? null) ?? Undefined::Value,
            amount: self::asInt($data['amount'] ?? null),
            amountNet: self::asInt($data['amount_net'] ?? null),
            anonymizeDueDate: self::asString($data['anonymize_due_date'] ?? null) ?? Undefined::Value,
            anonymizeStatus: self::asEnum(AnonymizeStatus::class, $data['anonymize_status'] ?? null),
            anonymizedAt: self::asString($data['anonymized_at'] ?? null),
            bankDebitForm: self::asString($data['bank_debit_form'] ?? null) ?? Undefined::Value,
            billingCountry: self::asString($data['billing_country'] ?? null),
            calcVatFrom: self::asEnum(CalcVatFrom::class, $data['calc_vat_from'] ?? null) ?? Undefined::Value,
            cancelId: self::asInt($data['cancel_id'] ?? null),
            cashAllowance: self::asFloat($data['cash_allowance'] ?? null) ?? Undefined::Value,
            cashAllowanceDays: self::asInt($data['cash_allowance_days'] ?? null) ?? Undefined::Value,
            cashAllowanceText: self::asString($data['cash_allowance_text'] ?? null) ?? Undefined::Value,
            contactId: self::asInt($data['contact_id'] ?? null) ?? Undefined::Value,
            contactLabel: self::asString($data['contact_label'] ?? null) ?? Undefined::Value,
            contactText: self::asString($data['contact_text'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            currency: self::asString($data['currency'] ?? null) ?? Undefined::Value,
            customerId: self::asInt($data['customer_id'] ?? null) ?? Undefined::Value,
            customerSnapshot: self::asModel(CustomerSnapshot::class, $data['customer_snapshot'] ?? null) ?? Undefined::Value,
            discount: self::asString($data['discount'] ?? null) ?? Undefined::Value,
            discountType: self::asEnum(CashDiscountType::class, $data['discount_type'] ?? null) ?? Undefined::Value,
            documentDate: self::asString($data['document_date'] ?? null) ?? Undefined::Value,
            dueDate: self::asString($data['due_date'] ?? null),
            editedAt: self::asString($data['edited_at'] ?? null),
            externalId: self::asString($data['external_id'] ?? null) ?? Undefined::Value,
            replicaUrl: self::asString($data['replica_url'] ?? null) ?? Undefined::Value,
            gracePeriod: self::asInt($data['grace_period'] ?? null) ?? Undefined::Value,
            dueInDays: self::asInt($data['due_in_days'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            isAcceptableOnPublicDomain: self::asBool($data['is_acceptable_on_public_domain'] ?? null) ?? Undefined::Value,
            isArchive: self::asBool($data['is_archive'] ?? null) ?? Undefined::Value,
            isDraft: self::asBool($data['is_draft'] ?? null),
            isReplica: self::asBool($data['is_replica'] ?? null) ?? Undefined::Value,
            isOss: self::asBool($data['is_oss'] ?? null) ?? Undefined::Value,
            itemNotes: self::asStringList($data['item_notes'] ?? null),
            items: self::asModelList(DocumentPosition::class, $data['items'] ?? null) ?: Undefined::Value,
            lastPostboxId: self::asInt($data['last_postbox_id'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null) ?? Undefined::Value,
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            orderNumber: self::asString($data['order_number'] ?? null) ?? Undefined::Value,
            buyerReference: self::asString($data['buyer_reference'] ?? null) ?? Undefined::Value,
            paidAmount: self::asInt($data['paid_amount'] ?? null),
            paidAt: self::asString($data['paid_at'] ?? null),
            pdfPages: self::asInt($data['pdf_pages'] ?? null),
            pdfTemplate: self::asString($data['pdf_template'] ?? null) ?? Undefined::Value,
            paymentLinkEnabled: self::asBool($data['payment_link_enabled'] ?? null) ?? Undefined::Value,
            paymentLinkLocale: self::asEnum(PaymentLinkLocale::class, $data['payment_link_locale'] ?? null) ?? Undefined::Value,
            projectId: self::asInt($data['project_id'] ?? null) ?? Undefined::Value,
            recurringOptions: self::asModel(DocumentRecurring::class, $data['recurring_options'] ?? null) ?? Undefined::Value,
            refId: self::asInt($data['ref_id'] ?? null) ?? Undefined::Value,
            rootId: self::asInt($data['root_id'] ?? null),
            serviceDate: self::asModel(ServiceDate::class, $data['service_date'] ?? null) ?? Undefined::Value,
            shippingCountry: self::asString($data['shipping_country'] ?? null) ?? Undefined::Value,
            status: self::asEnum(DocumentStatus::class, $data['status'] ?? null) ?? Undefined::Value,
            text: self::asString($data['text'] ?? null) ?? Undefined::Value,
            textPrefix: self::asString($data['text_prefix'] ?? null) ?? Undefined::Value,
            textTax: self::asString($data['text_tax'] ?? null) ?? Undefined::Value,
            title: self::asString($data['title'] ?? null) ?? Undefined::Value,
            type: self::asEnum(DocumentType::class, $data['type'] ?? null) ?? Undefined::Value,
            useShippingAddress: self::asBool($data['use_shipping_address'] ?? null) ?? Undefined::Value,
            vatCountry: self::asString($data['vat_country'] ?? null) ?? Undefined::Value,
            vatId: self::asString($data['vat_id'] ?? null),
            fulfillmentCountry: self::asString($data['fulfillment_country'] ?? null) ?? Undefined::Value,
            vatOption: self::asEnum(VatOption::class, $data['vat_option'] ?? null) ?? Undefined::Value,
            fileFormatConfig: self::asModelList(FileFormatConfig::class, $data['file_format_config'] ?? null) ?: Undefined::Value,
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
        } elseif (isset($this->explicit['address'])) {
            $data['address'] = null;
        }
        if ($this->advancedDataFields !== []) {
            $data['advanced_data_fields'] = array_map(static fn(AdvancedDataField $item): array => $item->toArray(), $this->advancedDataFields);
        } elseif (isset($this->explicit['advanced_data_fields'])) {
            $data['advanced_data_fields'] = [];
        }
        if ($this->labelAddress !== null) {
            $nested = $this->labelAddress->toArray();

            if ($nested !== []) {
                $data['label_address'] = $nested;
            }
        } elseif (isset($this->explicit['label_address'])) {
            $data['label_address'] = null;
        }
        if ($this->anonymizeDueDate !== null) {
            $data['anonymize_due_date'] = $this->anonymizeDueDate;
        } elseif (isset($this->explicit['anonymize_due_date'])) {
            $data['anonymize_due_date'] = null;
        }
        if ($this->bankDebitForm !== null) {
            $data['bank_debit_form'] = $this->bankDebitForm;
        } elseif (isset($this->explicit['bank_debit_form'])) {
            $data['bank_debit_form'] = null;
        }
        if ($this->calcVatFrom !== null) {
            $data['calc_vat_from'] = $this->calcVatFrom->value;
        } elseif (isset($this->explicit['calc_vat_from'])) {
            $data['calc_vat_from'] = null;
        }
        if ($this->cashAllowance !== null) {
            $data['cash_allowance'] = $this->cashAllowance;
        } elseif (isset($this->explicit['cash_allowance'])) {
            $data['cash_allowance'] = null;
        }
        if ($this->cashAllowanceDays !== null) {
            $data['cash_allowance_days'] = $this->cashAllowanceDays;
        } elseif (isset($this->explicit['cash_allowance_days'])) {
            $data['cash_allowance_days'] = null;
        }
        if ($this->cashAllowanceText !== null) {
            $data['cash_allowance_text'] = $this->cashAllowanceText;
        } elseif (isset($this->explicit['cash_allowance_text'])) {
            $data['cash_allowance_text'] = null;
        }
        if ($this->contactId !== null) {
            $data['contact_id'] = $this->contactId;
        } elseif (isset($this->explicit['contact_id'])) {
            $data['contact_id'] = null;
        }
        if ($this->contactLabel !== null) {
            $data['contact_label'] = $this->contactLabel;
        } elseif (isset($this->explicit['contact_label'])) {
            $data['contact_label'] = null;
        }
        if ($this->contactText !== null) {
            $data['contact_text'] = $this->contactText;
        } elseif (isset($this->explicit['contact_text'])) {
            $data['contact_text'] = null;
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        } elseif (isset($this->explicit['currency'])) {
            $data['currency'] = null;
        }
        if ($this->customerId !== null) {
            $data['customer_id'] = $this->customerId;
        } elseif (isset($this->explicit['customer_id'])) {
            $data['customer_id'] = null;
        }
        if ($this->customerSnapshot !== null) {
            $nested = $this->customerSnapshot->toArray();

            if ($nested !== []) {
                $data['customer_snapshot'] = $nested;
            }
        } elseif (isset($this->explicit['customer_snapshot'])) {
            $data['customer_snapshot'] = null;
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
        if ($this->documentDate !== null) {
            $data['document_date'] = $this->documentDate;
        } elseif (isset($this->explicit['document_date'])) {
            $data['document_date'] = null;
        }
        if ($this->externalId !== null) {
            $data['external_id'] = $this->externalId;
        } elseif (isset($this->explicit['external_id'])) {
            $data['external_id'] = null;
        }
        if ($this->replicaUrl !== null) {
            $data['replica_url'] = $this->replicaUrl;
        } elseif (isset($this->explicit['replica_url'])) {
            $data['replica_url'] = null;
        }
        if ($this->gracePeriod !== null) {
            $data['grace_period'] = $this->gracePeriod;
        } elseif (isset($this->explicit['grace_period'])) {
            $data['grace_period'] = null;
        }
        if ($this->dueInDays !== null) {
            $data['due_in_days'] = $this->dueInDays;
        } elseif (isset($this->explicit['due_in_days'])) {
            $data['due_in_days'] = null;
        }
        if ($this->isAcceptableOnPublicDomain !== null) {
            $data['is_acceptable_on_public_domain'] = $this->isAcceptableOnPublicDomain;
        } elseif (isset($this->explicit['is_acceptable_on_public_domain'])) {
            $data['is_acceptable_on_public_domain'] = null;
        }
        if ($this->isArchive !== null) {
            $data['is_archive'] = $this->isArchive;
        } elseif (isset($this->explicit['is_archive'])) {
            $data['is_archive'] = null;
        }
        if ($this->isReplica !== null) {
            $data['is_replica'] = $this->isReplica;
        } elseif (isset($this->explicit['is_replica'])) {
            $data['is_replica'] = null;
        }
        if ($this->isOss !== null) {
            $data['is_oss'] = $this->isOss;
        } elseif (isset($this->explicit['is_oss'])) {
            $data['is_oss'] = null;
        }
        if ($this->items !== []) {
            $data['items'] = array_map(static fn(DocumentPosition $item): array => $item->toArray(), $this->items);
        } elseif (isset($this->explicit['items'])) {
            $data['items'] = [];
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        } elseif (isset($this->explicit['login_id'])) {
            $data['login_id'] = null;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        } elseif (isset($this->explicit['number'])) {
            $data['number'] = null;
        }
        if ($this->orderNumber !== null) {
            $data['order_number'] = $this->orderNumber;
        } elseif (isset($this->explicit['order_number'])) {
            $data['order_number'] = null;
        }
        if ($this->buyerReference !== null) {
            $data['buyer_reference'] = $this->buyerReference;
        } elseif (isset($this->explicit['buyer_reference'])) {
            $data['buyer_reference'] = null;
        }
        if ($this->pdfTemplate !== null) {
            $data['pdf_template'] = $this->pdfTemplate;
        } elseif (isset($this->explicit['pdf_template'])) {
            $data['pdf_template'] = null;
        }
        if ($this->paymentLinkEnabled !== null) {
            $data['payment_link_enabled'] = $this->paymentLinkEnabled;
        } elseif (isset($this->explicit['payment_link_enabled'])) {
            $data['payment_link_enabled'] = null;
        }
        if ($this->paymentLinkLocale !== null) {
            $data['payment_link_locale'] = $this->paymentLinkLocale->value;
        } elseif (isset($this->explicit['payment_link_locale'])) {
            $data['payment_link_locale'] = null;
        }
        if ($this->projectId !== null) {
            $data['project_id'] = $this->projectId;
        } elseif (isset($this->explicit['project_id'])) {
            $data['project_id'] = null;
        }
        if ($this->recurringOptions !== null) {
            $nested = $this->recurringOptions->toArray();

            if ($nested !== []) {
                $data['recurring_options'] = $nested;
            }
        } elseif (isset($this->explicit['recurring_options'])) {
            $data['recurring_options'] = null;
        }
        if ($this->refId !== null) {
            $data['ref_id'] = $this->refId;
        } elseif (isset($this->explicit['ref_id'])) {
            $data['ref_id'] = null;
        }
        if ($this->serviceDate !== null) {
            $nested = $this->serviceDate->toArray();

            if ($nested !== []) {
                $data['service_date'] = $nested;
            }
        } elseif (isset($this->explicit['service_date'])) {
            $data['service_date'] = null;
        }
        if ($this->shippingCountry !== null) {
            $data['shipping_country'] = $this->shippingCountry;
        } elseif (isset($this->explicit['shipping_country'])) {
            $data['shipping_country'] = null;
        }
        if ($this->status !== null) {
            $data['status'] = $this->status->value;
        } elseif (isset($this->explicit['status'])) {
            $data['status'] = null;
        }
        if ($this->text !== null) {
            $data['text'] = $this->text;
        } elseif (isset($this->explicit['text'])) {
            $data['text'] = null;
        }
        if ($this->textPrefix !== null) {
            $data['text_prefix'] = $this->textPrefix;
        } elseif (isset($this->explicit['text_prefix'])) {
            $data['text_prefix'] = null;
        }
        if ($this->textTax !== null) {
            $data['text_tax'] = $this->textTax;
        } elseif (isset($this->explicit['text_tax'])) {
            $data['text_tax'] = null;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        } elseif (isset($this->explicit['title'])) {
            $data['title'] = null;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type->value;
        } elseif (isset($this->explicit['type'])) {
            $data['type'] = null;
        }
        if ($this->useShippingAddress !== null) {
            $data['use_shipping_address'] = $this->useShippingAddress;
        } elseif (isset($this->explicit['use_shipping_address'])) {
            $data['use_shipping_address'] = null;
        }
        if ($this->vatCountry !== null) {
            $data['vat_country'] = $this->vatCountry;
        } elseif (isset($this->explicit['vat_country'])) {
            $data['vat_country'] = null;
        }
        if ($this->fulfillmentCountry !== null) {
            $data['fulfillment_country'] = $this->fulfillmentCountry;
        } elseif (isset($this->explicit['fulfillment_country'])) {
            $data['fulfillment_country'] = null;
        }
        if ($this->vatOption !== null) {
            $data['vat_option'] = $this->vatOption->value;
        } elseif (isset($this->explicit['vat_option'])) {
            $data['vat_option'] = null;
        }
        if ($this->fileFormatConfig !== []) {
            $data['file_format_config'] = array_map(static fn(FileFormatConfig $item): array => $item->toArray(), $this->fileFormatConfig);
        } elseif (isset($this->explicit['file_format_config'])) {
            $data['file_format_config'] = [];
        }

        return $data;
    }
}
