<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Domain\Book;

use PHPUnit\Framework\TestCase;
use ThomasAge\Library\Domain\Book\Author;
use ThomasAge\Library\Domain\Book\Exception\AuthorNameEmpty;

final class AuthorTest extends TestCase
{
    public function testCanCreateAuthor(): void
    {
        $name = 'J. K. Rowling';

        $author = new Author($name);

        self::assertSame($name, (string) $author);
    }

    public function testShouldThrowsExceptionIfEmpty(): void
    {
        $this->expectException(AuthorNameEmpty::class);

        new Author('');
    }
}
