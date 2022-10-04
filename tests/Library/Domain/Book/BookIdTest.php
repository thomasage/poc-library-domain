<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Domain\Book;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\Exception\BookIdEmpty;

final class BookIdTest extends TestCase
{
    public function testShouldCreateBookId(): void
    {
        $id = 'test';

        $bookId = new BookId($id);

        self::assertSame($id, (string) $bookId);
    }

    public function testShouldThrowsExceptionIfEmpty(): void
    {
        $this->expectException(BookIdEmpty::class);

        new BookId('');
    }

    public function testSameIdShouldBeEqual(): void
    {
        $id = 'test';
        $bookId1 = new BookId($id);
        $bookId0 = new BookId($id);

        self::assertTrue($bookId0->equalsTo($bookId1));
    }
}
