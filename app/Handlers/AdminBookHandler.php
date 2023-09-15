<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Admin\AdminBookHandlerInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminBookHandler implements AdminBookHandlerInterface
{
    public function __construct(
        private readonly BookRepositoryInterface    $bookRepository
    )
    { }

    public function getPaginatedBooks(): LengthAwarePaginator
    {
        return $this->bookRepository->getPaginatedBooks();
    }

    public function createBookWithAuthors(array $data): Book
    {
        return $this->bookRepository->createBookWithAuthors(
            $data
        );
    }

    public function updateBookWithAuthors(Book $author, array $data)
    {
        return $this->bookRepository->updateBookWithAuthors(
            $author->id,
            $data
        );
    }

    public function deleteBook(int $id)
    {
        return $this->bookRepository->deleteBook(
            $id
        );
    }

    public function createBook(array $data)
    {
        [$bookData, $authorIds] = $this->mapData($data);

        $book = $this->bookRepository->createBook(
            $bookData
        );
        return $this->bookRepository->assignAuthors(
            $book,
            $authorIds
        );
    }

    public function updateBook(Book $book, array $data)
    {
        [$bookData, $authorIds] = $this->mapData($data);

        $updatedBook = $this->bookRepository->updateBook(
            $book->id,
            $bookData
        );

        return $this->bookRepository->assignAuthors(
            $updatedBook,
            $authorIds
        );
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
