<?php

namespace ReusableCog\TypeToolbox\Handler;

final class ConvertTo
{
    public static function float(null|float|int|string $mixedValue): float
    {
        if (null === $mixedValue) {
            return 0;
        }

        return (float)$mixedValue;
    }

    public static function int(null|bool|float|int|string $mixedValue): int
    {
        if (null === $mixedValue) {
            return 0;
        }

        return (int)$mixedValue;
    }

    /**
     * @param array<mixed, mixed>|bool|float|int|string|null $mixedValue
     */
    public static function string(null|array|bool|float|int|string $mixedValue): string
    {
        if (null === $mixedValue) {
            return '';
        }

        if (is_array($mixedValue)) {
            return implode(',', $mixedValue);
        }

        return (string)$mixedValue;
    }
}
