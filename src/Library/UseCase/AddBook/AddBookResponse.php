<?php

declare(strict_types=1);

namespace ThomasAge\Library\UseCase\AddBook;

final class AddBookResponse
{
    /** @var string[] */
    public array $errors = [];
    public ?string $id = null;
}
