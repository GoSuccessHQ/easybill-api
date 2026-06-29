<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\DocumentPaymentFilter;
use GoSuccess\Easybill\Model\DocumentPayment;
use GoSuccess\Easybill\Model\DocumentPayments;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/document-payments` endpoints.
 */
final class DocumentPaymentResource extends AbstractResource
{
    private const string PATH = 'document-payments';

    /**
     * Fetch a single page of results.
     *
     * @param DocumentPaymentFilter|null $filter Typed query filters.
     *
     * @return DocumentPayments
     */
    public function list(int $page = 1, int $limit = 100, ?DocumentPaymentFilter $filter = null): DocumentPayments
    {
        return $this->getListing(DocumentPayments::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<DocumentPayment>
     */
    public function all(?DocumentPaymentFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<DocumentPayment> $paginator */
        $paginator = new Paginator(fn(int $page): DocumentPayments => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): DocumentPayment
    {
        return $this->getModel(DocumentPayment::class, self::PATH . "/{$id}");
    }

    public function create(DocumentPayment $documentPayment): DocumentPayment
    {
        return $this->createModel(DocumentPayment::class, self::PATH, $documentPayment);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
