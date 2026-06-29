<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\WebHook;
use GoSuccess\Easybill\Model\WebHooks;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/webhooks` endpoints.
 */
final class WebhookResource extends AbstractResource
{
    private const string PATH = 'webhooks';

    /**
     * Fetch a single page of results.
     *
     * @return WebHooks
     */
    public function list(int $page = 1, int $limit = 100): WebHooks
    {
        return $this->getListing(WebHooks::class, self::PATH, ['page' => $page, 'limit' => $limit]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<WebHook>
     */
    public function all(int $limit = 100): Paginator
    {
        /** @var Paginator<WebHook> $paginator */
        $paginator = new Paginator(fn(int $page): WebHooks => $this->list($page, $limit));

        return $paginator;
    }

    public function get(int $id): WebHook
    {
        return $this->getModel(WebHook::class, self::PATH . "/{$id}");
    }

    public function create(WebHook $webHook): WebHook
    {
        return $this->createModel(WebHook::class, self::PATH, $webHook);
    }

    public function update(int $id, WebHook $webHook): WebHook
    {
        return $this->updateModel(WebHook::class, self::PATH . "/{$id}", $webHook);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
