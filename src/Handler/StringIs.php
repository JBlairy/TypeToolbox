<?php

namespace ReusableCog\TypeToolbox\Handler;

final class StringIs
{
    public static function empty(?string $mixedValue): bool
    {
        if (null === $mixedValue || '' === $mixedValue) {
            return true;
        }

        return false;
    }
}
