<?php

declare(strict_types=1);

namespace ThomasAge\Library\UseCase\AddBook;

use ThomasAge\Library\Domain\Book\Author;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookIdGenerator;
use ThomasAge\Library\Domain\Book\BookService;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Shared\DomainException;

final class AddBookHandler
{
    public function __construct(
        private readonly BookService $bookService,
        private readonly BookIdGenerator $bookIdGenerator,
    ) {
    }

    public function handle(AddBookRequest $request, AddBookPresenter $presenter): void
    {
        $response = new AddBookResponse();
        try {
            $book = Book::create(
                $this->bookIdGenerator->generate(),
                new BookTitle($request->title),
                new Author($request->author),
            );
            $this->bookService->addBook($book);
            $response->id = (string) $book->id();
        } catch (DomainException $exception) {
            $response->errors[] = $exception::key();
        }
        $presenter->present($response);
    }
}
