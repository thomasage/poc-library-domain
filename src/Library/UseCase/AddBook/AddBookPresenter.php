<?php

namespace ThomasAge\Library\UseCase\AddBook;

interface AddBookPresenter
{
    public function present(AddBookResponse $response): void;
}
