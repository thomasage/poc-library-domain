<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book\Exception;

use ThomasAge\Shared\DomainException;

final class AuthorNameEmpty extends DomainException
{
    public static function key(): string
    {
        return 'author_name_empty';
    }
}
