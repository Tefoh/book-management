<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\Handlers\Admin\AdminBookHandlerInterface;
use App\Interfaces\Responses\Admin\AdminBookResponseInterface;
use App\Models\Book;
use Illuminate\Support\Facades\View;

class AdminBookController
{
    public function __construct(
        private readonly AdminBookResponseInterface $bookResponse,
        private readonly AdminBookHandlerInterface $adminBookHandler,
    )
    { }

    public function index()
    {
        $books = $this->adminBookHandler->getPaginatedBooks();

        return $this->bookResponse->sendPaginatedResponse($books);
    }

    // Doesnt exists on API routes
    public function create()
    {
        return View::make('admin.books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $book = $this->adminBookHandler->createBook(
            $request->validated()
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
        $updatedBook = $this->adminBookHandler->updateBook(
            $book,
            $request->validated()
        );

        return $this->bookResponse->sendSingleResponse($updatedBook);
    }

    public function destroy(Book $book)
    {
        $this->adminBookHandler->deleteBook(
            $book->id
        );

        return $this->bookResponse->sendSingleResponse($book);
    }
}
