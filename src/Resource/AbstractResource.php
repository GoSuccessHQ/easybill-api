<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Http\Connection;
use GoSuccess\Easybill\Http\Method;
use GoSuccess\Easybill\Model\Listing;
use GoSuccess\Easybill\Model\Model;

/**
 * Base class for all API resources, wrapping the {@see Connection} with typed,
 * reusable CRUD helpers.
 */
abstract class AbstractResource
{
    public function __construct(protected readonly Connection $connection) {}

    /**
     * @template T of Listing
     *
     * @param class-string<T>                                       $class
     * @param array<string, scalar|array<int|string, scalar>|null>  $query
     *
     * @return T
     */
    protected function getListing(string $class, string $path, array $query = []): Listing
    {
        return $class::fromArray($this->connection->requestJson(Method::Get, $path, $query));
    }

    /**
     * @template T of Model
     *
     * @param class-string<T>                                       $class
     * @param array<string, scalar|array<int|string, scalar>|null>  $query
     *
     * @return T
     */
    protected function getModel(string $class, string $path, array $query = []): Model
    {
        return $class::fromArray($this->connection->requestJson(Method::Get, $path, $query));
    }

    /**
     * @template T of Model
     *
     * @param class-string<T>                                       $class
     * @param array<string, scalar|array<int|string, scalar>|null>  $query
     *
     * @return T
     */
    protected function createModel(string $class, string $path, Model $body, array $query = []): Model
    {
        return $class::fromArray($this->connection->requestJson(Method::Post, $path, $query, $body->toArray()));
    }

    /**
     * @template T of Model
     *
     * @param class-string<T>                                       $class
     * @param array<string, scalar|array<int|string, scalar>|null>  $query
     *
     * @return T
     */
    protected function updateModel(string $class, string $path, Model $body, array $query = []): Model
    {
        return $class::fromArray($this->connection->requestJson(Method::Put, $path, $query, $body->toArray()));
    }

    /**
     * Perform a custom action that returns a model (e.g. document done/cancel/convert).
     *
     * @template T of Model
     *
     * @param class-string<T>                                       $class
     * @param array<string, scalar|array<int|string, scalar>|null>  $query
     *
     * @return T
     */
    protected function action(string $class, Method $method, string $path, array $query = [], ?Model $body = null): Model
    {
        return $class::fromArray($this->connection->requestJson($method, $path, $query, $body?->toArray()));
    }

    /**
     * Perform a custom action that returns no content (e.g. sending a document).
     *
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     */
    protected function actionVoid(Method $method, string $path, array $query = [], ?Model $body = null): void
    {
        $this->connection->requestJson($method, $path, $query, $body?->toArray());
    }

    /**
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     */
    protected function deleteResource(string $path, array $query = []): void
    {
        $this->connection->requestJson(Method::Delete, $path, $query);
    }

    /**
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     */
    protected function download(string $path, array $query = [], string $accept = 'application/octet-stream'): string
    {
        return $this->connection->requestRaw(Method::Get, $path, $query, $accept);
    }
}
