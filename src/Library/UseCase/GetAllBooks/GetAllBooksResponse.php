<?php

declare(strict_types=1);

namespace ThomasAge\Library\UseCase\GetAllBooks;

use ThomasAge\Library\Domain\Book\BookState;

final class GetAllBooksResponse
{
    /**
     * @var BookState[]
     */
    public array $books = [];
}
