<?php

namespace ThomasAge\Library\UseCase\GetAllBooks;

interface GetAllBooksPresenter
{
    public function present(GetAllBooksResponse $response): void;
}
