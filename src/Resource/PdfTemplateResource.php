<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\PDFTemplate;
use GoSuccess\Easybill\Model\PDFTemplates;

/**
 * Access to the `/pdf-templates` endpoint.
 *
 * This endpoint is not paginated; it returns all available PDF templates at once.
 */
final class PdfTemplateResource extends AbstractResource
{
    private const string PATH = 'pdf-templates';

    /**
     * Fetch the full set of available PDF templates.
     */
    public function list(): PDFTemplates
    {
        return $this->getModel(PDFTemplates::class, self::PATH);
    }

    /**
     * Fetch the available PDF templates as a plain list.
     *
     * @return list<PDFTemplate>
     */
    public function all(): array
    {
        return $this->list()->items;
    }
}
