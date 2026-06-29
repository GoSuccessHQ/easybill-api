<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use GoSuccess\Easybill\Enum\AcquireOption;
use GoSuccess\Easybill\Enum\CashDiscountType;
use GoSuccess\Easybill\Enum\DocumentPdfType;
use GoSuccess\Easybill\Enum\PaymentOption;
use GoSuccess\Easybill\Enum\SalePriceLevel;
use GoSuccess\Easybill\Enum\Salutation;
use GoSuccess\Easybill\Enum\SepaAgreement;
use GoSuccess\Easybill\Enum\TaxOptions;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json CustomerSnapshot
 */
final readonly class CustomerSnapshot extends AbstractModel
{
    public function __construct(
        public ?AcquireOption $acquireOptions = null,
        /** @var list<int> */
        public array $additionalGroupsIds = [],
        public ?string $bankAccount = null,
        public ?string $bankAccountOwner = null,
        public ?string $bankBic = null,
        public ?string $bankCode = null,
        public ?string $bankIban = null,
        public ?string $bankName = null,
        public ?string $birthDate = null,
        public ?float $cashAllowance = null,
        public ?int $cashAllowanceDays = null,
        public ?float $cashDiscount = null,
        public ?CashDiscountType $cashDiscountType = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $companyName = null,
        public ?string $country = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $deliveryTitle = null,
        public ?string $deliveryCity = null,
        public ?string $deliveryState = null,
        public ?string $deliveryCompanyName = null,
        public ?string $deliveryCountry = null,
        public ?string $deliveryFirstName = null,
        public ?string $deliveryLastName = null,
        public ?bool $deliveryPersonal = null,
        public ?Salutation $deliverySalutation = null,
        public ?string $deliveryStreet = null,
        public ?string $deliverySuffix1 = null,
        public ?string $deliverySuffix2 = null,
        public ?string $deliveryZipCode = null,
        public ?string $displayName = null,
        /** @var list<string> */
        public array $emails = [],
        public ?string $fax = null,
        public ?string $firstName = null,
        public ?int $gracePeriod = null,
        public ?int $dueInDays = null,
        public ?int $groupId = null,
        public ?int $id = null,
        public ?string $info1 = null,
        public ?string $info2 = null,
        public ?string $internet = null,
        public ?string $lastName = null,
        public ?int $loginId = null,
        public ?string $mobile = null,
        public ?string $note = null,
        public ?string $number = null,
        public ?string $supplierNumber = null,
        public ?PaymentOption $paymentOptions = null,
        public ?string $paymentProviderMandateStatus = null,
        public ?bool $personal = null,
        public ?string $phone1 = null,
        public ?string $phone2 = null,
        public ?string $postbox = null,
        public ?string $postboxCity = null,
        public ?string $postboxState = null,
        public ?string $postboxCountry = null,
        public ?string $postboxZipCode = null,
        public ?SalePriceLevel $salePriceLevel = null,
        public ?Salutation $salutation = null,
        public ?SepaAgreement $sepaAgreement = null,
        public ?string $sepaAgreementDate = null,
        public ?string $sepaMandateReference = null,
        public ?string $sinceDate = null,
        public ?string $street = null,
        public ?string $suffix1 = null,
        public ?string $suffix2 = null,
        public ?string $taxNumber = null,
        public ?string $court = null,
        public ?string $courtRegistryNumber = null,
        public ?TaxOptions $taxOptions = null,
        public ?string $title = null,
        public ?bool $archived = null,
        public ?string $vatIdentifier = null,
        public ?string $zipCode = null,
        public ?DocumentPdfType $documentPdfType = null,
        public ?string $buyerReference = null,
        public ?string $foreignSupplierNumber = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            acquireOptions: self::asEnum(AcquireOption::class, $data['acquire_options'] ?? null),
            additionalGroupsIds: self::asIntList($data['additional_groups_ids'] ?? null),
            bankAccount: self::asString($data['bank_account'] ?? null),
            bankAccountOwner: self::asString($data['bank_account_owner'] ?? null),
            bankBic: self::asString($data['bank_bic'] ?? null),
            bankCode: self::asString($data['bank_code'] ?? null),
            bankIban: self::asString($data['bank_iban'] ?? null),
            bankName: self::asString($data['bank_name'] ?? null),
            birthDate: self::asString($data['birth_date'] ?? null),
            cashAllowance: self::asFloat($data['cash_allowance'] ?? null),
            cashAllowanceDays: self::asInt($data['cash_allowance_days'] ?? null),
            cashDiscount: self::asFloat($data['cash_discount'] ?? null),
            cashDiscountType: self::asEnum(CashDiscountType::class, $data['cash_discount_type'] ?? null),
            city: self::asString($data['city'] ?? null),
            state: self::asString($data['state'] ?? null),
            companyName: self::asString($data['company_name'] ?? null),
            country: self::asString($data['country'] ?? null),
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
            deliveryTitle: self::asString($data['delivery_title'] ?? null),
            deliveryCity: self::asString($data['delivery_city'] ?? null),
            deliveryState: self::asString($data['delivery_state'] ?? null),
            deliveryCompanyName: self::asString($data['delivery_company_name'] ?? null),
            deliveryCountry: self::asString($data['delivery_country'] ?? null),
            deliveryFirstName: self::asString($data['delivery_first_name'] ?? null),
            deliveryLastName: self::asString($data['delivery_last_name'] ?? null),
            deliveryPersonal: self::asBool($data['delivery_personal'] ?? null),
            deliverySalutation: self::asEnum(Salutation::class, $data['delivery_salutation'] ?? null),
            deliveryStreet: self::asString($data['delivery_street'] ?? null),
            deliverySuffix1: self::asString($data['delivery_suffix_1'] ?? null),
            deliverySuffix2: self::asString($data['delivery_suffix_2'] ?? null),
            deliveryZipCode: self::asString($data['delivery_zip_code'] ?? null),
            displayName: self::asString($data['display_name'] ?? null),
            emails: self::asStringList($data['emails'] ?? null),
            fax: self::asString($data['fax'] ?? null),
            firstName: self::asString($data['first_name'] ?? null),
            gracePeriod: self::asInt($data['grace_period'] ?? null),
            dueInDays: self::asInt($data['due_in_days'] ?? null),
            groupId: self::asInt($data['group_id'] ?? null),
            id: self::asInt($data['id'] ?? null),
            info1: self::asString($data['info_1'] ?? null),
            info2: self::asString($data['info_2'] ?? null),
            internet: self::asString($data['internet'] ?? null),
            lastName: self::asString($data['last_name'] ?? null),
            loginId: self::asInt($data['login_id'] ?? null),
            mobile: self::asString($data['mobile'] ?? null),
            note: self::asString($data['note'] ?? null),
            number: self::asString($data['number'] ?? null),
            supplierNumber: self::asString($data['supplier_number'] ?? null),
            paymentOptions: self::asEnum(PaymentOption::class, $data['payment_options'] ?? null),
            paymentProviderMandateStatus: self::asString($data['payment_provider_mandate_status'] ?? null),
            personal: self::asBool($data['personal'] ?? null),
            phone1: self::asString($data['phone_1'] ?? null),
            phone2: self::asString($data['phone_2'] ?? null),
            postbox: self::asString($data['postbox'] ?? null),
            postboxCity: self::asString($data['postbox_city'] ?? null),
            postboxState: self::asString($data['postbox_state'] ?? null),
            postboxCountry: self::asString($data['postbox_country'] ?? null),
            postboxZipCode: self::asString($data['postbox_zip_code'] ?? null),
            salePriceLevel: self::asEnum(SalePriceLevel::class, $data['sale_price_level'] ?? null),
            salutation: self::asEnum(Salutation::class, $data['salutation'] ?? null),
            sepaAgreement: self::asEnum(SepaAgreement::class, $data['sepa_agreement'] ?? null),
            sepaAgreementDate: self::asString($data['sepa_agreement_date'] ?? null),
            sepaMandateReference: self::asString($data['sepa_mandate_reference'] ?? null),
            sinceDate: self::asString($data['since_date'] ?? null),
            street: self::asString($data['street'] ?? null),
            suffix1: self::asString($data['suffix_1'] ?? null),
            suffix2: self::asString($data['suffix_2'] ?? null),
            taxNumber: self::asString($data['tax_number'] ?? null),
            court: self::asString($data['court'] ?? null),
            courtRegistryNumber: self::asString($data['court_registry_number'] ?? null),
            taxOptions: self::asEnum(TaxOptions::class, $data['tax_options'] ?? null),
            title: self::asString($data['title'] ?? null),
            archived: self::asBool($data['archived'] ?? null),
            vatIdentifier: self::asString($data['vat_identifier'] ?? null),
            zipCode: self::asString($data['zip_code'] ?? null),
            documentPdfType: self::asEnum(DocumentPdfType::class, $data['document_pdf_type'] ?? null),
            buyerReference: self::asString($data['buyer_reference'] ?? null),
            foreignSupplierNumber: self::asString($data['foreign_supplier_number'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->acquireOptions !== null) {
            $data['acquire_options'] = $this->acquireOptions->value;
        }
        if ($this->additionalGroupsIds !== []) {
            $data['additional_groups_ids'] = $this->additionalGroupsIds;
        }
        if ($this->bankAccount !== null) {
            $data['bank_account'] = $this->bankAccount;
        }
        if ($this->bankAccountOwner !== null) {
            $data['bank_account_owner'] = $this->bankAccountOwner;
        }
        if ($this->bankBic !== null) {
            $data['bank_bic'] = $this->bankBic;
        }
        if ($this->bankCode !== null) {
            $data['bank_code'] = $this->bankCode;
        }
        if ($this->bankIban !== null) {
            $data['bank_iban'] = $this->bankIban;
        }
        if ($this->bankName !== null) {
            $data['bank_name'] = $this->bankName;
        }
        if ($this->birthDate !== null) {
            $data['birth_date'] = $this->birthDate;
        }
        if ($this->cashAllowance !== null) {
            $data['cash_allowance'] = $this->cashAllowance;
        }
        if ($this->cashAllowanceDays !== null) {
            $data['cash_allowance_days'] = $this->cashAllowanceDays;
        }
        if ($this->cashDiscount !== null) {
            $data['cash_discount'] = $this->cashDiscount;
        }
        if ($this->cashDiscountType !== null) {
            $data['cash_discount_type'] = $this->cashDiscountType->value;
        }
        if ($this->city !== null) {
            $data['city'] = $this->city;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        }
        if ($this->companyName !== null) {
            $data['company_name'] = $this->companyName;
        }
        if ($this->country !== null) {
            $data['country'] = $this->country;
        }
        if ($this->deliveryTitle !== null) {
            $data['delivery_title'] = $this->deliveryTitle;
        }
        if ($this->deliveryCity !== null) {
            $data['delivery_city'] = $this->deliveryCity;
        }
        if ($this->deliveryState !== null) {
            $data['delivery_state'] = $this->deliveryState;
        }
        if ($this->deliveryCompanyName !== null) {
            $data['delivery_company_name'] = $this->deliveryCompanyName;
        }
        if ($this->deliveryCountry !== null) {
            $data['delivery_country'] = $this->deliveryCountry;
        }
        if ($this->deliveryFirstName !== null) {
            $data['delivery_first_name'] = $this->deliveryFirstName;
        }
        if ($this->deliveryLastName !== null) {
            $data['delivery_last_name'] = $this->deliveryLastName;
        }
        if ($this->deliveryPersonal !== null) {
            $data['delivery_personal'] = $this->deliveryPersonal;
        }
        if ($this->deliverySalutation !== null) {
            $data['delivery_salutation'] = $this->deliverySalutation->value;
        }
        if ($this->deliveryStreet !== null) {
            $data['delivery_street'] = $this->deliveryStreet;
        }
        if ($this->deliverySuffix1 !== null) {
            $data['delivery_suffix_1'] = $this->deliverySuffix1;
        }
        if ($this->deliverySuffix2 !== null) {
            $data['delivery_suffix_2'] = $this->deliverySuffix2;
        }
        if ($this->deliveryZipCode !== null) {
            $data['delivery_zip_code'] = $this->deliveryZipCode;
        }
        if ($this->emails !== []) {
            $data['emails'] = $this->emails;
        }
        if ($this->fax !== null) {
            $data['fax'] = $this->fax;
        }
        if ($this->firstName !== null) {
            $data['first_name'] = $this->firstName;
        }
        if ($this->gracePeriod !== null) {
            $data['grace_period'] = $this->gracePeriod;
        }
        if ($this->dueInDays !== null) {
            $data['due_in_days'] = $this->dueInDays;
        }
        if ($this->groupId !== null) {
            $data['group_id'] = $this->groupId;
        }
        if ($this->info1 !== null) {
            $data['info_1'] = $this->info1;
        }
        if ($this->info2 !== null) {
            $data['info_2'] = $this->info2;
        }
        if ($this->internet !== null) {
            $data['internet'] = $this->internet;
        }
        if ($this->lastName !== null) {
            $data['last_name'] = $this->lastName;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        }
        if ($this->mobile !== null) {
            $data['mobile'] = $this->mobile;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        }
        if ($this->supplierNumber !== null) {
            $data['supplier_number'] = $this->supplierNumber;
        }
        if ($this->paymentOptions !== null) {
            $data['payment_options'] = $this->paymentOptions->value;
        }
        if ($this->personal !== null) {
            $data['personal'] = $this->personal;
        }
        if ($this->phone1 !== null) {
            $data['phone_1'] = $this->phone1;
        }
        if ($this->phone2 !== null) {
            $data['phone_2'] = $this->phone2;
        }
        if ($this->postbox !== null) {
            $data['postbox'] = $this->postbox;
        }
        if ($this->postboxCity !== null) {
            $data['postbox_city'] = $this->postboxCity;
        }
        if ($this->postboxState !== null) {
            $data['postbox_state'] = $this->postboxState;
        }
        if ($this->postboxCountry !== null) {
            $data['postbox_country'] = $this->postboxCountry;
        }
        if ($this->postboxZipCode !== null) {
            $data['postbox_zip_code'] = $this->postboxZipCode;
        }
        if ($this->salePriceLevel !== null) {
            $data['sale_price_level'] = $this->salePriceLevel->value;
        }
        if ($this->salutation !== null) {
            $data['salutation'] = $this->salutation->value;
        }
        if ($this->sepaAgreement !== null) {
            $data['sepa_agreement'] = $this->sepaAgreement->value;
        }
        if ($this->sepaAgreementDate !== null) {
            $data['sepa_agreement_date'] = $this->sepaAgreementDate;
        }
        if ($this->sepaMandateReference !== null) {
            $data['sepa_mandate_reference'] = $this->sepaMandateReference;
        }
        if ($this->sinceDate !== null) {
            $data['since_date'] = $this->sinceDate;
        }
        if ($this->street !== null) {
            $data['street'] = $this->street;
        }
        if ($this->suffix1 !== null) {
            $data['suffix_1'] = $this->suffix1;
        }
        if ($this->suffix2 !== null) {
            $data['suffix_2'] = $this->suffix2;
        }
        if ($this->taxNumber !== null) {
            $data['tax_number'] = $this->taxNumber;
        }
        if ($this->court !== null) {
            $data['court'] = $this->court;
        }
        if ($this->courtRegistryNumber !== null) {
            $data['court_registry_number'] = $this->courtRegistryNumber;
        }
        if ($this->taxOptions !== null) {
            $data['tax_options'] = $this->taxOptions->value;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        }
        if ($this->archived !== null) {
            $data['archived'] = $this->archived;
        }
        if ($this->vatIdentifier !== null) {
            $data['vat_identifier'] = $this->vatIdentifier;
        }
        if ($this->zipCode !== null) {
            $data['zip_code'] = $this->zipCode;
        }
        if ($this->documentPdfType !== null) {
            $data['document_pdf_type'] = $this->documentPdfType->value;
        }
        if ($this->buyerReference !== null) {
            $data['buyer_reference'] = $this->buyerReference;
        }
        if ($this->foreignSupplierNumber !== null) {
            $data['foreign_supplier_number'] = $this->foreignSupplierNumber;
        }

        return $data;
    }
}
