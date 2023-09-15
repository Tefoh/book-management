<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Interfaces\Handlers\Admin\AdminAuthorHandlerInterface;
use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Models\Author;
use Illuminate\Support\Facades\View;

class AdminAuthorController
{
    public function __construct(
        private readonly AdminAuthorResponseInterface $authorResponse,
        private readonly AdminAuthorHandlerInterface  $adminAuthorHandler,
    )
    { }

    public function index()
    {
        $authors = $this->adminAuthorHandler->getPaginatedAuthors();

        return $this->authorResponse->sendPaginatedResponse($authors);
    }

    // Doesnt exists on API routes
    public function create()
    {
        return View::make('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = $this->adminAuthorHandler->createAuthorWithBooks(
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
        $updatedAuthor = $this->adminAuthorHandler->updateAuthorWithBooks(
            $author,
            $request->validated()
        );

        return $this->authorResponse->sendSingleResponse($updatedAuthor);
    }

    public function destroy(Author $author)
    {
        $this->adminAuthorHandler->deleteAuthor(
            $author->id
        );

        return $this->authorResponse->sendSingleResponse($author);
    }
}
