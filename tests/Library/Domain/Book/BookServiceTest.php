<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Domain\Book;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\Author;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookGateway;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookService;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Tests\Library\Doubles\BookGatewayInMemory;

final class BookServiceTest extends TestCase
{
    private BookGateway $bookGateway;
    private BookService $bookService;

    public function testShouldRetrieveAllBooks(): void
    {
        $this->bookGateway->addBook(
            Book::create(
                new BookId('HP1'),
                new BookTitle('Harry Potter and the Philosopher\'s Stone'),
                new Author('J. K. Rowling'),
            )
        );

        self::assertCount(1, $this->bookService->getAllBooks());
    }

    public function testShouldAddOneBook(): void
    {
        $book = Book::create(
            new BookId('HP1'),
            new BookTitle('Harry Potter and the Philosopher\'s Stone'),
            new Author('J. K. Rowling'),
        );

        $this->bookService->addBook($book);

        self::assertCount(1, $this->bookGateway->getAllBooks());
    }

    protected function setUp(): void
    {
        $this->bookGateway = new BookGatewayInMemory();
        $this->bookService = new BookService($this->bookGateway);
    }
}
