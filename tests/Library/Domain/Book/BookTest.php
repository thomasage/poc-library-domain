<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Domain\Book;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\Book;
use ThomasAge\Library\Domain\Book\BookState;

final class BookTest extends TestCase
{
    public function testCanHydrateBookFromState(): void
    {
        $state = new BookState();
        $state->author = 'J. K. Rowling';
        $state->id = 'HP1';
        $state->title = 'Harry Potter and the Philosopher\'s Stone';

        $book = Book::fromState($state);

        self::assertSame($state->id, (string) $book->id());
    }
}
