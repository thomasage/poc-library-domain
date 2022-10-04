<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Domain\Book;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookTitle;
use ThomasAge\Library\Domain\Book\Exception\BookTitleEmpty;

final class BookTitleTest extends TestCase
{
    public function testShouldCreateBookTitle(): void
    {
        $title = 'Harry Potter and the Philosopher\'s Stone';

        $bookTitle = new BookTitle($title);

        self::assertSame($title, (string) $bookTitle);
    }

    public function testShouldThrowsExceptionIfEmpty(): void
    {
        $this->expectException(BookTitleEmpty::class);

        new BookTitle('');
    }

    public function testSameTitleShouldBeEqual(): void
    {
        $title = 'Harry Potter and the Philosopher\'s Stone';
        $bookTitle0 = new BookId($title);
        $bookTitle1 = new BookId($title);

        self::assertTrue($bookTitle0->equalsTo($bookTitle1));
    }
}
