<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book\Exception;

use ThomasAge\Shared\DomainException;

final class BookNotFound extends DomainException
{
    public static function key(): string
    {
        return 'book_not_found';
    }
}
