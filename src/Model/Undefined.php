<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * Sentinel for "no value provided", used as the default of every writable model
 * constructor parameter.
 *
 * It separates the two meanings that a bare `null` would otherwise conflate:
 *
 * - {@see Undefined::Value} (the default) — the field is left out of the request
 *   payload entirely, so the API keeps its current value.
 * - `null` — the field is sent as an explicit JSON `null`, clearing it.
 *
 * Passing it explicitly is only needed to make a field conditional:
 *
 * ```php
 * new Customer(note: $clearNote ? null : Undefined::Value);
 * ```
 */
enum Undefined
{
    case Value;
}
