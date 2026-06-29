<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Attachment;
use GoSuccess\Easybill\Model\Attachments;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/attachments` endpoints.
 */
final class AttachmentResource extends AbstractResource
{
    private const string PATH = 'attachments';

    /**
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Attachments
    {
        return $this->getListing(Attachments::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Attachment>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Attachment> $paginator */
        $paginator = new Paginator(fn(int $page): Attachments => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Attachment
    {
        return $this->getModel(Attachment::class, self::PATH . "/{$id}");
    }

    public function create(Attachment $attachment): Attachment
    {
        return $this->createModel(Attachment::class, self::PATH, $attachment);
    }

    public function update(int $id, Attachment $attachment): Attachment
    {
        return $this->updateModel(Attachment::class, self::PATH . "/{$id}", $attachment);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }

    /**
     * Download the raw binary content of an attachment.
     */
    public function content(int $id): string
    {
        return $this->download(self::PATH . "/{$id}/content");
    }
}
