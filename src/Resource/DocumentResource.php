<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Enum\DocumentConvertTarget;
use GoSuccess\Easybill\Enum\DocumentSendType;
use GoSuccess\Easybill\Filter\DocumentFilter;
use GoSuccess\Easybill\Http\Method;
use GoSuccess\Easybill\Model\Document;
use GoSuccess\Easybill\Model\Documents;
use GoSuccess\Easybill\Model\DocumentVersion;
use GoSuccess\Easybill\Model\DocumentVersions;
use GoSuccess\Easybill\Model\PostBoxRequest;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/documents` endpoints, including the document-specific actions
 * (completing, cancelling, sending, converting) and binary downloads.
 */
final class DocumentResource extends AbstractResource
{
    private const string PATH = 'documents';

    /**
     * Fetch a single page of documents.
     *
     * @param DocumentFilter|null $filter Typed query filters.
     *
     * @return Documents
     */
    public function list(int $page = 1, int $limit = 100, ?DocumentFilter $filter = null): Documents
    {
        return $this->getListing(Documents::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every document across all pages.
     *
     * @return Paginator<Document>
     */
    public function all(?DocumentFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<Document> $paginator */
        $paginator = new Paginator(fn(int $page): Documents => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): Document
    {
        return $this->getModel(Document::class, self::PATH . "/{$id}");
    }

    public function create(Document $document): Document
    {
        return $this->createModel(Document::class, self::PATH, $document);
    }

    public function update(int $id, Document $document): Document
    {
        return $this->updateModel(Document::class, self::PATH . "/{$id}", $document);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }

    /**
     * Mark a document as done (completed).
     *
     * Not allowed for documents of type `RECURRING`; the API rejects those with a `400`.
     * Update the recurring status instead via {@see update()} with `recurring_options.status`.
     */
    public function done(int $id, ?string $reasonForChange = null): Document
    {
        return $this->action(
            Document::class,
            Method::Put,
            self::PATH . "/{$id}/done",
            ['reason_for_change' => $reasonForChange],
        );
    }

    /**
     * Cancel a document (creating a cancellation document).
     */
    public function cancel(int $id, ?bool $useTextFromTemplate = null): Document
    {
        return $this->action(
            Document::class,
            Method::Post,
            self::PATH . "/{$id}/cancel",
            ['use_text_from_template' => $useTextFromTemplate],
        );
    }

    /**
     * Send a document via the given channel.
     *
     * For {@see DocumentSendType::Email}, `PostBoxRequest::$to` and `$cc` accept multiple
     * addresses separated by comma, semicolon or newline. Every address in `$to` is
     * delivered as a `To:` recipient.
     */
    public function send(int $id, DocumentSendType $type, PostBoxRequest $request): void
    {
        $this->actionVoid(Method::Post, self::PATH . "/{$id}/send/{$type->value}", body: $request);
    }

    /**
     * Convert a document into another type (e.g. an offer into an invoice).
     */
    public function convert(int $id, DocumentConvertTarget $type, ?string $pdfTemplate = null): Document
    {
        return $this->action(
            Document::class,
            Method::Post,
            self::PATH . "/{$id}/{$type->value}",
            ['pdf_template' => $pdfTemplate],
        );
    }

    /**
     * Download the document as a PDF.
     */
    public function pdf(int $id): string
    {
        return $this->download(self::PATH . "/{$id}/pdf", accept: 'application/pdf');
    }

    /**
     * Download the document as a JPG image.
     */
    public function jpg(int $id): string
    {
        return $this->download(self::PATH . "/{$id}/jpg", accept: 'image/jpeg');
    }

    /**
     * Download the document file in the format configured on the document.
     *
     * The default `application/pdf` returns the e-invoice PDF with embedded XML for a
     * ZUGFeRD document; use `application/xml;format=xrechnung` for the raw XRechnung XML.
     * easybill rejects `application/octet-stream` and wildcards with 406/400.
     */
    public function downloadFile(int $id, string $accept = 'application/pdf'): string
    {
        return $this->download(self::PATH . "/{$id}/download", accept: $accept);
    }

    /**
     * List the versions of a document.
     */
    public function versions(int $id): DocumentVersions
    {
        return $this->getListing(DocumentVersions::class, self::PATH . "/{$id}/versions");
    }

    /**
     * Fetch a single version of a document.
     */
    public function version(int $id, int $versionId): DocumentVersion
    {
        return $this->getModel(DocumentVersion::class, self::PATH . "/{$id}/versions/{$versionId}");
    }

    /**
     * Download a single item of a document version.
     */
    public function downloadVersionItem(int $id, int $versionId, int $versionItemId): string
    {
        return $this->download(self::PATH . "/{$id}/versions/{$versionId}/items/{$versionItemId}/download");
    }
}
