<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertIntervalRequest;
use App\Models\ReadingInterval;
use App\Services\BooksService;

class BooksController extends Controller
{

    protected BooksService $booksService;

    public function __construct(BooksService $booksService)
    {
        $this->booksService = $booksService;

    }

    public function insertInterval(InsertIntervalRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();
        $this->booksService->insertInterval($validated);
        return response()->json(['message' => 'Reading interval inserted successfully'], 201);

    }

    public function mostRecommended()
    {
       $data =  $this->booksService->mostRecommendedBooks();

         return response()->json($data, 200);
    }
}
