<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Responses\Admin\AdminBookResponseInterface;
use App\Models\Book;
use Illuminate\Support\Facades\View;

class AdminBookController
{
    public function __construct(
        private readonly BookRepositoryInterface    $bookRepository,
        private readonly AdminBookResponseInterface $bookResponse,
    )
    { }

    public function index()
    {
        $books = $this->bookRepository->getPaginatedBooks();

        return $this->bookResponse->sendPaginatedResponse($books);
    }

    // Doesnt exists on API routes
    public function create()
    {
        return View::make('admin.books.create');
    }

    public function store(StoreBookRequest $request)
    {
        [$bookData, $authorIds] = $this->mapData($request->validated());
        $book = $this->bookRepository->createBook(
            $bookData
        );
        $this->bookRepository->assignAuthors(
            $book,
            $authorIds
        );

        return $this->bookResponse->sendSingleResponse($book);
    }

    // Doesnt exists on API routes
    public function show(Book $book)
    {
        return $this->bookResponse->sendSingleResponse($book);
    }

    // Doesnt exists on API routes
    public function edit(Book $book)
    {
        return View::make('admin.books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        [$bookData, $authorIds] = $this->mapData($request->validated());
        $updatedBook = $this->bookRepository->updateBook(
            $book->id,
            $bookData
        );
        $this->bookRepository->assignAuthors(
            $book,
            $authorIds
        );

        return $this->bookResponse->sendSingleResponse($updatedBook);
    }

    public function destroy(Book $book)
    {
        $this->bookRepository->deleteBook(
            $book->id
        );

        return $this->bookResponse->sendSingleResponse($book);
    }

    private function mapData(array $validated)
    {
        $bookData = $validated;
        $authorIds = $validated['author_ids'];

        unset($bookData['author_ids']);

        return [
            $bookData,
            $authorIds
        ];
    }
}
