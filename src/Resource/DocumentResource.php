<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

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
     * @param array<string, scalar|null> $filters Optional filters such as `type`, `status`,
     *                                            `customer_id`, `number`, `document_date`, etc.
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Documents
    {
        return $this->getListing(Documents::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every document across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Document>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Document> $paginator */
        $paginator = new Paginator(fn(int $page): Documents => $this->list($page, $limit, $filters));

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
     * Send a document.
     *
     * @param string $type One of `email`, `fax`, `post`.
     */
    public function send(int $id, string $type, PostBoxRequest $request): void
    {
        $this->actionVoid(Method::Post, self::PATH . "/{$id}/send/{$type}", body: $request);
    }

    /**
     * Convert a document into another type (e.g. an offer into an invoice).
     *
     * @param string $type One of `DUNNING`, `REMINDER`, `CHARGE_CONFIRM`, `CHARGE`, `CREDIT`,
     *                     `DELIVERY`, `INVOICE`, `ORDER`.
     */
    public function convert(int $id, string $type, ?string $pdfTemplate = null): Document
    {
        return $this->action(
            Document::class,
            Method::Post,
            self::PATH . "/{$id}/{$type}",
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
     * Download the document file (e.g. the raw e-invoice XML or PDF).
     */
    public function downloadFile(int $id): string
    {
        return $this->download(self::PATH . "/{$id}/download");
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
