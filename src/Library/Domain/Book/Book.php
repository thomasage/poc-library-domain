<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book;

final class Book
{
    private BookId $id;
    private BookTitle $title;

    private function __construct()
    {
    }

    public static function create(BookId $id, BookTitle $title): self
    {
        $book = new self();
        $book->id = $id;
        $book->title = $title;

        return $book;
    }

    public static function fromState(BookState $state): self
    {
        $book = new self();
        $book->id = new BookId($state->id);
        $book->title = new BookTitle($state->title);

        return $book;
    }

    public function getState(): BookState
    {
        $state = new BookState();
        $state->id = (string) $this->id;
        $state->title = (string) $this->title;

        return $state;
    }

    public function id(): BookId
    {
        return $this->id;
    }

    public function title(): BookTitle
    {
        return $this->title;
    }
}
