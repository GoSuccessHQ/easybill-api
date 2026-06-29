<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Login;
use GoSuccess\Easybill\Model\Logins;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/logins` endpoints.
 */
final class LoginResource extends AbstractResource
{
    private const string PATH = 'logins';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Logins
    {
        return $this->getListing(Logins::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Login>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Login> $paginator */
        $paginator = new Paginator(fn(int $page): Logins => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Login
    {
        return $this->getModel(Login::class, self::PATH . "/{$id}");
    }
}
