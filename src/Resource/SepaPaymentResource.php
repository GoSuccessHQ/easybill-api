<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\SepaPaymentFilter;
use GoSuccess\Easybill\Model\SEPAPayment;
use GoSuccess\Easybill\Model\SEPAPayments;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/sepa-payments` endpoints.
 */
final class SepaPaymentResource extends AbstractResource
{
    private const string PATH = 'sepa-payments';

    /**
     * Fetch a single page of results.
     *
     * @param SepaPaymentFilter|null $filter Typed query filters.
     *
     * @return SEPAPayments
     */
    public function list(int $page = 1, int $limit = 100, ?SepaPaymentFilter $filter = null): SEPAPayments
    {
        return $this->getListing(SEPAPayments::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<SEPAPayment>
     */
    public function all(?SepaPaymentFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<SEPAPayment> $paginator */
        $paginator = new Paginator(fn(int $page): SEPAPayments => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): SEPAPayment
    {
        return $this->getModel(SEPAPayment::class, self::PATH . "/{$id}");
    }

    public function create(SEPAPayment $sEPAPayment): SEPAPayment
    {
        return $this->createModel(SEPAPayment::class, self::PATH, $sEPAPayment);
    }

    public function update(int $id, SEPAPayment $sEPAPayment): SEPAPayment
    {
        return $this->updateModel(SEPAPayment::class, self::PATH . "/{$id}", $sEPAPayment);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
