<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Doubles;

use Generator;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookGateway;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Library\Domain\Book\Exception\BookNotFound;

final class BookGatewayInMemory implements BookGateway
{
    /** @var Book[] */
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function findByTitle(BookTitle $title): ?Book
    {
        foreach ($this->books as $book) {
            if ($book->title()->equalsTo($title)) {
                return $book;
            }
        }

        return null;
    }

    /**
     * @return Generator<Book>
     */
    public function getAllBooks(): Generator
    {
        yield from $this->books;
    }

    public function getBookById(BookId $id): Book
    {
        foreach ($this->books as $book) {
            if ($book->id()->equalsTo($id)) {
                return $book;
            }
        }
        throw new BookNotFound();
    }
}
