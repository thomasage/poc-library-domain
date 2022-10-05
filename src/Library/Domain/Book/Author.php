<?php

declare(strict_types=1);

namespace ThomasAge\Library\Domain\Book;

use Stringable;
use ThomasAge\Library\Domain\Book\Exception\AuthorNameEmpty;

final class Author implements Stringable
{
    public function __construct(private readonly string $name)
    {
        $this->assertIsValid();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    private function assertIsValid(): void
    {
        if ('' === $this->name) {
            throw new AuthorNameEmpty();
        }
    }
}
