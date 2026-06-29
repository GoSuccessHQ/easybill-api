<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

use BackedEnum;

/**
 * Base class for all generated data models, providing type-safe helpers to map
 * the loosely typed JSON payloads returned by the API onto strict PHP types.
 */
abstract readonly class AbstractModel implements Model
{
    protected static function asString(mixed $value): ?string
    {
        return \is_scalar($value) ? (string) $value : null;
    }

    protected static function asInt(mixed $value): ?int
    {
        return is_numeric($value) ? (int) $value : null;
    }

    protected static function asFloat(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }

    protected static function asBool(mixed $value): ?bool
    {
        return \is_scalar($value) ? (bool) $value : null;
    }

    /**
     * @template T of BackedEnum
     *
     * @param class-string<T> $enum
     *
     * @return T|null
     */
    protected static function asEnum(string $enum, mixed $value): ?BackedEnum
    {
        if (\is_int($value) || \is_string($value)) {
            return $enum::tryFrom($value);
        }

        return null;
    }

    /**
     * @template T of Model
     *
     * @param class-string<T> $model
     *
     * @return T|null
     */
    protected static function asModel(string $model, mixed $value): ?Model
    {
        if (!\is_array($value)) {
            return null;
        }

        /** @var array<string, mixed> $value */
        return $model::fromArray($value);
    }

    /**
     * @return array<string, mixed>|null
     */
    protected static function asArray(mixed $value): ?array
    {
        if (!\is_array($value)) {
            return null;
        }

        /** @var array<string, mixed> $value */
        return $value;
    }

    /**
     * @return list<string>
     */
    protected static function asStringList(mixed $value): array
    {
        return self::mapScalarList($value, static fn(mixed $item): ?string => self::asString($item));
    }

    /**
     * @return list<int>
     */
    protected static function asIntList(mixed $value): array
    {
        return self::mapScalarList($value, static fn(mixed $item): ?int => self::asInt($item));
    }

    /**
     * @return list<float>
     */
    protected static function asFloatList(mixed $value): array
    {
        return self::mapScalarList($value, static fn(mixed $item): ?float => self::asFloat($item));
    }

    /**
     * @return list<bool>
     */
    protected static function asBoolList(mixed $value): array
    {
        return self::mapScalarList($value, static fn(mixed $item): ?bool => self::asBool($item));
    }

    /**
     * @template T of BackedEnum
     *
     * @param class-string<T> $enum
     *
     * @return list<T>
     */
    protected static function asEnumList(string $enum, mixed $value): array
    {
        if (!\is_array($value)) {
            return [];
        }

        $result = [];

        foreach ($value as $item) {
            $case = self::asEnum($enum, $item);

            if ($case !== null) {
                $result[] = $case;
            }
        }

        return $result;
    }

    /**
     * @template T of Model
     *
     * @param class-string<T> $model
     *
     * @return list<T>
     */
    protected static function asModelList(string $model, mixed $value): array
    {
        if (!\is_array($value)) {
            return [];
        }

        $result = [];

        foreach ($value as $item) {
            $mapped = self::asModel($model, $item);

            if ($mapped !== null) {
                $result[] = $mapped;
            }
        }

        return $result;
    }

    /**
     * @template T of scalar
     *
     * @param callable(mixed): ?T $mapper
     *
     * @return list<T>
     */
    private static function mapScalarList(mixed $value, callable $mapper): array
    {
        if (!\is_array($value)) {
            return [];
        }

        $result = [];

        foreach ($value as $item) {
            $mapped = $mapper($item);

            if ($mapped !== null) {
                $result[] = $mapped;
            }
        }

        return $result;
    }
}
