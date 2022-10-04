<?php

namespace ThomasAge\Library\Domain\Book;

use Generator;
use ThomasAge\Library\Domain\Book\Exception\BookNotFound;

interface BookGateway
{
    public function addBook(Book $book): void;

    public function findByTitle(BookTitle $title): ?Book;

    /**
     * @return Generator<Book>
     */
    public function getAllBooks(): Generator;

    /**
     * @throws BookNotFound
     */
    public function getBookById(BookId $id): Book;
}
