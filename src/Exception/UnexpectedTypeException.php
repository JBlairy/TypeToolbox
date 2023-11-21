<?php

namespace ReusableCog\TypeToolbox\Exception;

use http\Exception;
use UnexpectedValueException;

final class UnexpectedTypeException extends UnexpectedValueException implements Exception {}
