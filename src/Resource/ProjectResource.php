<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Project;
use GoSuccess\Easybill\Model\Projects;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/projects` endpoints.
 */
final class ProjectResource extends AbstractResource
{
    private const string PATH = 'projects';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Projects
    {
        return $this->getListing(Projects::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Project>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Project> $paginator */
        $paginator = new Paginator(fn(int $page): Projects => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Project
    {
        return $this->getModel(Project::class, self::PATH . "/{$id}");
    }

    public function create(Project $project): Project
    {
        return $this->createModel(Project::class, self::PATH, $project);
    }

    public function update(int $id, Project $project): Project
    {
        return $this->updateModel(Project::class, self::PATH . "/{$id}", $project);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
