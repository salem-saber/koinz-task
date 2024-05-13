<?php

namespace App\Services;

use App\Events\ReadingIntervalInsertedEvent;
use App\Repositories\BooksRepository;

class BooksService
{

    protected BooksRepository $booksRepository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function insertInterval($validated)
    {

         $this->booksRepository->insertInterval($validated);

         event(new ReadingIntervalInsertedEvent($validated['user_id'], $validated['book_id']));
    }

    public function mostRecommendedBooks()
    {
        return $this->booksRepository->mostRecommendedBooks();
    }
}
