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
