<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Models\Author;
use Illuminate\Support\Facades\View;

class AdminAuthorController
{
    public function __construct(
        private readonly AuthorRepositoryInterface    $authorRepository,
        private readonly AdminAuthorResponseInterface $authorResponse,
    )
    { }

    public function index()
    {
        $authors = $this->authorRepository->getPaginatedAuthors();

        return $this->authorResponse->sendPaginatedResponse($authors);
    }

    // Doesnt exists on API routes
    public function create()
    {
        return View::make('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = $this->authorRepository->createAuthorWithBooks(
            $request->validated()
        );

        return $this->authorResponse->sendSingleResponse($author);
    }

    // Doesnt exists on API routes
    public function show(Author $author)
    {
        return View::make('admin.authors.show', compact('author'));
    }

    // Doesnt exists on API routes
    public function edit(Author $author)
    {
        return View::make('admin.authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $updatedAuthor = $this->authorRepository->updateAuthorWithBooks(
            $author->id,
            $request->validated()
        );

        return $this->authorResponse->sendSingleResponse($updatedAuthor);
    }

    public function destroy(Author $author)
    {
        $this->authorRepository->deleteAuthor(
            $author->id
        );

        return $this->authorResponse->sendSingleResponse($author);
    }
}
