<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentFileType: string
{
    case Default = 'default';
    case Zugferd1 = 'zugferd1';
    case Zugferd22 = 'zugferd2_2';
    case Zugferd24En16931 = 'zugferd2_4_en16931';
    case Zugferd24Extended = 'zugferd2_4_extended';
    case Xrechnung = 'xrechnung';
    case XrechnungXml = 'xrechnung_xml';
    case Xrechnung22Xml = 'xrechnung2_2_xml';
    case Xrechnung30Xml = 'xrechnung3_0_xml';
}
