<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Contact;
use GoSuccess\Easybill\Model\Contacts;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/customers/{customerId}/contacts` endpoints.
 */
final class ContactResource extends AbstractResource
{
    /**
     * Fetch a single page of a customer's contacts.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $customerId, int $page = 1, int $limit = 100, array $filters = []): Contacts
    {
        return $this->getListing(
            Contacts::class,
            "customers/{$customerId}/contacts",
            ['page' => $page, 'limit' => $limit, ...$filters],
        );
    }

    /**
     * Iterate lazily over every contact of a customer across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Contact>
     */
    public function all(int $customerId, array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Contact> $paginator */
        $paginator = new Paginator(fn(int $page): Contacts => $this->list($customerId, $page, $limit, $filters));

        return $paginator;
    }

    public function get(int $customerId, int $id): Contact
    {
        return $this->getModel(Contact::class, "customers/{$customerId}/contacts/{$id}");
    }

    public function create(int $customerId, Contact $contact): Contact
    {
        return $this->createModel(Contact::class, "customers/{$customerId}/contacts", $contact);
    }

    public function update(int $customerId, int $id, Contact $contact): Contact
    {
        return $this->updateModel(Contact::class, "customers/{$customerId}/contacts/{$id}", $contact);
    }

    public function delete(int $customerId, int $id): void
    {
        $this->deleteResource("customers/{$customerId}/contacts/{$id}");
    }
}
