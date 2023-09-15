<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BookReserveRepositoryInterface;
use App\Models\BookReserve;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookReserveRepository implements BookReserveRepositoryInterface
{

    public function getAllBookReserves($columns = ['*']): Collection
    {
        return BookReserve::query()->get($columns);
    }

    public function getPaginatedBookReserves($total = null): LengthAwarePaginator
    {
        return BookReserve::query()->paginate($total);
    }

    public function getBookReserveByIdBuilder($bookReserveId): Builder
    {
        return BookReserve::query()
            ->where('id', $bookReserveId);
    }

    public function getBookReserveById($bookReserveId): Builder|BookReserve|null
    {
        return $this
            ->getBookReserveByIdBuilder($bookReserveId)
            ->first();
    }

    public function deleteBookReserve($bookReserveId): bool
    {
        return $this
            ->getBookReserveByIdBuilder($bookReserveId)
            ->delete();
    }

    public function createBookReserve(array $bookReserveData): Builder|BookReserve
    {
        return BookReserve::query()->create($bookReserveData);
    }

    public function updateBookReserve($bookReserveId, array $newData): BookReserve
    {
        /**
         *  This will result two queries but with this approach
         *  the eloquent update event will trigger.
         */
        return tap(
            $this->getBookReserveByIdBuilder($bookReserveId)
                ->first()
        )
            ->update($newData);
    }

    public function createBookReserveWithAllRelations(array $bookReserveData): Builder|BookReserve
    {
        return BookReserve::query()
            ->create($bookReserveData)
            ->load([
                'book',
                'user',
                'actionBy',
            ]);
    }
}
