<?php

namespace App\Handlers;

use App\Enums\BookReserveStatus;
use App\Interfaces\Handlers\Book\ReserveHandlerInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Repositories\BookReserveRepositoryInterface;
use App\Models\User;

class ReserveHandler implements ReserveHandlerInterface
{
    public function __construct(
        private readonly BookReserveRepositoryInterface $bookReserveRepository,
        private readonly BookRepositoryInterface $bookRepository,
    )
    { }

    public function reserveBook($bookId, User $user): array
    {
        if ($this->bookCantReserved($bookId)) {
            return [
                'message' => 'Book already reserved!',
                'is_successful' => false,
            ];
        }
        $reserveData = $this->mapReserveData($bookId, $user);

        $this
            ->bookReserveRepository
            ->createBookReserveWithAllRelations($reserveData);

        return [
            'message' => 'Book has been successfully reserved!',
            'is_successful' => true,
        ];
    }

    public function releaseBook($bookId): array
    {
        if ($this->bookCanReserved($bookId)) {
            return [
                'message' => 'Book already released!',
                'is_successful' => false,
            ];
        }
        $reserveData = $this->mapReleaseData($bookId);

        $this
            ->bookReserveRepository
            ->createBookReserveWithAllRelations($reserveData);

        return [
            'message' => 'Book has been successfully released!',
            'is_successful' => true,
        ];
    }

    private function mapReserveData($bookId, User $user): array
    {
        return [
            'book_id' => $bookId,
            'user_id' => $user->id,
            'action_by_id' => request()->user()?->id ?? auth()->user()?->id,
            'status' => BookReserveStatus::RESERVED,
        ];
    }

    private function bookCantReserved($bookId): bool
    {
        $book = $this->bookRepository->getBookById($bookId);

        return $book->cantBeReserved();
    }

    private function bookCanReserved($bookId): bool
    {
        $book = $this->bookRepository->getBookById($bookId);

        return $book->canBeReserved();
    }

    private function mapReleaseData($bookId): array
    {
        return [
            'book_id' => $bookId,
            'user_id' => null,
            'action_by_id' => request()->user()?->id ?? auth()->user()?->id,
            'status' => BookReserveStatus::RELEASED,
        ];
    }
}
