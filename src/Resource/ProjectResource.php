<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\ProjectFilter;
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
     * @param ProjectFilter|null $filter Typed query filters.
     *
     * @return Projects
     */
    public function list(int $page = 1, int $limit = 100, ?ProjectFilter $filter = null): Projects
    {
        return $this->getListing(Projects::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<Project>
     */
    public function all(?ProjectFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<Project> $paginator */
        $paginator = new Paginator(fn(int $page): Projects => $this->list($page, $limit, $filter));

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
