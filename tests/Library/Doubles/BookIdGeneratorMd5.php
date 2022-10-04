<?php

declare(strict_types=1);

namespace ThomasAge\Tests\Library\Doubles;

use ThomasAge\Library\Domain\Book\BookId;
use ThomasAge\Library\Domain\Book\BookIdGenerator;

final class BookIdGeneratorMd5 implements BookIdGenerator
{
    public function generate(): BookId
    {
        return new BookId(md5(uniqid((string) mt_rand(), true)));
    }
}
