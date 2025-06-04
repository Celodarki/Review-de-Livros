<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getBookReviews(int $bookId)
    {
        return $this->model->with('reviews')->findOrFail($bookId);
    }

    public function getAllBooksWithDetails()
    {
        return $this->model->with(['author', 'genres', 'reviews'])->get();
    }
}