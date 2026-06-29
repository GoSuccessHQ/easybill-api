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
     * @return Tasks
     */
    public function list(int $page = 1, int $limit = 100): Tasks
    {
        return $this->getListing(Tasks::class, self::PATH, ['page' => $page, 'limit' => $limit]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<Task>
     */
    public function all(int $limit = 100): Paginator
    {
        /** @var Paginator<Task> $paginator */
        $paginator = new Paginator(fn(int $page): Tasks => $this->list($page, $limit));

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
