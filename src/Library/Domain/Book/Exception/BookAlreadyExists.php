<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book\Exception;

use ThomasAge\Shared\DomainException;

final class BookAlreadyExists extends DomainException
{
    public static function key(): string
    {
        return 'book_already_exists';
    }
}
