<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->all();
        return BookResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        $book = $this->bookService->create($request->validated());
        
        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }
        
        return new BookResource($book->load(['author', 'genres']));
    }

    public function show($id)
    {
        $book = $this->bookService->find($id);
        return new BookResource($book->load(['author', 'genres']));
    }

    public function update(BookRequest $request, $id)
    {
        $book = $this->bookService->update($id, $request->validated());
        
        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }
        
        return new BookResource($book->load(['author', 'genres']));
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return response()->noContent();
    }

    public function getBookReviews($bookId)
    {
        $book = $this->bookService->getBookReviews($bookId);
        return new BookResource($book);
    }

    public function getAllBooksWithDetails()
    {
        $books = $this->bookService->getAllBooksWithDetails();
        return BookResource::collection($books);
    }
}