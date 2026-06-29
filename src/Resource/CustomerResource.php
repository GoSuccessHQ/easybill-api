<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Http\Method;
use GoSuccess\Easybill\Model\Customer;
use GoSuccess\Easybill\Model\Customers;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/customers` endpoints.
 */
final class CustomerResource extends AbstractResource
{
    private const string PATH = 'customers';

    /**
     * Fetch a single page of customers.
     *
     * @param array<string, scalar|null> $filters Optional filters such as `group_id`, `number`,
     *                                            `country`, `zip_code`, `emails`, `first_name`,
     *                                            `last_name`, `company_name`, `created_at`.
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Customers
    {
        return $this->getListing(Customers::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every customer across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Customer>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Customer> $paginator */
        $paginator = new Paginator(fn(int $page): Customers => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Customer
    {
        return $this->getModel(Customer::class, self::PATH . "/{$id}");
    }

    public function create(Customer $customer): Customer
    {
        return $this->createModel(Customer::class, self::PATH, $customer);
    }

    public function update(int $id, Customer $customer): Customer
    {
        return $this->updateModel(Customer::class, self::PATH . "/{$id}", $customer);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }

    /**
     * Transfer the SEPA mandate of a customer to another payment provider.
     */
    public function transferSepaMandate(int $id): Customer
    {
        return $this->action(Customer::class, Method::Post, self::PATH . "/{$id}/sepa-mandate/transfer");
    }
}
