<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * @see https://api.easybill.de/rest/v1/swagger.json PositionExportIdentifierExtended
 */
final readonly class PositionExportIdentifierExtended extends AbstractModel
{
    public function __construct(
        public ?string $null = null,
        public ?string $nStb = null,
        public ?string $nStbUstId = null,
        public ?string $nStbNoneUstId = null,
        public ?string $nStbIm = null,
        public ?string $revc = null,
        public ?string $ig = null,
        public ?string $al = null,
        public ?string $sStfr = null,
        public ?string $smallBusiness = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            null: self::asString($data['NULL'] ?? null),
            nStb: self::asString($data['nStb'] ?? null),
            nStbUstId: self::asString($data['nStbUstID'] ?? null),
            nStbNoneUstId: self::asString($data['nStbNoneUstID'] ?? null),
            nStbIm: self::asString($data['nStbIm'] ?? null),
            revc: self::asString($data['revc'] ?? null),
            ig: self::asString($data['IG'] ?? null),
            al: self::asString($data['AL'] ?? null),
            sStfr: self::asString($data['sStfr'] ?? null),
            smallBusiness: self::asString($data['smallBusiness'] ?? null),
        );
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->null !== null) {
            $data['NULL'] = $this->null;
        }
        if ($this->nStb !== null) {
            $data['nStb'] = $this->nStb;
        }
        if ($this->nStbUstId !== null) {
            $data['nStbUstID'] = $this->nStbUstId;
        }
        if ($this->nStbNoneUstId !== null) {
            $data['nStbNoneUstID'] = $this->nStbNoneUstId;
        }
        if ($this->nStbIm !== null) {
            $data['nStbIm'] = $this->nStbIm;
        }
        if ($this->revc !== null) {
            $data['revc'] = $this->revc;
        }
        if ($this->ig !== null) {
            $data['IG'] = $this->ig;
        }
        if ($this->al !== null) {
            $data['AL'] = $this->al;
        }
        if ($this->sStfr !== null) {
            $data['sStfr'] = $this->sStfr;
        }
        if ($this->smallBusiness !== null) {
            $data['smallBusiness'] = $this->smallBusiness;
        }

        return $data;
    }
}
