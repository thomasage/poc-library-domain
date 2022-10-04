<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\UseCase\AddBook;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookService;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Library\UseCase\AddBook\AddBookHandler;
use ThomasAge\Library\UseCase\AddBook\AddBookPresenter;
use ThomasAge\Library\UseCase\AddBook\AddBookRequest;
use ThomasAge\Library\UseCase\AddBook\AddBookResponse;
use ThomasAge\Tests\Library\Doubles\BookGatewayInMemory;
use ThomasAge\Tests\Library\Doubles\BookIdGeneratorMd5;

final class AddBookHandlerTest extends TestCase implements AddBookPresenter
{
    private AddBookHandler $handler;
    private AddBookResponse $response;

    public function testShouldAddBook(): void
    {
        $request = new AddBookRequest();
        $request->title = 'Harry Potter and the Chamber of Secrets';

        $this->handler->handle($request, $this);

        self::assertNotNull($this->response->id);
        self::assertCount(0, $this->response->errors);
    }

    public function testShouldReturnsErrorIfBookAlreadyExists(): void
    {
        $request = new AddBookRequest();
        $request->title = 'Harry Potter and the Philosopher\'s Stone';

        $this->handler->handle($request, $this);

        self::assertNull($this->response->id);
        self::assertCount(1, $this->response->errors);
    }

    public function present(AddBookResponse $response): void
    {
        $this->response = $response;
    }

    protected function setUp(): void
    {
        $bookGateway = new BookGatewayInMemory();
        $bookGateway->addBook(
            Book::create(
                new BookId('HP1'),
                new BookTitle('Harry Potter and the Philosopher\'s Stone')
            )
        );
        $bookIdGenerator = new BookIdGeneratorMd5();
        $bookService = new BookService($bookGateway);
        $this->handler = new AddBookHandler($bookService, $bookIdGenerator);
    }
}
