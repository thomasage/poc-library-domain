<?php

declare(strict_types=1);

namespace ThomasAge\Shared;

abstract class DomainException extends \DomainException
{
    abstract public static function key(): string;
}
