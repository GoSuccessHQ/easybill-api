<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Task;
use GoSuccess\Easybill\Model\Tasks;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/tasks` endpoints.
 */
final class TaskResource extends AbstractResource
{
    private const string PATH = 'tasks';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Tasks
    {
        return $this->getListing(Tasks::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Task>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Task> $paginator */
        $paginator = new Paginator(fn(int $page): Tasks => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Task
    {
        return $this->getModel(Task::class, self::PATH . "/{$id}");
    }

    public function create(Task $task): Task
    {
        return $this->createModel(Task::class, self::PATH, $task);
    }

    public function update(int $id, Task $task): Task
    {
        return $this->updateModel(Task::class, self::PATH . "/{$id}", $task);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
