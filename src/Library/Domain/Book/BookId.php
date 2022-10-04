<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book;

use Stringable;
use ThomasAge\Library\Domain\Book\Exception\BookIdEmpty;

final class BookId implements Stringable
{
    public function __construct(private readonly string $id)
    {
        $this->assertIsValid();
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function equalsTo(BookId $id): bool
    {
        return $this->id === $id->id;
    }

    private function assertIsValid(): void
    {
        if ('' === $this->id) {
            throw new BookIdEmpty();
        }
    }
}
