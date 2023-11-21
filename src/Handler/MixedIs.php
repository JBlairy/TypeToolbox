<?php

namespace ReusableCog\TypeToolbox\Handler;

use ReusableCog\TypeToolbox\Exception\UnexpectedTypeException;

final class MixedIs
{
    /**
     * @return array<mixed, mixed>
     */
    public static function array(mixed $mixedValue): array
    {
        if (!is_array($mixedValue)) {
            throw new UnexpectedTypeException(gettype($mixedValue) . ' is not an array.');
        }

        return $mixedValue;
    }

    public static function bool(mixed $mixedValue): bool
    {
        if (!is_bool($mixedValue)) {
            throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a boolean.');
        }

        return $mixedValue;
    }

    public static function float(mixed $mixedValue): float
    {
        if (!is_float($mixedValue)) {
            throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a float.');
        }

        return $mixedValue;
    }

    public static function int(mixed $mixedValue): float
    {
        if (!is_int($mixedValue)) {
            throw new UnexpectedTypeException(gettype($mixedValue) . ' is not an integer.');
        }

        return $mixedValue;
    }

    public static function string(mixed $mixedValue): string
    {
        if (!is_string($mixedValue)) {
            throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a string.');
        }

        return $mixedValue;
    }

    public static function stringNull(mixed $mixedValue): ?string
    {
        if (null === $mixedValue) {
            return null;
        }

        return self::string($mixedValue);
    }
}
