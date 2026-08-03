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
    public ?AcquireOption $acquireOptions;
    /** @var list<int> */
    public array $additionalGroupsIds;
    public ?string $bankAccount;
    public ?string $bankAccountOwner;
    public ?string $bankBic;
    public ?string $bankCode;
    public ?string $bankIban;
    public ?string $bankName;
    public ?string $birthDate;
    public ?float $cashAllowance;
    public ?int $cashAllowanceDays;
    public ?float $cashDiscount;
    public ?CashDiscountType $cashDiscountType;
    public ?string $city;
    public ?string $state;
    public ?string $companyName;
    public ?string $country;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?string $deliveryTitle;
    public ?string $deliveryCity;
    public ?string $deliveryState;
    public ?string $deliveryCompanyName;
    public ?string $deliveryCountry;
    public ?string $deliveryFirstName;
    public ?string $deliveryLastName;
    public ?bool $deliveryPersonal;
    public ?Salutation $deliverySalutation;
    public ?string $deliveryStreet;
    public ?string $deliverySuffix1;
    public ?string $deliverySuffix2;
    public ?string $deliveryZipCode;
    public ?string $displayName;
    /** @var list<string> */
    public array $emails;
    public ?string $fax;
    public ?string $firstName;
    public ?int $gracePeriod;
    public ?int $dueInDays;
    public ?int $groupId;
    public ?int $id;
    public ?string $info1;
    public ?string $info2;
    public ?string $internet;
    public ?string $lastName;
    public ?int $loginId;
    public ?string $mobile;
    public ?string $note;
    public ?string $number;
    public ?string $supplierNumber;
    public ?PaymentOption $paymentOptions;
    public ?string $paymentProviderMandateStatus;
    public ?bool $personal;
    public ?string $phone1;
    public ?string $phone2;
    public ?string $postbox;
    public ?string $postboxCity;
    public ?string $postboxState;
    public ?string $postboxCountry;
    public ?string $postboxZipCode;
    public ?SalePriceLevel $salePriceLevel;
    public ?Salutation $salutation;
    public ?SepaAgreement $sepaAgreement;
    public ?string $sepaAgreementDate;
    public ?string $sepaMandateReference;
    public ?string $sinceDate;
    public ?string $street;
    public ?string $suffix1;
    public ?string $suffix2;
    public ?string $taxNumber;
    public ?string $court;
    public ?string $courtRegistryNumber;
    public ?TaxOptions $taxOptions;
    public ?string $title;
    public ?bool $archived;
    public ?string $vatIdentifier;
    public ?string $zipCode;
    public ?DocumentPdfType $documentPdfType;
    public ?string $buyerReference;
    public ?string $foreignSupplierNumber;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    /**
     * @param list<int>|Undefined $additionalGroupsIds
     * @param list<string>|Undefined $emails
     */
    public function __construct(
        AcquireOption|Undefined|null $acquireOptions = Undefined::Value,
        array|Undefined $additionalGroupsIds = Undefined::Value,
        string|Undefined|null $bankAccount = Undefined::Value,
        string|Undefined|null $bankAccountOwner = Undefined::Value,
        string|Undefined|null $bankBic = Undefined::Value,
        string|Undefined|null $bankCode = Undefined::Value,
        string|Undefined|null $bankIban = Undefined::Value,
        string|Undefined|null $bankName = Undefined::Value,
        string|Undefined|null $birthDate = Undefined::Value,
        float|Undefined|null $cashAllowance = Undefined::Value,
        int|Undefined|null $cashAllowanceDays = Undefined::Value,
        float|Undefined|null $cashDiscount = Undefined::Value,
        CashDiscountType|Undefined|null $cashDiscountType = Undefined::Value,
        string|Undefined|null $city = Undefined::Value,
        string|Undefined|null $state = Undefined::Value,
        string|Undefined|null $companyName = Undefined::Value,
        string|Undefined|null $country = Undefined::Value,
        ?string $createdAt = null,
        ?string $updatedAt = null,
        string|Undefined|null $deliveryTitle = Undefined::Value,
        string|Undefined|null $deliveryCity = Undefined::Value,
        string|Undefined|null $deliveryState = Undefined::Value,
        string|Undefined|null $deliveryCompanyName = Undefined::Value,
        string|Undefined|null $deliveryCountry = Undefined::Value,
        string|Undefined|null $deliveryFirstName = Undefined::Value,
        string|Undefined|null $deliveryLastName = Undefined::Value,
        bool|Undefined|null $deliveryPersonal = Undefined::Value,
        Salutation|Undefined|null $deliverySalutation = Undefined::Value,
        string|Undefined|null $deliveryStreet = Undefined::Value,
        string|Undefined|null $deliverySuffix1 = Undefined::Value,
        string|Undefined|null $deliverySuffix2 = Undefined::Value,
        string|Undefined|null $deliveryZipCode = Undefined::Value,
        ?string $displayName = null,
        array|Undefined $emails = Undefined::Value,
        string|Undefined|null $fax = Undefined::Value,
        string|Undefined|null $firstName = Undefined::Value,
        int|Undefined|null $gracePeriod = Undefined::Value,
        int|Undefined|null $dueInDays = Undefined::Value,
        int|Undefined|null $groupId = Undefined::Value,
        ?int $id = null,
        string|Undefined|null $info1 = Undefined::Value,
        string|Undefined|null $info2 = Undefined::Value,
        string|Undefined|null $internet = Undefined::Value,
        string|Undefined|null $lastName = Undefined::Value,
        int|Undefined|null $loginId = Undefined::Value,
        string|Undefined|null $mobile = Undefined::Value,
        string|Undefined|null $note = Undefined::Value,
        string|Undefined|null $number = Undefined::Value,
        string|Undefined|null $supplierNumber = Undefined::Value,
        PaymentOption|Undefined|null $paymentOptions = Undefined::Value,
        ?string $paymentProviderMandateStatus = null,
        bool|Undefined|null $personal = Undefined::Value,
        string|Undefined|null $phone1 = Undefined::Value,
        string|Undefined|null $phone2 = Undefined::Value,
        string|Undefined|null $postbox = Undefined::Value,
        string|Undefined|null $postboxCity = Undefined::Value,
        string|Undefined|null $postboxState = Undefined::Value,
        string|Undefined|null $postboxCountry = Undefined::Value,
        string|Undefined|null $postboxZipCode = Undefined::Value,
        SalePriceLevel|Undefined|null $salePriceLevel = Undefined::Value,
        Salutation|Undefined|null $salutation = Undefined::Value,
        SepaAgreement|Undefined|null $sepaAgreement = Undefined::Value,
        string|Undefined|null $sepaAgreementDate = Undefined::Value,
        string|Undefined|null $sepaMandateReference = Undefined::Value,
        string|Undefined|null $sinceDate = Undefined::Value,
        string|Undefined|null $street = Undefined::Value,
        string|Undefined|null $suffix1 = Undefined::Value,
        string|Undefined|null $suffix2 = Undefined::Value,
        string|Undefined|null $taxNumber = Undefined::Value,
        string|Undefined|null $court = Undefined::Value,
        string|Undefined|null $courtRegistryNumber = Undefined::Value,
        TaxOptions|Undefined|null $taxOptions = Undefined::Value,
        string|Undefined|null $title = Undefined::Value,
        bool|Undefined|null $archived = Undefined::Value,
        string|Undefined|null $vatIdentifier = Undefined::Value,
        string|Undefined|null $zipCode = Undefined::Value,
        DocumentPdfType|Undefined|null $documentPdfType = Undefined::Value,
        string|Undefined|null $buyerReference = Undefined::Value,
        string|Undefined|null $foreignSupplierNumber = Undefined::Value,
    ) {
        $this->acquireOptions = $acquireOptions instanceof Undefined ? null : $acquireOptions;
        $this->additionalGroupsIds = $additionalGroupsIds instanceof Undefined ? [] : $additionalGroupsIds;
        $this->bankAccount = $bankAccount instanceof Undefined ? null : $bankAccount;
        $this->bankAccountOwner = $bankAccountOwner instanceof Undefined ? null : $bankAccountOwner;
        $this->bankBic = $bankBic instanceof Undefined ? null : $bankBic;
        $this->bankCode = $bankCode instanceof Undefined ? null : $bankCode;
        $this->bankIban = $bankIban instanceof Undefined ? null : $bankIban;
        $this->bankName = $bankName instanceof Undefined ? null : $bankName;
        $this->birthDate = $birthDate instanceof Undefined ? null : $birthDate;
        $this->cashAllowance = $cashAllowance instanceof Undefined ? null : $cashAllowance;
        $this->cashAllowanceDays = $cashAllowanceDays instanceof Undefined ? null : $cashAllowanceDays;
        $this->cashDiscount = $cashDiscount instanceof Undefined ? null : $cashDiscount;
        $this->cashDiscountType = $cashDiscountType instanceof Undefined ? null : $cashDiscountType;
        $this->city = $city instanceof Undefined ? null : $city;
        $this->state = $state instanceof Undefined ? null : $state;
        $this->companyName = $companyName instanceof Undefined ? null : $companyName;
        $this->country = $country instanceof Undefined ? null : $country;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deliveryTitle = $deliveryTitle instanceof Undefined ? null : $deliveryTitle;
        $this->deliveryCity = $deliveryCity instanceof Undefined ? null : $deliveryCity;
        $this->deliveryState = $deliveryState instanceof Undefined ? null : $deliveryState;
        $this->deliveryCompanyName = $deliveryCompanyName instanceof Undefined ? null : $deliveryCompanyName;
        $this->deliveryCountry = $deliveryCountry instanceof Undefined ? null : $deliveryCountry;
        $this->deliveryFirstName = $deliveryFirstName instanceof Undefined ? null : $deliveryFirstName;
        $this->deliveryLastName = $deliveryLastName instanceof Undefined ? null : $deliveryLastName;
        $this->deliveryPersonal = $deliveryPersonal instanceof Undefined ? null : $deliveryPersonal;
        $this->deliverySalutation = $deliverySalutation instanceof Undefined ? null : $deliverySalutation;
        $this->deliveryStreet = $deliveryStreet instanceof Undefined ? null : $deliveryStreet;
        $this->deliverySuffix1 = $deliverySuffix1 instanceof Undefined ? null : $deliverySuffix1;
        $this->deliverySuffix2 = $deliverySuffix2 instanceof Undefined ? null : $deliverySuffix2;
        $this->deliveryZipCode = $deliveryZipCode instanceof Undefined ? null : $deliveryZipCode;
        $this->displayName = $displayName;
        $this->emails = $emails instanceof Undefined ? [] : $emails;
        $this->fax = $fax instanceof Undefined ? null : $fax;
        $this->firstName = $firstName instanceof Undefined ? null : $firstName;
        $this->gracePeriod = $gracePeriod instanceof Undefined ? null : $gracePeriod;
        $this->dueInDays = $dueInDays instanceof Undefined ? null : $dueInDays;
        $this->groupId = $groupId instanceof Undefined ? null : $groupId;
        $this->id = $id;
        $this->info1 = $info1 instanceof Undefined ? null : $info1;
        $this->info2 = $info2 instanceof Undefined ? null : $info2;
        $this->internet = $internet instanceof Undefined ? null : $internet;
        $this->lastName = $lastName instanceof Undefined ? null : $lastName;
        $this->loginId = $loginId instanceof Undefined ? null : $loginId;
        $this->mobile = $mobile instanceof Undefined ? null : $mobile;
        $this->note = $note instanceof Undefined ? null : $note;
        $this->number = $number instanceof Undefined ? null : $number;
        $this->supplierNumber = $supplierNumber instanceof Undefined ? null : $supplierNumber;
        $this->paymentOptions = $paymentOptions instanceof Undefined ? null : $paymentOptions;
        $this->paymentProviderMandateStatus = $paymentProviderMandateStatus;
        $this->personal = $personal instanceof Undefined ? null : $personal;
        $this->phone1 = $phone1 instanceof Undefined ? null : $phone1;
        $this->phone2 = $phone2 instanceof Undefined ? null : $phone2;
        $this->postbox = $postbox instanceof Undefined ? null : $postbox;
        $this->postboxCity = $postboxCity instanceof Undefined ? null : $postboxCity;
        $this->postboxState = $postboxState instanceof Undefined ? null : $postboxState;
        $this->postboxCountry = $postboxCountry instanceof Undefined ? null : $postboxCountry;
        $this->postboxZipCode = $postboxZipCode instanceof Undefined ? null : $postboxZipCode;
        $this->salePriceLevel = $salePriceLevel instanceof Undefined ? null : $salePriceLevel;
        $this->salutation = $salutation instanceof Undefined ? null : $salutation;
        $this->sepaAgreement = $sepaAgreement instanceof Undefined ? null : $sepaAgreement;
        $this->sepaAgreementDate = $sepaAgreementDate instanceof Undefined ? null : $sepaAgreementDate;
        $this->sepaMandateReference = $sepaMandateReference instanceof Undefined ? null : $sepaMandateReference;
        $this->sinceDate = $sinceDate instanceof Undefined ? null : $sinceDate;
        $this->street = $street instanceof Undefined ? null : $street;
        $this->suffix1 = $suffix1 instanceof Undefined ? null : $suffix1;
        $this->suffix2 = $suffix2 instanceof Undefined ? null : $suffix2;
        $this->taxNumber = $taxNumber instanceof Undefined ? null : $taxNumber;
        $this->court = $court instanceof Undefined ? null : $court;
        $this->courtRegistryNumber = $courtRegistryNumber instanceof Undefined ? null : $courtRegistryNumber;
        $this->taxOptions = $taxOptions instanceof Undefined ? null : $taxOptions;
        $this->title = $title instanceof Undefined ? null : $title;
        $this->archived = $archived instanceof Undefined ? null : $archived;
        $this->vatIdentifier = $vatIdentifier instanceof Undefined ? null : $vatIdentifier;
        $this->zipCode = $zipCode instanceof Undefined ? null : $zipCode;
        $this->documentPdfType = $documentPdfType instanceof Undefined ? null : $documentPdfType;
        $this->buyerReference = $buyerReference instanceof Undefined ? null : $buyerReference;
        $this->foreignSupplierNumber = $foreignSupplierNumber instanceof Undefined ? null : $foreignSupplierNumber;
        $this->explicit = self::explicitFields([
            'acquire_options' => $acquireOptions,
            'additional_groups_ids' => $additionalGroupsIds,
            'bank_account' => $bankAccount,
            'bank_account_owner' => $bankAccountOwner,
            'bank_bic' => $bankBic,
            'bank_code' => $bankCode,
            'bank_iban' => $bankIban,
            'bank_name' => $bankName,
            'birth_date' => $birthDate,
            'cash_allowance' => $cashAllowance,
            'cash_allowance_days' => $cashAllowanceDays,
            'cash_discount' => $cashDiscount,
            'cash_discount_type' => $cashDiscountType,
            'city' => $city,
            'state' => $state,
            'company_name' => $companyName,
            'country' => $country,
            'delivery_title' => $deliveryTitle,
            'delivery_city' => $deliveryCity,
            'delivery_state' => $deliveryState,
            'delivery_company_name' => $deliveryCompanyName,
            'delivery_country' => $deliveryCountry,
            'delivery_first_name' => $deliveryFirstName,
            'delivery_last_name' => $deliveryLastName,
            'delivery_personal' => $deliveryPersonal,
            'delivery_salutation' => $deliverySalutation,
            'delivery_street' => $deliveryStreet,
            'delivery_suffix_1' => $deliverySuffix1,
            'delivery_suffix_2' => $deliverySuffix2,
            'delivery_zip_code' => $deliveryZipCode,
            'emails' => $emails,
            'fax' => $fax,
            'first_name' => $firstName,
            'grace_period' => $gracePeriod,
            'due_in_days' => $dueInDays,
            'group_id' => $groupId,
            'info_1' => $info1,
            'info_2' => $info2,
            'internet' => $internet,
            'last_name' => $lastName,
            'login_id' => $loginId,
            'mobile' => $mobile,
            'note' => $note,
            'number' => $number,
            'supplier_number' => $supplierNumber,
            'payment_options' => $paymentOptions,
            'personal' => $personal,
            'phone_1' => $phone1,
            'phone_2' => $phone2,
            'postbox' => $postbox,
            'postbox_city' => $postboxCity,
            'postbox_state' => $postboxState,
            'postbox_country' => $postboxCountry,
            'postbox_zip_code' => $postboxZipCode,
            'sale_price_level' => $salePriceLevel,
            'salutation' => $salutation,
            'sepa_agreement' => $sepaAgreement,
            'sepa_agreement_date' => $sepaAgreementDate,
            'sepa_mandate_reference' => $sepaMandateReference,
            'since_date' => $sinceDate,
            'street' => $street,
            'suffix_1' => $suffix1,
            'suffix_2' => $suffix2,
            'tax_number' => $taxNumber,
            'court' => $court,
            'court_registry_number' => $courtRegistryNumber,
            'tax_options' => $taxOptions,
            'title' => $title,
            'archived' => $archived,
            'vat_identifier' => $vatIdentifier,
            'zip_code' => $zipCode,
            'document_pdf_type' => $documentPdfType,
            'buyer_reference' => $buyerReference,
            'foreign_supplier_number' => $foreignSupplierNumber,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            acquireOptions: self::asEnum(AcquireOption::class, $data['acquire_options'] ?? null) ?? Undefined::Value,
            additionalGroupsIds: self::asIntList($data['additional_groups_ids'] ?? null) ?: Undefined::Value,
            bankAccount: self::asString($data['bank_account'] ?? null) ?? Undefined::Value,
            bankAccountOwner: self::asString($data['bank_account_owner'] ?? null) ?? Undefined::Value,
            bankBic: self::asString($data['bank_bic'] ?? null) ?? Undefined::Value,
            bankCode: self::asString($data['bank_code'] ?? null) ?? Undefined::Value,
            bankIban: self::asString($data['bank_iban'] ?? null) ?? Undefined::Value,
            bankName: self::asString($data['bank_name'] ?? null) ?? Undefined::Value,
            birthDate: self::asString($data['birth_date'] ?? null) ?? Undefined::Value,
            cashAllowance: self::asFloat($data['cash_allowance'] ?? null) ?? Undefined::Value,
            cashAllowanceDays: self::asInt($data['cash_allowance_days'] ?? null) ?? Undefined::Value,
            cashDiscount: self::asFloat($data['cash_discount'] ?? null) ?? Undefined::Value,
            cashDiscountType: self::asEnum(CashDiscountType::class, $data['cash_discount_type'] ?? null) ?? Undefined::Value,
            city: self::asString($data['city'] ?? null) ?? Undefined::Value,
            state: self::asString($data['state'] ?? null) ?? Undefined::Value,
            companyName: self::asString($data['company_name'] ?? null) ?? Undefined::Value,
            country: self::asString($data['country'] ?? null) ?? Undefined::Value,
            createdAt: self::asString($data['created_at'] ?? null),
            updatedAt: self::asString($data['updated_at'] ?? null),
            deliveryTitle: self::asString($data['delivery_title'] ?? null) ?? Undefined::Value,
            deliveryCity: self::asString($data['delivery_city'] ?? null) ?? Undefined::Value,
            deliveryState: self::asString($data['delivery_state'] ?? null) ?? Undefined::Value,
            deliveryCompanyName: self::asString($data['delivery_company_name'] ?? null) ?? Undefined::Value,
            deliveryCountry: self::asString($data['delivery_country'] ?? null) ?? Undefined::Value,
            deliveryFirstName: self::asString($data['delivery_first_name'] ?? null) ?? Undefined::Value,
            deliveryLastName: self::asString($data['delivery_last_name'] ?? null) ?? Undefined::Value,
            deliveryPersonal: self::asBool($data['delivery_personal'] ?? null) ?? Undefined::Value,
            deliverySalutation: self::asEnum(Salutation::class, $data['delivery_salutation'] ?? null) ?? Undefined::Value,
            deliveryStreet: self::asString($data['delivery_street'] ?? null) ?? Undefined::Value,
            deliverySuffix1: self::asString($data['delivery_suffix_1'] ?? null) ?? Undefined::Value,
            deliverySuffix2: self::asString($data['delivery_suffix_2'] ?? null) ?? Undefined::Value,
            deliveryZipCode: self::asString($data['delivery_zip_code'] ?? null) ?? Undefined::Value,
            displayName: self::asString($data['display_name'] ?? null),
            emails: self::asStringList($data['emails'] ?? null) ?: Undefined::Value,
            fax: self::asString($data['fax'] ?? null) ?? Undefined::Value,
            firstName: self::asString($data['first_name'] ?? null) ?? Undefined::Value,
            gracePeriod: self::asInt($data['grace_period'] ?? null) ?? Undefined::Value,
            dueInDays: self::asInt($data['due_in_days'] ?? null) ?? Undefined::Value,
            groupId: self::asInt($data['group_id'] ?? null) ?? Undefined::Value,
            id: self::asInt($data['id'] ?? null),
            info1: self::asString($data['info_1'] ?? null) ?? Undefined::Value,
            info2: self::asString($data['info_2'] ?? null) ?? Undefined::Value,
            internet: self::asString($data['internet'] ?? null) ?? Undefined::Value,
            lastName: self::asString($data['last_name'] ?? null) ?? Undefined::Value,
            loginId: self::asInt($data['login_id'] ?? null) ?? Undefined::Value,
            mobile: self::asString($data['mobile'] ?? null) ?? Undefined::Value,
            note: self::asString($data['note'] ?? null) ?? Undefined::Value,
            number: self::asString($data['number'] ?? null) ?? Undefined::Value,
            supplierNumber: self::asString($data['supplier_number'] ?? null) ?? Undefined::Value,
            paymentOptions: self::asEnum(PaymentOption::class, $data['payment_options'] ?? null) ?? Undefined::Value,
            paymentProviderMandateStatus: self::asString($data['payment_provider_mandate_status'] ?? null),
            personal: self::asBool($data['personal'] ?? null) ?? Undefined::Value,
            phone1: self::asString($data['phone_1'] ?? null) ?? Undefined::Value,
            phone2: self::asString($data['phone_2'] ?? null) ?? Undefined::Value,
            postbox: self::asString($data['postbox'] ?? null) ?? Undefined::Value,
            postboxCity: self::asString($data['postbox_city'] ?? null) ?? Undefined::Value,
            postboxState: self::asString($data['postbox_state'] ?? null) ?? Undefined::Value,
            postboxCountry: self::asString($data['postbox_country'] ?? null) ?? Undefined::Value,
            postboxZipCode: self::asString($data['postbox_zip_code'] ?? null) ?? Undefined::Value,
            salePriceLevel: self::asEnum(SalePriceLevel::class, $data['sale_price_level'] ?? null) ?? Undefined::Value,
            salutation: self::asEnum(Salutation::class, $data['salutation'] ?? null) ?? Undefined::Value,
            sepaAgreement: self::asEnum(SepaAgreement::class, $data['sepa_agreement'] ?? null) ?? Undefined::Value,
            sepaAgreementDate: self::asString($data['sepa_agreement_date'] ?? null) ?? Undefined::Value,
            sepaMandateReference: self::asString($data['sepa_mandate_reference'] ?? null) ?? Undefined::Value,
            sinceDate: self::asString($data['since_date'] ?? null) ?? Undefined::Value,
            street: self::asString($data['street'] ?? null) ?? Undefined::Value,
            suffix1: self::asString($data['suffix_1'] ?? null) ?? Undefined::Value,
            suffix2: self::asString($data['suffix_2'] ?? null) ?? Undefined::Value,
            taxNumber: self::asString($data['tax_number'] ?? null) ?? Undefined::Value,
            court: self::asString($data['court'] ?? null) ?? Undefined::Value,
            courtRegistryNumber: self::asString($data['court_registry_number'] ?? null) ?? Undefined::Value,
            taxOptions: self::asEnum(TaxOptions::class, $data['tax_options'] ?? null) ?? Undefined::Value,
            title: self::asString($data['title'] ?? null) ?? Undefined::Value,
            archived: self::asBool($data['archived'] ?? null) ?? Undefined::Value,
            vatIdentifier: self::asString($data['vat_identifier'] ?? null) ?? Undefined::Value,
            zipCode: self::asString($data['zip_code'] ?? null) ?? Undefined::Value,
            documentPdfType: self::asEnum(DocumentPdfType::class, $data['document_pdf_type'] ?? null) ?? Undefined::Value,
            buyerReference: self::asString($data['buyer_reference'] ?? null) ?? Undefined::Value,
            foreignSupplierNumber: self::asString($data['foreign_supplier_number'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->acquireOptions !== null) {
            $data['acquire_options'] = $this->acquireOptions->value;
        } elseif (isset($this->explicit['acquire_options'])) {
            $data['acquire_options'] = null;
        }
        if ($this->additionalGroupsIds !== []) {
            $data['additional_groups_ids'] = $this->additionalGroupsIds;
        } elseif (isset($this->explicit['additional_groups_ids'])) {
            $data['additional_groups_ids'] = [];
        }
        if ($this->bankAccount !== null) {
            $data['bank_account'] = $this->bankAccount;
        } elseif (isset($this->explicit['bank_account'])) {
            $data['bank_account'] = null;
        }
        if ($this->bankAccountOwner !== null) {
            $data['bank_account_owner'] = $this->bankAccountOwner;
        } elseif (isset($this->explicit['bank_account_owner'])) {
            $data['bank_account_owner'] = null;
        }
        if ($this->bankBic !== null) {
            $data['bank_bic'] = $this->bankBic;
        } elseif (isset($this->explicit['bank_bic'])) {
            $data['bank_bic'] = null;
        }
        if ($this->bankCode !== null) {
            $data['bank_code'] = $this->bankCode;
        } elseif (isset($this->explicit['bank_code'])) {
            $data['bank_code'] = null;
        }
        if ($this->bankIban !== null) {
            $data['bank_iban'] = $this->bankIban;
        } elseif (isset($this->explicit['bank_iban'])) {
            $data['bank_iban'] = null;
        }
        if ($this->bankName !== null) {
            $data['bank_name'] = $this->bankName;
        } elseif (isset($this->explicit['bank_name'])) {
            $data['bank_name'] = null;
        }
        if ($this->birthDate !== null) {
            $data['birth_date'] = $this->birthDate;
        } elseif (isset($this->explicit['birth_date'])) {
            $data['birth_date'] = null;
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
        if ($this->cashDiscount !== null) {
            $data['cash_discount'] = $this->cashDiscount;
        } elseif (isset($this->explicit['cash_discount'])) {
            $data['cash_discount'] = null;
        }
        if ($this->cashDiscountType !== null) {
            $data['cash_discount_type'] = $this->cashDiscountType->value;
        } elseif (isset($this->explicit['cash_discount_type'])) {
            $data['cash_discount_type'] = null;
        }
        if ($this->city !== null) {
            $data['city'] = $this->city;
        } elseif (isset($this->explicit['city'])) {
            $data['city'] = null;
        }
        if ($this->state !== null) {
            $data['state'] = $this->state;
        } elseif (isset($this->explicit['state'])) {
            $data['state'] = null;
        }
        if ($this->companyName !== null) {
            $data['company_name'] = $this->companyName;
        } elseif (isset($this->explicit['company_name'])) {
            $data['company_name'] = null;
        }
        if ($this->country !== null) {
            $data['country'] = $this->country;
        } elseif (isset($this->explicit['country'])) {
            $data['country'] = null;
        }
        if ($this->deliveryTitle !== null) {
            $data['delivery_title'] = $this->deliveryTitle;
        } elseif (isset($this->explicit['delivery_title'])) {
            $data['delivery_title'] = null;
        }
        if ($this->deliveryCity !== null) {
            $data['delivery_city'] = $this->deliveryCity;
        } elseif (isset($this->explicit['delivery_city'])) {
            $data['delivery_city'] = null;
        }
        if ($this->deliveryState !== null) {
            $data['delivery_state'] = $this->deliveryState;
        } elseif (isset($this->explicit['delivery_state'])) {
            $data['delivery_state'] = null;
        }
        if ($this->deliveryCompanyName !== null) {
            $data['delivery_company_name'] = $this->deliveryCompanyName;
        } elseif (isset($this->explicit['delivery_company_name'])) {
            $data['delivery_company_name'] = null;
        }
        if ($this->deliveryCountry !== null) {
            $data['delivery_country'] = $this->deliveryCountry;
        } elseif (isset($this->explicit['delivery_country'])) {
            $data['delivery_country'] = null;
        }
        if ($this->deliveryFirstName !== null) {
            $data['delivery_first_name'] = $this->deliveryFirstName;
        } elseif (isset($this->explicit['delivery_first_name'])) {
            $data['delivery_first_name'] = null;
        }
        if ($this->deliveryLastName !== null) {
            $data['delivery_last_name'] = $this->deliveryLastName;
        } elseif (isset($this->explicit['delivery_last_name'])) {
            $data['delivery_last_name'] = null;
        }
        if ($this->deliveryPersonal !== null) {
            $data['delivery_personal'] = $this->deliveryPersonal;
        } elseif (isset($this->explicit['delivery_personal'])) {
            $data['delivery_personal'] = null;
        }
        if ($this->deliverySalutation !== null) {
            $data['delivery_salutation'] = $this->deliverySalutation->value;
        } elseif (isset($this->explicit['delivery_salutation'])) {
            $data['delivery_salutation'] = null;
        }
        if ($this->deliveryStreet !== null) {
            $data['delivery_street'] = $this->deliveryStreet;
        } elseif (isset($this->explicit['delivery_street'])) {
            $data['delivery_street'] = null;
        }
        if ($this->deliverySuffix1 !== null) {
            $data['delivery_suffix_1'] = $this->deliverySuffix1;
        } elseif (isset($this->explicit['delivery_suffix_1'])) {
            $data['delivery_suffix_1'] = null;
        }
        if ($this->deliverySuffix2 !== null) {
            $data['delivery_suffix_2'] = $this->deliverySuffix2;
        } elseif (isset($this->explicit['delivery_suffix_2'])) {
            $data['delivery_suffix_2'] = null;
        }
        if ($this->deliveryZipCode !== null) {
            $data['delivery_zip_code'] = $this->deliveryZipCode;
        } elseif (isset($this->explicit['delivery_zip_code'])) {
            $data['delivery_zip_code'] = null;
        }
        if ($this->emails !== []) {
            $data['emails'] = $this->emails;
        } elseif (isset($this->explicit['emails'])) {
            $data['emails'] = [];
        }
        if ($this->fax !== null) {
            $data['fax'] = $this->fax;
        } elseif (isset($this->explicit['fax'])) {
            $data['fax'] = null;
        }
        if ($this->firstName !== null) {
            $data['first_name'] = $this->firstName;
        } elseif (isset($this->explicit['first_name'])) {
            $data['first_name'] = null;
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
        if ($this->groupId !== null) {
            $data['group_id'] = $this->groupId;
        } elseif (isset($this->explicit['group_id'])) {
            $data['group_id'] = null;
        }
        if ($this->info1 !== null) {
            $data['info_1'] = $this->info1;
        } elseif (isset($this->explicit['info_1'])) {
            $data['info_1'] = null;
        }
        if ($this->info2 !== null) {
            $data['info_2'] = $this->info2;
        } elseif (isset($this->explicit['info_2'])) {
            $data['info_2'] = null;
        }
        if ($this->internet !== null) {
            $data['internet'] = $this->internet;
        } elseif (isset($this->explicit['internet'])) {
            $data['internet'] = null;
        }
        if ($this->lastName !== null) {
            $data['last_name'] = $this->lastName;
        } elseif (isset($this->explicit['last_name'])) {
            $data['last_name'] = null;
        }
        if ($this->loginId !== null) {
            $data['login_id'] = $this->loginId;
        } elseif (isset($this->explicit['login_id'])) {
            $data['login_id'] = null;
        }
        if ($this->mobile !== null) {
            $data['mobile'] = $this->mobile;
        } elseif (isset($this->explicit['mobile'])) {
            $data['mobile'] = null;
        }
        if ($this->note !== null) {
            $data['note'] = $this->note;
        } elseif (isset($this->explicit['note'])) {
            $data['note'] = null;
        }
        if ($this->number !== null) {
            $data['number'] = $this->number;
        } elseif (isset($this->explicit['number'])) {
            $data['number'] = null;
        }
        if ($this->supplierNumber !== null) {
            $data['supplier_number'] = $this->supplierNumber;
        } elseif (isset($this->explicit['supplier_number'])) {
            $data['supplier_number'] = null;
        }
        if ($this->paymentOptions !== null) {
            $data['payment_options'] = $this->paymentOptions->value;
        } elseif (isset($this->explicit['payment_options'])) {
            $data['payment_options'] = null;
        }
        if ($this->personal !== null) {
            $data['personal'] = $this->personal;
        } elseif (isset($this->explicit['personal'])) {
            $data['personal'] = null;
        }
        if ($this->phone1 !== null) {
            $data['phone_1'] = $this->phone1;
        } elseif (isset($this->explicit['phone_1'])) {
            $data['phone_1'] = null;
        }
        if ($this->phone2 !== null) {
            $data['phone_2'] = $this->phone2;
        } elseif (isset($this->explicit['phone_2'])) {
            $data['phone_2'] = null;
        }
        if ($this->postbox !== null) {
            $data['postbox'] = $this->postbox;
        } elseif (isset($this->explicit['postbox'])) {
            $data['postbox'] = null;
        }
        if ($this->postboxCity !== null) {
            $data['postbox_city'] = $this->postboxCity;
        } elseif (isset($this->explicit['postbox_city'])) {
            $data['postbox_city'] = null;
        }
        if ($this->postboxState !== null) {
            $data['postbox_state'] = $this->postboxState;
        } elseif (isset($this->explicit['postbox_state'])) {
            $data['postbox_state'] = null;
        }
        if ($this->postboxCountry !== null) {
            $data['postbox_country'] = $this->postboxCountry;
        } elseif (isset($this->explicit['postbox_country'])) {
            $data['postbox_country'] = null;
        }
        if ($this->postboxZipCode !== null) {
            $data['postbox_zip_code'] = $this->postboxZipCode;
        } elseif (isset($this->explicit['postbox_zip_code'])) {
            $data['postbox_zip_code'] = null;
        }
        if ($this->salePriceLevel !== null) {
            $data['sale_price_level'] = $this->salePriceLevel->value;
        } elseif (isset($this->explicit['sale_price_level'])) {
            $data['sale_price_level'] = null;
        }
        if ($this->salutation !== null) {
            $data['salutation'] = $this->salutation->value;
        } elseif (isset($this->explicit['salutation'])) {
            $data['salutation'] = null;
        }
        if ($this->sepaAgreement !== null) {
            $data['sepa_agreement'] = $this->sepaAgreement->value;
        } elseif (isset($this->explicit['sepa_agreement'])) {
            $data['sepa_agreement'] = null;
        }
        if ($this->sepaAgreementDate !== null) {
            $data['sepa_agreement_date'] = $this->sepaAgreementDate;
        } elseif (isset($this->explicit['sepa_agreement_date'])) {
            $data['sepa_agreement_date'] = null;
        }
        if ($this->sepaMandateReference !== null) {
            $data['sepa_mandate_reference'] = $this->sepaMandateReference;
        } elseif (isset($this->explicit['sepa_mandate_reference'])) {
            $data['sepa_mandate_reference'] = null;
        }
        if ($this->sinceDate !== null) {
            $data['since_date'] = $this->sinceDate;
        } elseif (isset($this->explicit['since_date'])) {
            $data['since_date'] = null;
        }
        if ($this->street !== null) {
            $data['street'] = $this->street;
        } elseif (isset($this->explicit['street'])) {
            $data['street'] = null;
        }
        if ($this->suffix1 !== null) {
            $data['suffix_1'] = $this->suffix1;
        } elseif (isset($this->explicit['suffix_1'])) {
            $data['suffix_1'] = null;
        }
        if ($this->suffix2 !== null) {
            $data['suffix_2'] = $this->suffix2;
        } elseif (isset($this->explicit['suffix_2'])) {
            $data['suffix_2'] = null;
        }
        if ($this->taxNumber !== null) {
            $data['tax_number'] = $this->taxNumber;
        } elseif (isset($this->explicit['tax_number'])) {
            $data['tax_number'] = null;
        }
        if ($this->court !== null) {
            $data['court'] = $this->court;
        } elseif (isset($this->explicit['court'])) {
            $data['court'] = null;
        }
        if ($this->courtRegistryNumber !== null) {
            $data['court_registry_number'] = $this->courtRegistryNumber;
        } elseif (isset($this->explicit['court_registry_number'])) {
            $data['court_registry_number'] = null;
        }
        if ($this->taxOptions !== null) {
            $data['tax_options'] = $this->taxOptions->value;
        } elseif (isset($this->explicit['tax_options'])) {
            $data['tax_options'] = null;
        }
        if ($this->title !== null) {
            $data['title'] = $this->title;
        } elseif (isset($this->explicit['title'])) {
            $data['title'] = null;
        }
        if ($this->archived !== null) {
            $data['archived'] = $this->archived;
        } elseif (isset($this->explicit['archived'])) {
            $data['archived'] = null;
        }
        if ($this->vatIdentifier !== null) {
            $data['vat_identifier'] = $this->vatIdentifier;
        } elseif (isset($this->explicit['vat_identifier'])) {
            $data['vat_identifier'] = null;
        }
        if ($this->zipCode !== null) {
            $data['zip_code'] = $this->zipCode;
        } elseif (isset($this->explicit['zip_code'])) {
            $data['zip_code'] = null;
        }
        if ($this->documentPdfType !== null) {
            $data['document_pdf_type'] = $this->documentPdfType->value;
        } elseif (isset($this->explicit['document_pdf_type'])) {
            $data['document_pdf_type'] = null;
        }
        if ($this->buyerReference !== null) {
            $data['buyer_reference'] = $this->buyerReference;
        } elseif (isset($this->explicit['buyer_reference'])) {
            $data['buyer_reference'] = null;
        }
        if ($this->foreignSupplierNumber !== null) {
            $data['foreign_supplier_number'] = $this->foreignSupplierNumber;
        } elseif (isset($this->explicit['foreign_supplier_number'])) {
            $data['foreign_supplier_number'] = null;
        }

        return $data;
    }
}
