<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book;

use Stringable;
use ThomasAge\Library\Domain\Book\Exception\BookTitleEmpty;

final class BookTitle implements Stringable
{
    public function __construct(private readonly string $title)
    {
        $this->assertIsValid();
    }

    public function __toString(): string
    {
        return $this->title;
    }

    public function equalsTo(self $title): bool
    {
        return $this->title === $title->title;
    }

    private function assertIsValid(): void
    {
        if ('' === $this->title) {
            throw new BookTitleEmpty();
        }
    }
}
