<?php

namespace App\Interfaces\Repositories;

use App\Models\BookReserve;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookReserveRepositoryInterface
{
    public function getAllBookReserves($columns = ['*']): Collection;
    public function getPaginatedBookReserves($total = null): LengthAwarePaginator;
    public function getBookReserveById($bookReserveId): Builder|BookReserve|null;
    public function deleteBookReserve($bookReserveId): bool;
    public function createBookReserve(array $bookReserveData): Builder|BookReserve;
    public function updateBookReserve($bookReserveId, array $newData): BookReserve;

    public function createBookReserveWithAllRelations(array $bookReserveData): Builder|BookReserve;
}
