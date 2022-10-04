<?php

declare(strict_types=1);

namespace ThomasAge\Library\UseCase\GetAllBooks;

use ThomasAge\Library\Domain\Book\BookService;

final class GetAllBooksHandler
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    public function handle(GetAllBooksPresenter $presenter): void
    {
        $response = new GetAllBooksResponse();
        foreach ($this->bookService->getAllBooks() as $book) {
            $response->books[] = $book->getState();
        }
        $presenter->present($response);
    }
}
