<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book;

use Generator;
use ThomasAge\Library\Domain\Book\Exception\BookAlreadyExists;

final class BookService
{
    public function __construct(private readonly BookGateway $bookGateway)
    {
    }

    /**
     * @throws BookAlreadyExists
     */
    public function addBook(Book $book): void
    {
        if ($this->bookGateway->findByTitle($book->title())) {
            throw new BookAlreadyExists();
        }
        $this->bookGateway->addBook($book);
    }

    /**
     * @return Generator<Book>
     */
    public function getAllBooks(): Generator
    {
        yield from $this->bookGateway->getAllBooks();
    }
}
