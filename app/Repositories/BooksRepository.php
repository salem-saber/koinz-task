<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\ReadingInterval;
use Illuminate\Support\Collection;


class BooksRepository
{

    public function insertInterval($validated)
    {
        return ReadingInterval::create($validated);

    }

    public function mostRecommendedBooks()
    {
        $mostReadBooksCollection = new Collection();

        foreach (Book::get() as $book) {
            $readIntervals = $book->readingIntervals()->get();

           $listOfUniquePages = [];


            foreach ($readIntervals as $readInterval) {
                for ($i = $readInterval->start_page; $i < $readInterval->end_page; $i++) {
                    $listOfUniquePages[] = $i;
                }
            }

            $listOfUniquePages = array_unique($listOfUniquePages);

            if ((count($listOfUniquePages)) > 0) {
                $mostReadBooksCollection->push([
                    'book_id' => $book->id,
                    'book_name' => $book->title,
                    'num_of_read_pages' => count($listOfUniquePages),
                ]);
            }

        }

        return $mostReadBooksCollection->sortByDesc('num_of_read_pages')->take(5);
    }
}
