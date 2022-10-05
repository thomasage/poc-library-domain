<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\UseCase\GetAllBooks;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\Author;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookService;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Library\UseCase\GetAllBooks\GetAllBooksHandler;
use ThomasAge\Library\UseCase\GetAllBooks\GetAllBooksPresenter;
use ThomasAge\Library\UseCase\GetAllBooks\GetAllBooksResponse;
use ThomasAge\Tests\Library\Doubles\BookGatewayInMemory;

final class GetAllBooksHandlerTest extends TestCase implements GetAllBooksPresenter
{
    private BookGatewayInMemory $bookGateway;
    private BookService $bookService;
    private GetAllBooksResponse $response;

    public function testShouldRetrieveAllBooks(): void
    {
        $this->createBook('HP1', 'Harry Potter and the Philosopher\'s Stone');
        $this->createBook('HP2', 'Harry Potter and the Chamber of Secrets');
        $handler = new GetAllBooksHandler($this->bookService);

        $handler->handle($this);

        self::assertCount(2, $this->response->books);
    }

    private function createBook(string $id, string $title): void
    {
        $this->bookGateway->addBook(
            Book::create(
                new BookId($id),
                new BookTitle($title),
                new Author('J. K. Rowling'),
            )
        );
    }

    public function present(GetAllBooksResponse $response): void
    {
        $this->response = $response;
    }

    protected function setUp(): void
    {
        $this->bookGateway = new BookGatewayInMemory();
        $this->bookService = new BookService($this->bookGateway);
    }
}
