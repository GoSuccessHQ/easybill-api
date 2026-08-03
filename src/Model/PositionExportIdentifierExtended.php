<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PositionExportIdentifierExtended
 */
final readonly class PositionExportIdentifierExtended extends AbstractModel
{
    public ?string $null;
    public ?string $nStb;
    public ?string $nStbUstId;
    public ?string $nStbNoneUstId;
    public ?string $nStbIm;
    public ?string $revc;
    public ?string $ig;
    public ?string $al;
    public ?string $sStfr;
    public ?string $smallBusiness;
    /**
     * API field names explicitly set to an empty value, which are serialized
     * as JSON `null` (or `[]`) instead of being omitted.
     *
     * @var array<string, true>
     */
    private array $explicit;

    public function __construct(
        string|Undefined|null $null = Undefined::Value,
        string|Undefined|null $nStb = Undefined::Value,
        string|Undefined|null $nStbUstId = Undefined::Value,
        string|Undefined|null $nStbNoneUstId = Undefined::Value,
        string|Undefined|null $nStbIm = Undefined::Value,
        string|Undefined|null $revc = Undefined::Value,
        string|Undefined|null $ig = Undefined::Value,
        string|Undefined|null $al = Undefined::Value,
        string|Undefined|null $sStfr = Undefined::Value,
        string|Undefined|null $smallBusiness = Undefined::Value,
    ) {
        $this->null = $null instanceof Undefined ? null : $null;
        $this->nStb = $nStb instanceof Undefined ? null : $nStb;
        $this->nStbUstId = $nStbUstId instanceof Undefined ? null : $nStbUstId;
        $this->nStbNoneUstId = $nStbNoneUstId instanceof Undefined ? null : $nStbNoneUstId;
        $this->nStbIm = $nStbIm instanceof Undefined ? null : $nStbIm;
        $this->revc = $revc instanceof Undefined ? null : $revc;
        $this->ig = $ig instanceof Undefined ? null : $ig;
        $this->al = $al instanceof Undefined ? null : $al;
        $this->sStfr = $sStfr instanceof Undefined ? null : $sStfr;
        $this->smallBusiness = $smallBusiness instanceof Undefined ? null : $smallBusiness;
        $this->explicit = self::explicitFields([
            'NULL' => $null,
            'nStb' => $nStb,
            'nStbUstID' => $nStbUstId,
            'nStbNoneUstID' => $nStbNoneUstId,
            'nStbIm' => $nStbIm,
            'revc' => $revc,
            'IG' => $ig,
            'AL' => $al,
            'sStfr' => $sStfr,
            'smallBusiness' => $smallBusiness,
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new self(
            null: self::asString($data['NULL'] ?? null) ?? Undefined::Value,
            nStb: self::asString($data['nStb'] ?? null) ?? Undefined::Value,
            nStbUstId: self::asString($data['nStbUstID'] ?? null) ?? Undefined::Value,
            nStbNoneUstId: self::asString($data['nStbNoneUstID'] ?? null) ?? Undefined::Value,
            nStbIm: self::asString($data['nStbIm'] ?? null) ?? Undefined::Value,
            revc: self::asString($data['revc'] ?? null) ?? Undefined::Value,
            ig: self::asString($data['IG'] ?? null) ?? Undefined::Value,
            al: self::asString($data['AL'] ?? null) ?? Undefined::Value,
            sStfr: self::asString($data['sStfr'] ?? null) ?? Undefined::Value,
            smallBusiness: self::asString($data['smallBusiness'] ?? null) ?? Undefined::Value,
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->null !== null) {
            $data['NULL'] = $this->null;
        } elseif (isset($this->explicit['NULL'])) {
            $data['NULL'] = null;
        }
        if ($this->nStb !== null) {
            $data['nStb'] = $this->nStb;
        } elseif (isset($this->explicit['nStb'])) {
            $data['nStb'] = null;
        }
        if ($this->nStbUstId !== null) {
            $data['nStbUstID'] = $this->nStbUstId;
        } elseif (isset($this->explicit['nStbUstID'])) {
            $data['nStbUstID'] = null;
        }
        if ($this->nStbNoneUstId !== null) {
            $data['nStbNoneUstID'] = $this->nStbNoneUstId;
        } elseif (isset($this->explicit['nStbNoneUstID'])) {
            $data['nStbNoneUstID'] = null;
        }
        if ($this->nStbIm !== null) {
            $data['nStbIm'] = $this->nStbIm;
        } elseif (isset($this->explicit['nStbIm'])) {
            $data['nStbIm'] = null;
        }
        if ($this->revc !== null) {
            $data['revc'] = $this->revc;
        } elseif (isset($this->explicit['revc'])) {
            $data['revc'] = null;
        }
        if ($this->ig !== null) {
            $data['IG'] = $this->ig;
        } elseif (isset($this->explicit['IG'])) {
            $data['IG'] = null;
        }
        if ($this->al !== null) {
            $data['AL'] = $this->al;
        } elseif (isset($this->explicit['AL'])) {
            $data['AL'] = null;
        }
        if ($this->sStfr !== null) {
            $data['sStfr'] = $this->sStfr;
        } elseif (isset($this->explicit['sStfr'])) {
            $data['sStfr'] = null;
        }
        if ($this->smallBusiness !== null) {
            $data['smallBusiness'] = $this->smallBusiness;
        } elseif (isset($this->explicit['smallBusiness'])) {
            $data['smallBusiness'] = null;
        }

        return $data;
    }
}
