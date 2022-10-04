<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book\Exception;

use ThomasAge\Shared\DomainException;

final class BookTitleEmpty extends DomainException
{
    public static function key(): string
    {
        return 'book_title_empty';
    }
}
