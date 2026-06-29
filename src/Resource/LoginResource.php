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
     * @return Logins
     */
    public function list(int $page = 1, int $limit = 100): Logins
    {
        return $this->getListing(Logins::class, self::PATH, ['page' => $page, 'limit' => $limit]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<Login>
     */
    public function all(int $limit = 100): Paginator
    {
        /** @var Paginator<Login> $paginator */
        $paginator = new Paginator(fn(int $page): Logins => $this->list($page, $limit));

        return $paginator;
    }

    public function get(int $id): Login
    {
        return $this->getModel(Login::class, self::PATH . "/{$id}");
    }
}
