<?php

namespace ReusableCog\TypeToolbox\Handler;

use ReusableCog\TypeToolbox\Exception\UnexpectedTypeException;

final class ConvertTo
{
    public static function bool(mixed $mixedValue): bool
    {
        if (null === $mixedValue) {
            return false;
        }

        if (is_bool($mixedValue)) {
            return $mixedValue;
        }

        if (in_array($mixedValue, ['0', 0, 'false', 'true', 1, '1'], true)) {
            return (bool)$mixedValue;
        }

        throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a supported type.');
    }

    public static function float(mixed $mixedValue): float
    {
        if (null === $mixedValue) {
            return 0;
        }

        if (is_string($mixedValue) || is_numeric($mixedValue)) {
            return (float)$mixedValue;
        }

        throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a supported type.');
    }

    public static function int(mixed $mixedValue): int
    {
        if (null === $mixedValue) {
            return 0;
        }

        if (is_string($mixedValue) || is_numeric($mixedValue) || is_bool($mixedValue)) {
            return (int)$mixedValue;
        }

        throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a supported type.');
    }

    public static function string(mixed $mixedValue): string
    {
        if (null === $mixedValue) {
            return '';
        }

        if (is_array($mixedValue)) {
            return implode(',', $mixedValue);
        }

        if (is_bool($mixedValue) || is_numeric($mixedValue) || is_string($mixedValue)) {
            return (string)$mixedValue;
        }

        throw new UnexpectedTypeException(gettype($mixedValue) . ' is not a supported type.');
    }
}
