<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\CustomerGroup;
use GoSuccess\Easybill\Model\CustomerGroups;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/customer-groups` endpoints.
 */
final class CustomerGroupResource extends AbstractResource
{
    private const string PATH = 'customer-groups';

    /**
     * Fetch a single page of results.
     *
     * @return CustomerGroups
     */
    public function list(int $page = 1, int $limit = 100): CustomerGroups
    {
        return $this->getListing(CustomerGroups::class, self::PATH, ['page' => $page, 'limit' => $limit]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<CustomerGroup>
     */
    public function all(int $limit = 100): Paginator
    {
        /** @var Paginator<CustomerGroup> $paginator */
        $paginator = new Paginator(fn(int $page): CustomerGroups => $this->list($page, $limit));

        return $paginator;
    }

    public function get(int $id): CustomerGroup
    {
        return $this->getModel(CustomerGroup::class, self::PATH . "/{$id}");
    }

    public function create(CustomerGroup $customerGroup): CustomerGroup
    {
        return $this->createModel(CustomerGroup::class, self::PATH, $customerGroup);
    }

    public function update(int $id, CustomerGroup $customerGroup): CustomerGroup
    {
        return $this->updateModel(CustomerGroup::class, self::PATH . "/{$id}", $customerGroup);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
