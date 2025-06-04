<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->all();
        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->authorService->create($request->validated());
        return new AuthorResource($author);
    }

    public function show($id)
    {
        $author = $this->authorService->find($id);
        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, $id)
    {
        $author = $this->authorService->update($id, $request->validated());
        return new AuthorResource($author);
    }

    public function destroy($id)
    {
        $this->authorService->delete($id);
        return response()->noContent();
    }

    public function getAuthorBooks($authorId)
    {
        $author = $this->authorService->getAuthorBooks($authorId);
        return new AuthorResource($author);
    }

    public function getAllAuthorsWithBooks()
    {
        $authors = $this->authorService->getAllAuthorsWithBooks();
        return AuthorResource::collection($authors);
    }
}