<?php

namespace ThomasAge\Library\Domain\Book;

interface BookIdGenerator
{
    public function generate(): BookId;
}
